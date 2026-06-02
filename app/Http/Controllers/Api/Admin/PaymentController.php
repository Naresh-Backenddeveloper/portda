<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\OrderEvent;
use App\Models\Payment;
use App\Models\Payout;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $q = Payment::query()->with(['order:id,reference,buyer_id,vendor_id'])->latest();
        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('method'), fn ($x) => $x->where('method', $request->string('method')))
          ->when($request->filled('date_from'), fn ($x) => $x->whereDate('created_at','>=',$request->date('date_from')))
          ->when($request->filled('date_to'),   fn ($x) => $x->whereDate('created_at','<=',$request->date('date_to')));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function verifyOffline(Request $request, Payment $payment)
    {
        if ($payment->type !== 'offline') return ApiResponse::error('Not an offline payment.', 422);

        DB::transaction(function () use ($payment, $request) {
            $payment->update([
                'status'      => 'success',
                'verified_by' => $request->user()->id,
                'verified_at' => now(),
                'paid_at'     => now(),
            ]);
            $order = $payment->order;
            $order->update(['payment_status' => 'paid']);
            OrderEvent::create(['order_id' => $order->id, 'actor_id' => $request->user()->id, 'event' => 'paid', 'message' => 'Offline payment verified']);
            Notification::create([
                'user_id'    => $order->vendor_id,
                'type'       => 'payment.received',
                'title'      => 'Payment received',
                'body'       => "Order {$order->reference} paid.",
                'action_url' => "/vendor/payouts",
            ]);
            if (! Invoice::where('order_id', $order->id)->exists()) {
                Invoice::create([
                    'number'    => 'INV-'.strtoupper(uniqid()),
                    'order_id'  => $order->id,
                    'buyer_id'  => $order->buyer_id,
                    'vendor_id' => $order->vendor_id,
                    'subtotal'  => $order->subtotal,
                    'tax'       => $order->tax,
                    'total'     => $order->total,
                    'currency'  => $order->currency,
                    'status'    => 'issued',
                    'issued_at' => now()->toDateString(),
                ]);
            }
            if (! Payout::where('order_id', $order->id)->exists()) {
                Payout::create([
                    'vendor_id'  => $order->vendor_id,
                    'order_id'   => $order->id,
                    'amount'     => $order->total,
                    'commission' => $order->commission,
                    'net_amount' => max(0, (float) $order->total - (float) $order->commission),
                    'currency'   => $order->currency,
                    'status'     => 'pending',
                ]);
            }
        });

        return ApiResponse::ok($payment->fresh());
    }

    public function markFailed(Request $request, Payment $payment)
    {
        $request->validate(['reason' => ['required','string','max:500']]);
        $payment->update(['status' => 'failed']);
        return ApiResponse::ok($payment->fresh());
    }

    public function payouts(Request $request)
    {
        $q = Payout::query()->with(['vendor:id,name','order:id,reference'])->latest();
        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')));
        return ApiResponse::paginated($q->paginate(25));
    }

    public function processPayout(Request $request, Payout $payout)
    {
        $data = $request->validate(['utr_number' => ['required','string','max:32']]);
        $payout->update([
            'status'     => 'paid',
            'paid_at'    => now(),
            'utr_number' => $data['utr_number'],
        ]);
        return ApiResponse::ok($payout->fresh());
    }
}
