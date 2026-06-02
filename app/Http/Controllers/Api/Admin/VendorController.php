<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycDocument;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $q = User::where('role','vendor')
            ->with(['vendorProfile.categories','vendorProfile.ports'])
            ->latest();

        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')));
        if ($request->filled('verification_status')) {
            $q->whereHas('vendorProfile', fn ($v) => $v->where('verification_status', $request->string('verification_status')));
        }
        if ($request->filled('port_id')) {
            $q->whereHas('vendorProfile.ports', fn ($v) => $v->where('ports.id', $request->integer('port_id')));
        }
        if ($request->filled('category_id')) {
            $q->whereHas('vendorProfile.categories', fn ($v) => $v->where('categories.id', $request->integer('category_id')));
        }
        return ApiResponse::paginated($q->paginate(25));
    }

    public function show(User $vendor)
    {
        if (! $vendor->isVendor()) return ApiResponse::error('Not a vendor.', 422);
        return ApiResponse::ok($vendor->load([
            'vendorProfile.categories','vendorProfile.subcategories','vendorProfile.ports',
            'kycDocuments',
            'vendorOrders' => fn ($q) => $q->latest()->limit(10),
        ]));
    }

    public function verify(Request $request, User $vendor)
    {
        if (! $vendor->isVendor()) return ApiResponse::error('Not a vendor.', 422);
        $vendor->update(['status' => 'active']);
        $vendor->vendorProfile?->update(['verification_status' => 'verified']);
        KycDocument::where('user_id', $vendor->id)
            ->where('status','pending')
            ->update(['status' => 'approved', 'reviewed_by' => $request->user()->id, 'reviewed_at' => now()]);
        return ApiResponse::ok($vendor->fresh(['vendorProfile','kycDocuments']));
    }

    public function reject(Request $request, User $vendor)
    {
        $request->validate(['reason' => ['required','string','max:500']]);
        $vendor->vendorProfile?->update(['verification_status' => 'rejected']);
        return ApiResponse::ok($vendor->fresh('vendorProfile'));
    }

    public function togglePremium(User $vendor)
    {
        if (! $vendor->vendorProfile) return ApiResponse::error('No vendor profile.', 422);
        $vendor->vendorProfile->update(['is_premium' => ! $vendor->vendorProfile->is_premium]);
        return ApiResponse::ok($vendor->fresh('vendorProfile'));
    }
}
