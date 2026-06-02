<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\VendorProfile;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class VendorDirectoryController extends Controller
{
    public function index(Request $request)
    {
        $q = VendorProfile::query()
            ->with(['user:id,name,email,avatar'])
            ->where('verification_status', 'verified');

        if ($request->filled('port_id')) {
            $q->whereHas('ports', fn ($x) => $x->where('ports.id', $request->integer('port_id')));
        }
        if ($request->filled('category_id')) {
            $q->whereHas('categories', fn ($x) => $x->where('categories.id', $request->integer('category_id')));
        }
        if ($request->filled('subcategory_id')) {
            $q->whereHas('subcategories', fn ($x) => $x->where('subcategories.id', $request->integer('subcategory_id')));
        }
        if ($request->filled('q')) {
            $s = '%'.$request->string('q').'%';
            $q->where('company_name', 'like', $s);
        }
        if ($request->filled('min_rating')) {
            $q->where('rating', '>=', (float) $request->input('min_rating'));
        }
        if ($request->boolean('premium_only')) {
            $q->where('is_premium', true);
        }

        $q->orderByDesc('is_premium')->orderByDesc('rating')->orderByDesc('jobs_completed');

        return ApiResponse::paginated($q->paginate(20));
    }

    public function show(VendorProfile $vendor)
    {
        $vendor->load(['user:id,name,email,avatar', 'categories', 'subcategories', 'ports']);
        $recentReviews = Review::where('vendor_id', $vendor->user_id)
            ->where('status', 'published')
            ->with('buyer:id,name,avatar')
            ->latest()
            ->limit(5)
            ->get();
        return ApiResponse::ok([
            'vendor'  => $vendor,
            'reviews' => $recentReviews,
        ]);
    }
}
