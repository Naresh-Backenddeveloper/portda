<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderEvent;
use App\Models\Quotation;
use App\Models\QuotationRevision;
use App\Models\ServiceRequest;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $q = Quotation::query()
            ->with(['serviceRequest:id,reference,title,buyer_id,status','vendor.vendorProfile'])
            ->latest();

        if ($user->isVendor()) {
            $q->where('vendor_id', $user->id);
        } elseif ($user->isBuyer()) {
            $q->whereHas('serviceRequest', fn ($x) => $x->where('buyer_id', $user->id));
        }

        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('service_request_id'), fn ($x) => $x->where('service_request_id', $request->integer('service_request_id')));

        return ApiResponse::paginated($q->paginate(20));
    }

    public function store(Request $request)
    {
        $user = $request->user();
        if (! $user->isVendor()) return ApiResponse::error('Vendors only.', 403);

        $data = $request->validate([
            'service_request_id' => ['required','exists:service_requests,id'],
            'amount'             => ['required','numeric','min:0'],
            'currency'           => ['nullable','string','size:3'],
            'notes'              => ['nullable','string'],
            'line_items'         => ['nullable','array'],
            'valid_until'        => ['nullable','date'],
            'terms'              => ['nullable','array'],
            'is_negotiable'      => ['nullable','boolean'],
        ]);

        $sr = ServiceRequest::findOrFail($data['service_request_id']);
        if (! in_array($sr->status, ['open','quoted'], true)) {
            return ApiResponse::error('Request not open for quotes.', 422);
        }
        if (Quotation::where('service_request_id', $sr->id)->where('vendor_id', $user->id)->exists()) {
            return ApiResponse::error('You have already quoted on this request.', 422);
        }

        $q = DB::transaction(function () use ($data, $user, $sr) {
            $q = Quotation::create($data + ['vendor_id' => $user->id, 'status' => 'submitted']);
            if ($sr->status === 'open') $sr->update(['status' => 'quoted']);
            Notification::create([
                'user_id'    => $sr->buyer_id,
                'type'       => 'quotation.received',
                'title'      => 'New quotation received',
                'body'       => "Quote for {$sr->reference}: ".number_format($q->amount, 2),
                'action_url' => "/buyer/quotations?id={$q->id}",
            ]);
            return $q;
        });

        return ApiResponse::created($q->load(['serviceRequest','vendor.vendorProfile']));
    }

    public function show(Request $request, Quotation $quotation)
    {
        $user = $request->user();
        $sr   = $quotation->serviceRequest;
        $ok   = $user->isAdmin() || $quotation->vendor_id === $user->id || $sr->buyer_id === $user->id;
        if (! $ok) return ApiResponse::error('Forbidden.', 403);
        return ApiResponse::ok($quotation->load(['serviceRequest','vendor.vendorProfile','revisions.proposer:id,name']));
    }

    public function update(Request $request, Quotation $quotation)
    {
        if ($quotation->vendor_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        if ($quotation->status !== 'submitted') {
            return ApiResponse::error('Only submitted quotations can be edited.', 422);
        }
        $data = $request->validate([
            'amount'      => ['sometimes','numeric','min:0'],
            'notes'       => ['sometimes','nullable','string'],
            'line_items'  => ['sometimes','nullable','array'],
            'terms'       => ['sometimes','nullable','array'],
            'valid_until' => ['sometimes','nullable','date'],
        ]);
        $quotation->update($data);
        return ApiResponse::ok($quotation->fresh());
    }

    public function withdraw(Request $request, Quotation $quotation)
    {
        if ($quotation->vendor_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        $quotation->update(['status' => 'withdrawn']);
        return ApiResponse::ok($quotation);
    }

    public function accept(Request $request, Quotation $quotation)
    {
        $sr = $quotation->serviceRequest;
        if ($sr->buyer_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        if ($quotation->status !== 'submitted') {
            return ApiResponse::error('Quotation not available for acceptance.', 422);
        }

        $order = DB::transaction(function () use ($quotation, $sr) {
            $quotation->update(['status' => 'accepted', 'accepted_at' => now()]);
            Quotation::where('service_request_id', $sr->id)
                ->where('id', '!=', $quotation->id)
                ->where('status', 'submitted')
                ->update(['status' => 'rejected']);
            $sr->update(['status' => 'awarded']);

            $commission = round(((float) $quotation->amount) * 0.10, 2);
            $order = Order::create([
                'service_request_id' => $sr->id,
                'quotation_id'       => $quotation->id,
                'buyer_id'           => $sr->buyer_id,
                'vendor_id'          => $quotation->vendor_id,
                'subtotal'           => $quotation->amount,
                'tax'                => 0,
                'commission'         => $commission,
                'total'              => $quotation->amount,
                'currency'           => $quotation->currency ?: 'INR',
                'status'             => 'placed',
                'payment_status'     => 'pending',
            ]);
            OrderEvent::create([
                'order_id' => $order->id,
                'actor_id' => $sr->buyer_id,
                'event'    => 'order_placed',
                'message'  => 'Order placed via quotation acceptance',
            ]);
            Notification::create([
                'user_id'    => $quotation->vendor_id,
                'type'       => 'quotation.accepted',
                'title'      => 'Your quote was accepted!',
                'body'       => "Order {$order->reference} placed.",
                'action_url' => "/vendor/orders?id={$order->id}",
            ]);
            return $order;
        });

        return ApiResponse::created($order->load(['serviceRequest','quotation','buyer','vendor']));
    }

    public function reject(Request $request, Quotation $quotation)
    {
        $sr = $quotation->serviceRequest;
        if ($sr->buyer_id !== $request->user()->id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        $quotation->update(['status' => 'rejected']);
        return ApiResponse::ok($quotation);
    }

    public function proposeRevision(Request $request, Quotation $quotation)
    {
        $user = $request->user();
        $sr   = $quotation->serviceRequest;
        $ok   = $user->id === $quotation->vendor_id || $user->id === $sr->buyer_id;
        if (! $ok) return ApiResponse::error('Forbidden.', 403);

        $data = $request->validate([
            'amount' => ['required','numeric','min:0'],
            'notes'  => ['nullable','string'],
        ]);
        $rev = QuotationRevision::create($data + [
            'quotation_id' => $quotation->id,
            'proposed_by'  => $user->id,
            'status'       => 'pending',
        ]);
        return ApiResponse::created($rev);
    }
}
