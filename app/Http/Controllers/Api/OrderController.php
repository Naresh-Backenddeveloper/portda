<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderEvent;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $q = Order::query()
            ->with(['serviceRequest.port:id,name,code','buyer:id,name','vendor:id,name','payments'])
            ->latest();

        if ($user->isBuyer()) {
            $q->where('buyer_id', $user->id);
        } elseif ($user->isVendor()) {
            $q->where('vendor_id', $user->id);
        }

        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('payment_status'), fn ($x) => $x->where('payment_status', $request->string('payment_status')))
          ->when($request->filled('date_from'), fn ($x) => $x->whereDate('created_at', '>=', $request->date('date_from')))
          ->when($request->filled('date_to'),   fn ($x) => $x->whereDate('created_at', '<=', $request->date('date_to')));

        return ApiResponse::paginated($q->paginate(20));
    }

    public function show(Request $request, Order $order)
    {
        $u = $request->user();
        if (! ($u->isAdmin() || $u->id === $order->buyer_id || $u->id === $order->vendor_id)) {
            return ApiResponse::error('Forbidden.', 403);
        }
        return ApiResponse::ok($order->load([
            'serviceRequest.port','serviceRequest.category',
            'quotation',
            'buyer.buyerProfile','vendor.vendorProfile',
            'payments','invoice','review',
            'events' => fn ($q) => $q->latest()->limit(20),
        ]));
    }

    public function start(Request $request, Order $order)
    {
        if ($order->vendor_id !== $request->user()->id) return ApiResponse::error('Forbidden.', 403);
        if (! in_array($order->status, ['placed','confirmed'], true)) {
            return ApiResponse::error('Cannot start in current state.', 422);
        }
        $order->update(['status' => 'in_progress', 'started_at' => now()]);
        OrderEvent::create(['order_id' => $order->id, 'actor_id' => $request->user()->id, 'event' => 'started']);
        Notification::create([
            'user_id'    => $order->buyer_id,
            'type'       => 'order.started',
            'title'      => 'Service started',
            'body'       => "Order {$order->reference} has started.",
            'action_url' => "/buyer/orders?id={$order->id}",
        ]);
        return ApiResponse::ok($order->fresh());
    }

    public function complete(Request $request, Order $order)
    {
        if ($order->vendor_id !== $request->user()->id) return ApiResponse::error('Forbidden.', 403);
        $order->update(['status' => 'completed', 'completed_at' => now()]);
        OrderEvent::create(['order_id' => $order->id, 'actor_id' => $request->user()->id, 'event' => 'completed']);
        Notification::create([
            'user_id'    => $order->buyer_id,
            'type'       => 'order.completed',
            'title'      => 'Order completed',
            'body'       => "Order {$order->reference} marked complete.",
            'action_url' => "/buyer/orders?id={$order->id}",
        ]);
        return ApiResponse::ok($order->fresh());
    }

    public function cancel(Request $request, Order $order)
    {
        $u = $request->user();
        if (! ($u->id === $order->buyer_id || $u->id === $order->vendor_id || $u->isAdmin())) {
            return ApiResponse::error('Forbidden.', 403);
        }
        if (! in_array($order->status, ['placed','confirmed'], true)) {
            return ApiResponse::error('Cannot cancel in current state.', 422);
        }
        $data = $request->validate(['cancel_reason' => ['required','string','max:500']]);
        $order->update([
            'status' => 'cancelled', 'cancelled_at' => now(), 'cancel_reason' => $data['cancel_reason'],
        ]);
        OrderEvent::create([
            'order_id' => $order->id, 'actor_id' => $u->id, 'event' => 'cancelled', 'message' => $data['cancel_reason'],
        ]);
        $otherUser = $u->id === $order->buyer_id ? $order->vendor_id : $order->buyer_id;
        Notification::create([
            'user_id'    => $otherUser,
            'type'       => 'order.cancelled',
            'title'      => 'Order cancelled',
            'body'       => "Order {$order->reference} cancelled.",
            'action_url' => "/orders/{$order->id}",
        ]);
        return ApiResponse::ok($order->fresh());
    }

    public function reschedule(Request $request, Order $order)
    {
        $u = $request->user();
        if (! ($u->id === $order->buyer_id || $u->id === $order->vendor_id || $u->isAdmin())) {
            return ApiResponse::error('Forbidden.', 403);
        }
        $data = $request->validate(['scheduled_at' => ['required','date']]);
        $order->update(['scheduled_at' => $data['scheduled_at']]);
        OrderEvent::create([
            'order_id' => $order->id, 'actor_id' => $u->id, 'event' => 'rescheduled',
            'payload' => ['scheduled_at' => $data['scheduled_at']],
        ]);
        return ApiResponse::ok($order->fresh());
    }
}
