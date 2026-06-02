<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\BuyerProfile;
use App\Models\OtpCode;
use App\Models\User;
use App\Models\VendorProfile;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required','string','max:120'],
            'email'    => ['required','email','unique:users,email'],
            'phone'    => ['nullable','string','max:20','unique:users,phone'],
            'password' => ['required','string','min:8','confirmed'],
            'role'     => ['required', Rule::in(['buyer','vendor'])],
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'] ?? null,
            'password' => $data['password'],
            'role'     => $data['role'],
            'status'   => 'active',
        ]);

        if ($user->role === 'buyer') {
            BuyerProfile::create(['user_id' => $user->id, 'company_name' => $user->name]);
        } else {
            VendorProfile::create(['user_id' => $user->id, 'company_name' => $user->name]);
        }

        $token = $user->createToken('app')->plainTextToken;

        return ApiResponse::created([
            'user'  => $user->fresh(['buyerProfile','vendorProfile']),
            'token' => $token,
        ], 'Account created');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['nullable','email','required_without:phone'],
            'phone'    => ['nullable','string','required_without:email'],
            'password' => ['required','string'],
        ]);

        $user = User::query()
            ->when(!empty($data['email']), fn ($q) => $q->where('email', $data['email']))
            ->when(!empty($data['phone']), fn ($q) => $q->orWhere('phone', $data['phone']))
            ->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return ApiResponse::error('Invalid credentials.', 401);
        }
        if ($user->status === 'suspended') {
            return ApiResponse::error('Account suspended.', 403);
        }

        $user->forceFill(['last_login_at' => now()])->save();
        $token = $user->createToken('app')->plainTextToken;

        return ApiResponse::ok([
            'user'  => $user->load(['buyerProfile','vendorProfile']),
            'token' => $token,
        ], 'Logged in');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();
        return ApiResponse::ok(null, 'Logged out');
    }

    public function me(Request $request)
    {
        $user = $request->user()->load([
            'buyerProfile',
            'vendorProfile.categories',
            'vendorProfile.ports',
            'activeSubscription.plan',
        ]);
        return ApiResponse::ok($user);
    }

    public function requestOtp(Request $request)
    {
        $data = $request->validate([
            'identifier' => ['required','string','max:120'],
            'purpose'    => ['required', Rule::in(['login','register','reset','verify'])],
        ]);

        // Non-production: every OTP is "1234" so QA / mobile devs don't need an SMS gateway.
        // Production: real 4-digit random delivered via SMS provider.
        $code = app()->environment('production')
            ? str_pad((string) random_int(1000, 9999), 4, '0', STR_PAD_LEFT)
            : '1234';

        $channel = str_contains($data['identifier'], '@') ? 'email' : 'phone';

        // One active OTP per identifier — a new request overwrites the prior code
        // (and resets consumed_at / attempts so the new code is immediately valid).
        OtpCode::updateOrCreate(
            ['identifier' => $data['identifier']],
            [
                'channel'     => $channel,
                'code'        => $code,
                'purpose'     => $data['purpose'],
                'expires_at'  => now()->addMinutes(10),
                'consumed_at' => null,
                'attempts'    => 0,
            ]
        );

        // Channel routing: deliver the code to the right place.
        // - email channel → SMTP via Laravel Mail (configured in .env)
        // - phone channel → SMS provider (TODO: wire MSG91 / Twilio / etc.)
        $delivered = true;
        if ($channel === 'email') {
            try {
                Mail::to($data['identifier'])->send(new OtpMail($code, $data['purpose']));
            } catch (\Throwable $e) {
                Log::warning('OTP email send failed', [
                    'identifier' => $data['identifier'],
                    'error'      => $e->getMessage(),
                ]);
                $delivered = false;
            }
        }
        // phone channel: SMS hook goes here.

        $payload = ['sent' => $delivered, 'channel' => $channel];
        if (! app()->environment('production')) {
            $payload['debug_code'] = $code;   // always "1234" in dev/staging
        }
        return ApiResponse::ok($payload, $delivered ? 'OTP sent' : 'OTP saved (delivery pending)');
    }

    public function verifyOtp(Request $request)
    {
        $data = $request->validate([
            'identifier' => ['required','string'],
            'code'       => ['required','string','size:4'],
            'purpose'    => ['required', Rule::in(['login','register','reset','verify'])],
        ]);

        $otp = OtpCode::where('identifier', $data['identifier'])
            ->where('purpose', $data['purpose'])
            ->where('code', $data['code'])
            ->whereNull('consumed_at')
            ->where('expires_at', '>', now())
            ->latest('id')
            ->first();

        if (! $otp) {
            return ApiResponse::error('Invalid or expired OTP.', 422);
        }
        $otp->forceFill(['consumed_at' => now()])->save();

        // Channel is derived from the identifier shape.
        // login/register/verify all auto-mark the matching channel as verified
        // (the user proved they own that mailbox / phone number).
        $isEmail       = str_contains($data['identifier'], '@');
        $channelField  = $isEmail ? 'email_verified_at' : 'phone_verified_at';

        if ($data['purpose'] === 'login') {
            $user = $isEmail
                ? User::where('email', $data['identifier'])->first()
                : User::where('phone', $data['identifier'])->first();

            $isNewUser = false;
            if (! $user) {
                // Auto-create on first OTP — modern B2C signup-by-OTP flow.
                // Defaults: role=buyer, profile = empty BuyerProfile, password = random
                // (the account is OTP-only until the user sets a password from profile).
                $user = DB::transaction(function () use ($isEmail, $data) {
                    $localPart = $isEmail ? explode('@', $data['identifier'])[0] : 'User';
                    $u = User::create([
                        'name'     => substr(ucfirst(str_replace(['.', '_', '-'], ' ', $localPart)), 0, 60),
                        'email'    => $isEmail ? $data['identifier'] : null,
                        'phone'    => $isEmail ? null : $data['identifier'],
                        'password' => str()->random(40),    // unusable; user authenticates via OTP
                        'role'     => 'buyer',
                        'status'   => 'active',
                    ]);
                    BuyerProfile::create([
                        'user_id'      => $u->id,
                        'company_name' => $u->name,
                    ]);
                    return $u;
                });
                $isNewUser = true;
            }

            $user->forceFill([
                'last_login_at' => now(),
                $channelField   => $user->{$channelField} ?? now(),
            ])->save();
            $token = $user->createToken('app')->plainTextToken;

            return ApiResponse::ok([
                'user'         => $user->load(['buyerProfile','vendorProfile']),
                'token'        => $token,
                'is_new_user'  => $isNewUser,
            ], $isNewUser ? 'Account created' : 'Logged in');
        }

        if ($data['purpose'] === 'verify') {
            // Authenticated user is confirming a channel on their own profile.
            // Accept either a Sanctum Bearer token or the current web session.
            $user = $request->user('sanctum') ?? $request->user();
            if (! $user) {
                return ApiResponse::error('Sign in first, then verify.', 401);
            }
            $matchesAccount = $isEmail
                ? $user->email === $data['identifier']
                : $user->phone === $data['identifier'];
            if (! $matchesAccount) {
                return ApiResponse::error('This identifier is not on your account.', 422);
            }
            $user->forceFill([$channelField => now()])->save();
            return ApiResponse::ok([
                'user'     => $user->fresh()->load(['buyerProfile','vendorProfile']),
                'channel'  => $isEmail ? 'email' : 'phone',
                'verified' => true,
            ], 'Verified');
        }

        // register / reset: caller proceeds with the next step (POST /auth/register, etc.).
        return ApiResponse::ok([
            'channel'  => $isEmail ? 'email' : 'phone',
            'verified' => true,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required','string'],
            'password'         => ['required','string','min:8','confirmed'],
        ]);
        $user = $request->user();
        if (! Hash::check($data['current_password'], $user->password)) {
            return ApiResponse::error('Current password is incorrect.', 422);
        }
        $user->forceFill(['password' => $data['password']])->save();
        return ApiResponse::ok(null, 'Password updated');
    }
}
