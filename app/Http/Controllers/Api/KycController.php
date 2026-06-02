<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KycDocument;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KycController extends Controller
{
    public function index(Request $request)
    {
        $docs = KycDocument::where('user_id', $request->user()->id)
            ->latest()
            ->get();
        return ApiResponse::ok($docs);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doc_type'   => ['required', Rule::in(['gst','pan','cin','iec','dgs_license','pi_insurance','address_proof','bank_proof','other'])],
            'doc_number' => ['nullable','string','max:64'],
            'file'       => ['required','file','max:5120'],
        ]);
        $path = Storage::disk('public')->putFile('kyc', $data['file']);
        $doc = KycDocument::create([
            'user_id'       => $request->user()->id,
            'doc_type'      => $data['doc_type'],
            'doc_number'    => $data['doc_number'] ?? null,
            'file_path'     => $path,
            'original_name' => $data['file']->getClientOriginalName(),
            'status'        => 'pending',
        ]);
        return ApiResponse::created($doc, 'Document uploaded');
    }

    public function destroy(Request $request, KycDocument $kyc)
    {
        if ($kyc->user_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        if ($kyc->status !== 'pending') {
            return ApiResponse::error('Only pending documents can be removed.', 422);
        }
        if ($kyc->file_path) {
            Storage::disk('public')->delete($kyc->file_path);
        }
        $kyc->delete();
        return ApiResponse::ok(null, 'Removed');
    }

    public function status(Request $request)
    {
        $user = $request->user();
        $counts = KycDocument::where('user_id', $user->id)
            ->selectRaw('status, COUNT(*) as c')
            ->groupBy('status')
            ->pluck('c','status');

        return ApiResponse::ok([
            'counts'              => $counts,
            'verification_status' => optional($user->vendorProfile)->verification_status,
        ]);
    }
}
