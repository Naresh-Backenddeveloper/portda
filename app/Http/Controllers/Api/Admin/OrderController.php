<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderEvent;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $q = Order::query()
            ->with(['buyer:id,name','vendor:id,name','serviceRequest:id,reference,title'])
            ->latest();
        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('payment_status'), fn ($x) => $x->where('payment_status', $request->string('payment_status')))
          ->when($request->filled('date_from'), fn ($x) => $x->whereDate('created_at','>=',$request->date('date_from')))
          ->when($request->filled('date_to'),   fn ($x) => $x->whereDate('created_at','<=',$request->date('date_to')));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function show(Order $order)
    {
        return ApiResponse::ok($order->load([
            'buyer','vendor','serviceRequest.port','quotation','payments','invoice','review',
            'events' => fn ($q) => $q->latest()->limit(30),
        ]));
    }

    public function forceComplete(Request $request, Order $order)
    {
        $order->update(['status' => 'completed', 'completed_at' => now()]);
        OrderEvent::create(['order_id' => $order->id, 'actor_id' => $request->user()->id, 'event' => 'force_completed']);
        return ApiResponse::ok($order->fresh());
    }

    public function forceCancel(Request $request, Order $order)
    {
        $data = $request->validate(['reason' => ['required','string','max:500']]);
        $order->update(['status' => 'cancelled', 'cancelled_at' => now(), 'cancel_reason' => $data['reason']]);
        OrderEvent::create(['order_id' => $order->id, 'actor_id' => $request->user()->id, 'event' => 'force_cancelled', 'message' => $data['reason']]);
        return ApiResponse::ok($order->fresh());
    }
}
