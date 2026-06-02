<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Review;
use App\Models\VendorProfile;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $q = Review::query()
            ->with(['buyer:id,name,avatar','vendor:id,name','order:id,reference'])
            ->where('status','published')
            ->latest();

        if ($request->filled('vendor_id')) {
            $q->where('vendor_id', $request->integer('vendor_id'));
        } elseif ($request->filled('order_id')) {
            $q->where('order_id', $request->integer('order_id'));
        } elseif ($user) {
            if ($user->isBuyer())  $q->where('buyer_id', $user->id);
            if ($user->isVendor()) $q->where('vendor_id', $user->id);
        }

        return ApiResponse::paginated($q->paginate(20));
    }

    public function store(Request $request)
    {
        $u = $request->user();
        if (! $u->isBuyer()) return ApiResponse::error('Buyers only.', 403);

        $data = $request->validate([
            'order_id' => ['required','exists:orders,id'],
            'rating'   => ['required','integer','min:1','max:5'],
            'title'    => ['nullable','string','max:191'],
            'body'     => ['nullable','string'],
            'tags'     => ['nullable','array'],
        ]);

        $order = Order::findOrFail($data['order_id']);
        if ($order->buyer_id !== $u->id) return ApiResponse::error('Forbidden.', 403);
        if ($order->status !== 'completed') return ApiResponse::error('Only completed orders can be reviewed.', 422);
        if (Review::where('order_id', $order->id)->exists()) {
            return ApiResponse::error('Review already submitted.', 422);
        }

        $review = Review::create($data + [
            'buyer_id'  => $order->buyer_id,
            'vendor_id' => $order->vendor_id,
            'status'    => 'published',
        ]);

        // Recompute vendor rating
        $stats = Review::where('vendor_id', $order->vendor_id)
            ->where('status','published')
            ->selectRaw('AVG(rating) avg, COUNT(*) c')
            ->first();
        VendorProfile::where('user_id', $order->vendor_id)->update([
            'rating'        => round($stats->avg ?? 0, 2),
            'rating_count'  => (int) ($stats->c ?? 0),
        ]);

        Notification::create([
            'user_id'    => $order->vendor_id,
            'type'       => 'review.new',
            'title'      => 'New review received',
            'body'       => "{$review->rating}★ from {$u->name}",
            'action_url' => "/vendor/reviews",
        ]);

        return ApiResponse::created($review);
    }

    public function show(Review $review)
    {
        return ApiResponse::ok($review->load(['buyer:id,name,avatar','vendor:id,name','order:id,reference']));
    }

    public function reply(Request $request, Review $review)
    {
        if ($review->vendor_id !== $request->user()->id) return ApiResponse::error('Forbidden.', 403);
        $data = $request->validate(['vendor_reply' => ['required','string','max:1000']]);
        $review->update(['vendor_reply' => $data['vendor_reply'], 'replied_at' => now()]);
        return ApiResponse::ok($review->fresh());
    }
}
