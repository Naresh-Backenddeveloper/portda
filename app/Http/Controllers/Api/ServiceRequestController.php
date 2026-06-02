<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $q = ServiceRequest::query()
            ->with(['port:id,name,code','category:id,name','subcategory:id,name','buyer:id,name'])
            ->withCount('quotations')
            ->latest();

        if ($user->isBuyer()) {
            $q->where('buyer_id', $user->id);
        } elseif ($user->isVendor()) {
            $vp = $user->vendorProfile;
            $catIds  = $vp ? $vp->categories->pluck('id')->all() : [];
            $portIds = $vp ? $vp->ports->pluck('id')->all() : [];
            $q->whereIn('status', ['open','quoted'])
              ->when($catIds, fn ($x) => $x->whereIn('category_id', $catIds))
              ->when($portIds, fn ($x) => $x->whereIn('port_id', $portIds));
        }

        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('port_id'), fn ($x) => $x->where('port_id', $request->integer('port_id')))
          ->when($request->filled('category_id'), fn ($x) => $x->where('category_id', $request->integer('category_id')))
          ->when($request->filled('q'), function ($x) use ($request) {
              $s = '%'.$request->string('q').'%';
              $x->where(fn ($w) => $w->where('title','like',$s)->orWhere('vessel_name','like',$s));
          });

        return ApiResponse::paginated($q->paginate(20));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        if (! $user->isBuyer()) {
            return ApiResponse::error('Buyers only.', 403);
        }
        $data = $request->validate([
            'port_id'        => ['required','exists:ports,id'],
            'category_id'    => ['required','exists:categories,id'],
            'subcategory_id' => ['nullable','exists:subcategories,id'],
            'vessel_name'    => ['required','string','max:191'],
            'imo_number'     => ['nullable','string','max:32'],
            'title'          => ['required','string','max:191'],
            'description'    => ['nullable','string'],
            'service_date'   => ['nullable','date'],
            'service_time'   => ['nullable','string','max:16'],
            'budget_min'     => ['nullable','numeric','min:0'],
            'budget_max'     => ['nullable','numeric','gte:budget_min'],
            'currency'       => ['nullable','string','size:3'],
            'urgency'        => ['nullable', Rule::in(['standard','urgent','critical'])],
            'attachments'    => ['nullable','array'],
            'expires_at'     => ['nullable','date'],
        ]);
        $data['buyer_id'] = $user->id;
        $data['status']   = 'open';
        $sr = ServiceRequest::create($data);
        return ApiResponse::created($sr->load(['port','category','subcategory']));
    }

    public function show(Request $request, ServiceRequest $serviceRequest)
    {
        $user = $request->user();
        $ok = $user->isAdmin()
            || $user->isVendor()
            || $serviceRequest->buyer_id === $user->id;
        if (! $ok) return ApiResponse::error('Forbidden.', 403);

        return ApiResponse::ok($serviceRequest->load([
            'port','category','subcategory','buyer:id,name,email,phone',
            'quotations.vendor.vendorProfile',
        ]));
    }

    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        if ($serviceRequest->buyer_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        if ($serviceRequest->status !== 'open') {
            return ApiResponse::error('Only open requests can be edited.', 422);
        }
        $data = $request->validate([
            'title'        => ['sometimes','string','max:191'],
            'description'  => ['sometimes','nullable','string'],
            'budget_min'   => ['sometimes','nullable','numeric','min:0'],
            'budget_max'   => ['sometimes','nullable','numeric'],
            'service_date' => ['sometimes','nullable','date'],
            'service_time' => ['sometimes','nullable','string','max:16'],
            'urgency'      => ['sometimes', Rule::in(['standard','urgent','critical'])],
            'expires_at'   => ['sometimes','nullable','date'],
        ]);
        $serviceRequest->update($data);
        return ApiResponse::ok($serviceRequest->fresh());
    }

    public function destroy(Request $request, ServiceRequest $serviceRequest)
    {
        if ($serviceRequest->buyer_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        if ($serviceRequest->quotations()->exists()) {
            return ApiResponse::error('Cannot delete after quotations have been received.', 422);
        }
        $serviceRequest->delete();
        return ApiResponse::ok(null, 'Deleted');
    }

    public function cancel(Request $request, ServiceRequest $serviceRequest)
    {
        if ($serviceRequest->buyer_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        $serviceRequest->update(['status' => 'cancelled']);
        return ApiResponse::ok($serviceRequest);
    }
}
