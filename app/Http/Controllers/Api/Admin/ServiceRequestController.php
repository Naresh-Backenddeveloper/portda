<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $q = ServiceRequest::query()
            ->with(['buyer:id,name','port:id,name,code','category:id,name'])
            ->withCount('quotations')
            ->latest();
        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('port_id'), fn ($x) => $x->where('port_id', $request->integer('port_id')))
          ->when($request->filled('category_id'), fn ($x) => $x->where('category_id', $request->integer('category_id')));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function show(ServiceRequest $request_)
    {
        return ApiResponse::ok($request_->load([
            'buyer','port','category','subcategory','quotations.vendor.vendorProfile',
        ]));
    }

    public function forceCancel(Request $request, ServiceRequest $request_)
    {
        $request->validate(['reason' => ['required','string','max:500']]);
        $request_->update(['status' => 'cancelled']);
        return ApiResponse::ok($request_->fresh());
    }
}
