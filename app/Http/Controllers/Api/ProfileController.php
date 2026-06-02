<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user()->load([
            'buyerProfile.defaultPort',
            'vendorProfile.categories',
            'vendorProfile.subcategories',
            'vendorProfile.ports',
        ]);
        return ApiResponse::ok($user);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $userData = $request->validate([
            'name'   => ['sometimes','string','max:120'],
            'email'  => ['sometimes','email', \Illuminate\Validation\Rule::unique('users','email')->ignore($user->id)],
            'phone'  => ['sometimes','nullable','string','max:20', \Illuminate\Validation\Rule::unique('users','phone')->ignore($user->id)],
            'locale' => ['sometimes','string','max:8'],
        ]);

        // If the user changes their email / phone, the new value is unverified
        // until they prove ownership via OTP (POST /auth/otp/{request,verify} purpose=verify).
        if (array_key_exists('email', $userData) && $userData['email'] !== $user->email) {
            $userData['email_verified_at'] = null;
        }
        if (array_key_exists('phone', $userData) && $userData['phone'] !== $user->phone) {
            $userData['phone_verified_at'] = null;
        }

        if ($userData) {
            $user->fill($userData)->save();
        }

        if ($user->isBuyer()) {
            $profileData = $request->validate([
                'company_name'     => ['sometimes','string','max:191'],
                'imo_number'       => ['sometimes','nullable','string','max:32'],
                'gst_number'       => ['sometimes','nullable','string','max:32'],
                'billing_address'  => ['sometimes','nullable','string'],
                'city'             => ['sometimes','nullable','string','max:64'],
                'state'            => ['sometimes','nullable','string','max:64'],
                'country'          => ['sometimes','nullable','string','max:64'],
                'postal_code'      => ['sometimes','nullable','string','max:16'],
                'default_port_id'  => ['sometimes','nullable','exists:ports,id'],
            ]);
            $user->buyerProfile()->updateOrCreate(['user_id' => $user->id], $profileData);
        } elseif ($user->isVendor()) {
            $profileData = $request->validate([
                'company_name'  => ['sometimes','string','max:191'],
                'bio'           => ['sometimes','nullable','string'],
                'gst_number'    => ['sometimes','nullable','string','max:32'],
                'pan_number'    => ['sometimes','nullable','string','max:16'],
                'city'          => ['sometimes','nullable','string','max:64'],
                'state'         => ['sometimes','nullable','string','max:64'],
                'country'       => ['sometimes','nullable','string','max:64'],
                'bank_account'  => ['sometimes','nullable','array'],
            ]);
            $user->vendorProfile()->updateOrCreate(['user_id' => $user->id], $profileData);
        }

        return ApiResponse::ok($user->fresh(['buyerProfile','vendorProfile']), 'Profile updated');
    }

    public function syncVendorCategories(Request $request)
    {
        $user = $request->user();
        if (! $user->isVendor()) {
            return ApiResponse::error('Vendors only.', 403);
        }
        $data = $request->validate([
            'categories'                  => ['required','array'],
            'categories.*.category_id'    => ['required','exists:categories,id'],
            'categories.*.subcategory_id' => ['nullable','exists:subcategories,id'],
        ]);

        $vp = $user->vendorProfile;
        if (! $vp) {
            return ApiResponse::error('Vendor profile missing.', 422);
        }

        DB::transaction(function () use ($data, $vp) {
            DB::table('vendor_categories')->where('vendor_profile_id', $vp->id)->delete();
            $now = now();
            $rows = collect($data['categories'])->map(fn ($c) => [
                'vendor_profile_id' => $vp->id,
                'category_id'       => $c['category_id'],
                'subcategory_id'    => $c['subcategory_id'] ?? null,
                'created_at'        => $now,
                'updated_at'        => $now,
            ])->all();
            DB::table('vendor_categories')->insert($rows);
        });

        return ApiResponse::ok($vp->fresh(['categories','subcategories']), 'Categories synced');
    }

    public function syncVendorPorts(Request $request)
    {
        $user = $request->user();
        if (! $user->isVendor()) {
            return ApiResponse::error('Vendors only.', 403);
        }
        $data = $request->validate([
            'port_ids'   => ['required','array'],
            'port_ids.*' => ['exists:ports,id'],
        ]);
        $vp = $user->vendorProfile;
        if (! $vp) {
            return ApiResponse::error('Vendor profile missing.', 422);
        }
        $vp->ports()->sync($data['port_ids']);
        return ApiResponse::ok($vp->fresh('ports'), 'Ports synced');
    }

    public function uploadAvatar(Request $request)
    {
        $data = $request->validate([
            'avatar' => ['required','image','max:2048'],
        ]);
        $path = Storage::disk('public')->putFile('avatars', $data['avatar']);
        $user = $request->user();
        $user->forceFill(['avatar' => $path])->save();
        return ApiResponse::ok(['avatar' => $path, 'url' => Storage::disk('public')->url($path)], 'Avatar updated');
    }
}
