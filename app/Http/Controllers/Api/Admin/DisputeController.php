<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispute;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class DisputeController extends Controller
{
    public function index(Request $request)
    {
        $q = Dispute::query()->with(['order:id,reference,buyer_id,vendor_id','raiser:id,name'])->latest();
        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function show(Dispute $dispute)
    {
        return ApiResponse::ok($dispute->load(['order.buyer:id,name','order.vendor:id,name','raiser:id,name','resolver:id,name']));
    }

    public function resolve(Request $request, Dispute $dispute)
    {
        $data = $request->validate(['resolution' => ['required','string','max:1000']]);
        $dispute->update([
            'status'      => 'resolved',
            'resolution'  => $data['resolution'],
            'resolved_by' => $request->user()->id,
            'resolved_at' => now(),
        ]);
        return ApiResponse::ok($dispute->fresh());
    }

    public function escalate(Dispute $dispute)
    {
        $dispute->update(['status' => 'escalated']);
        return ApiResponse::ok($dispute->fresh());
    }
}
