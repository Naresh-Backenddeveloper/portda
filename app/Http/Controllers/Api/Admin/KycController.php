<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycDocument;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class KycController extends Controller
{
    public function index(Request $request)
    {
        $q = KycDocument::query()->with('user:id,name,email,role')->latest();
        $q->where('status', $request->input('status', 'pending'));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function approve(Request $request, KycDocument $kyc)
    {
        $kyc->update([
            'status'      => 'approved',
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
        ]);
        $user = $kyc->user;
        if ($user && $user->isVendor()) {
            $hasPending = KycDocument::where('user_id', $user->id)->where('status','pending')->exists();
            if (! $hasPending) {
                $user->vendorProfile?->update(['verification_status' => 'verified']);
            }
        }
        return ApiResponse::ok($kyc->fresh());
    }

    public function reject(Request $request, KycDocument $kyc)
    {
        $data = $request->validate(['reason' => ['required','string','max:500']]);
        $kyc->update([
            'status'        => 'rejected',
            'reject_reason' => $data['reason'],
            'reviewed_by'   => $request->user()->id,
            'reviewed_at'   => now(),
        ]);
        return ApiResponse::ok($kyc->fresh());
    }
}
