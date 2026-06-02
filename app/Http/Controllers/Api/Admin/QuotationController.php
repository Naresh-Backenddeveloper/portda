<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        $q = Quotation::query()
            ->with(['vendor:id,name','serviceRequest:id,reference,title,buyer_id'])
            ->latest();
        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function flag(Quotation $quotation)
    {
        $quotation->update([
            'status' => 'rejected',
            'notes'  => '[FLAGGED-BY-ADMIN] '.($quotation->notes ?? ''),
        ]);
        return ApiResponse::ok($quotation->fresh());
    }
}
