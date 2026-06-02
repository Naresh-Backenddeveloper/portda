<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderEvent;
use App\Models\Payment;
use App\Models\Payout;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $q = Payment::query()->with(['order:id,reference,buyer_id,vendor_id'])->latest();

        if ($user->isBuyer()) {
            $q->where('payer_id', $user->id);
        } elseif ($user->isVendor()) {
            $q->whereHas('order', fn ($x) => $x->where('vendor_id', $user->id));
        }

        $q->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('method'), fn ($x) => $x->where('method', $request->string('method')))
          ->when($request->filled('date_from'), fn ($x) => $x->whereDate('created_at', '>=', $request->date('date_from')))
          ->when($request->filled('date_to'),   fn ($x) => $x->whereDate('created_at', '<=', $request->date('date_to')));

        return ApiResponse::paginated($q->paginate(20));
    }

    public function show(Request $request, Payment $payment)
    {
        $u = $request->user();
        $order = $payment->order;
        $ok = $u->isAdmin() || $u->id === $order->buyer_id || $u->id === $order->vendor_id;
        if (! $ok) return ApiResponse::error('Forbidden.', 403);
        return ApiResponse::ok($payment->load('order'));
    }

    public function initiate(Request $request)
    {
        $u = $request->user();
        if (! $u->isBuyer()) return ApiResponse::error('Buyers only.', 403);

        $data = $request->validate([
            'order_id' => ['required','exists:orders,id'],
            'amount'   => ['required','numeric','min:1'],
            'method'   => ['required', Rule::in(['upi','card','netbanking','razorpay'])],
        ]);
        $order = Order::findOrFail($data['order_id']);
        if ($order->buyer_id !== $u->id) return ApiResponse::error('Forbidden.', 403);

        $payment = Payment::create([
            'order_id' => $order->id,
            'payer_id' => $u->id,
            'amount'   => $data['amount'],
            'currency' => $order->currency,
            'method'   => $data['method'],
            'type'     => 'online',
            'status'   => 'initiated',
        ]);

        return ApiResponse::created([
            'payment' => $payment,
            'gateway' => [
                'order_id'     => 'mock_'.uniqid(),
                'checkout_url' => url('/mock-gateway/'.$payment->reference),
                'key'          => 'mock_key_xxxxx',
            ],
        ]);
    }

    public function confirm(Request $request, Payment $payment)
    {
        $data = $request->validate(['gateway_txn_id' => ['required','string','max:120']]);

        if ($payment->status === 'success') {
            return ApiResponse::ok($payment, 'Already confirmed');
        }

        DB::transaction(function () use ($payment, $data) {
            $payment->update([
                'status'         => 'success',
                'paid_at'        => now(),
                'gateway_txn_id' => $data['gateway_txn_id'],
            ]);
            $order = $payment->order;
            $order->update(['payment_status' => 'paid']);
            OrderEvent::create(['order_id' => $order->id, 'actor_id' => $payment->payer_id, 'event' => 'paid']);
            Notification::create([
                'user_id'    => $order->vendor_id,
                'type'       => 'payment.received',
                'title'      => 'Payment received',
                'body'       => "Payment for {$order->reference}: ".number_format($payment->amount, 2),
                'action_url' => "/vendor/payouts",
            ]);
            $this->ensureInvoiceAndPayout($order);
        });

        return ApiResponse::ok($payment->fresh()->load('order'));
    }

    public function submitOffline(Request $request)
    {
        $u = $request->user();
        if (! $u->isBuyer()) return ApiResponse::error('Buyers only.', 403);

        $data = $request->validate([
            'order_id'   => ['required','exists:orders,id'],
            'amount'     => ['required','numeric','min:1'],
            'method'     => ['required', Rule::in(['neft','rtgs'])],
            'utr_number' => ['required','string','max:32'],
            'proof'      => ['nullable','file','max:5120'],
        ]);
        $order = Order::findOrFail($data['order_id']);
        if ($order->buyer_id !== $u->id) return ApiResponse::error('Forbidden.', 403);

        $proofPath = isset($data['proof'])
            ? Storage::disk('public')->putFile('payment-proofs', $data['proof'])
            : null;

        $payment = Payment::create([
            'order_id'   => $order->id,
            'payer_id'   => $u->id,
            'amount'     => $data['amount'],
            'currency'   => $order->currency,
            'method'     => $data['method'],
            'type'       => 'offline',
            'status'     => 'pending',
            'utr_number' => $data['utr_number'],
            'proof_path' => $proofPath,
        ]);

        User::where('role', 'admin')->get()->each(function ($admin) use ($order, $payment) {
            Notification::create([
                'user_id'    => $admin->id,
                'type'       => 'payment.offline_pending',
                'title'      => 'Offline payment to verify',
                'body'       => "Order {$order->reference} — UTR {$payment->utr_number}",
                'action_url' => "/admin/payments?id={$payment->id}",
            ]);
        });

        return ApiResponse::created($payment);
    }

    public function verifyOffline(Request $request, Payment $payment)
    {
        if (! $request->user()->isAdmin()) return ApiResponse::error('Forbidden.', 403);
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
                'body'       => "Order {$order->reference} paid via {$payment->method}.",
                'action_url' => "/vendor/payouts",
            ]);
            $this->ensureInvoiceAndPayout($order);
        });

        return ApiResponse::ok($payment->fresh());
    }

    protected function ensureInvoiceAndPayout(Order $order): void
    {
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
    }
}
