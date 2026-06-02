<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BuyerProfile;
use App\Models\User;
use App\Models\VendorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showLogin()       { return view('auth.login'); }
    public function showSignup()      { return view('auth.signup'); }
    public function showAdminLogin()  { return view('admin.login'); }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
            'role'     => ['nullable', Rule::in(['buyer','vendor'])],
        ]);
        $user = User::where('email', $data['email'])->first();
        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
        }
        if ($user->status === 'suspended') {
            return back()->withErrors(['email' => 'Account suspended.'])->onlyInput('email');
        }
        Auth::login($user, $request->boolean('remember', true));
        $user->forceFill(['last_login_at' => now()])->save();
        $request->session()->regenerate();

        return redirect()->intended($this->landingFor($user));
    }

    public function adminLogin(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);
        $user = User::where('email', $data['email'])->where('role','admin')->first();
        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['email' => 'Invalid admin credentials.'])->onlyInput('email');
        }
        Auth::login($user, true);
        $user->forceFill(['last_login_at' => now()])->save();
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    public function signup(Request $request)
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
        Auth::login($user, true);
        $request->session()->regenerate();
        return redirect($this->landingFor($user));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    protected function landingFor(User $user): string
    {
        return match ($user->role) {
            'admin'  => '/admin/dashboard',
            'vendor' => '/vendor/dashboard',
            default  => '/buyer/dashboard',
        };
    }
}
