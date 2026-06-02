<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        return ApiResponse::ok(
            Subscription::where('user_id', $request->user()->id)->with('plan')->latest()->get()
        );
    }

    public function current(Request $request)
    {
        $sub = Subscription::where('user_id', $request->user()->id)
            ->where('status','active')
            ->with('plan')
            ->latest()
            ->first();
        return ApiResponse::ok($sub);
    }

    public function subscribe(Request $request)
    {
        $u = $request->user();
        $data = $request->validate([
            'plan_id'       => ['required','exists:plans,id'],
            'billing_cycle' => ['required', Rule::in(['monthly','yearly'])],
        ]);
        $plan = Plan::where('id', $data['plan_id'])->where('is_active', true)->firstOrFail();

        $sub = DB::transaction(function () use ($u, $plan, $data) {
            Subscription::where('user_id', $u->id)->where('status','active')->update([
                'status' => 'cancelled', 'cancelled_at' => now(),
            ]);
            $cycle = $data['billing_cycle'];
            $amount = $cycle === 'yearly' ? $plan->price_yearly : $plan->price_monthly;
            $end    = $cycle === 'yearly' ? now()->addYear() : now()->addMonth();
            return Subscription::create([
                'user_id'            => $u->id,
                'plan_id'            => $plan->id,
                'billing_cycle'      => $cycle,
                'amount'             => $amount,
                'currency'           => $plan->currency,
                'status'             => 'active',
                'started_at'         => now(),
                'current_period_end' => $end,
                'credits_remaining'  => $plan->lead_credits,
            ]);
        });
        return ApiResponse::created($sub->load('plan'));
    }

    public function cancel(Request $request, Subscription $subscription)
    {
        if ($subscription->user_id !== $request->user()->id) return ApiResponse::error('Forbidden.', 403);
        $subscription->update(['status' => 'cancelled', 'cancelled_at' => now()]);
        return ApiResponse::ok($subscription);
    }
}
