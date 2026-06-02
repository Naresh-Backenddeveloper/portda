<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plan;
use App\Models\Port;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function ports(Request $request)
    {
        $q = Port::where('is_active', true);
        if ($request->filled('q')) {
            $s = '%'.$request->string('q').'%';
            $q->where(fn ($x) => $x->where('name','like',$s)->orWhere('code','like',$s));
        }
        return ApiResponse::ok($q->orderBy('name')->limit(200)->get());
    }

    public function categories()
    {
        return ApiResponse::ok(
            Category::where('is_active', true)
                ->with(['subcategories' => fn ($q) => $q->where('is_active', true)->orderBy('display_order')])
                ->orderBy('display_order')
                ->get()
        );
    }

    public function category(string $id)
    {
        $cat = Category::where('id', $id)->orWhere('slug', $id)->firstOrFail();
        $cat->load(['subcategories' => fn ($q) => $q->where('is_active', true)->orderBy('display_order')]);
        return ApiResponse::ok($cat);
    }

    public function plans(Request $request)
    {
        $q = Plan::where('is_active', true);
        if ($request->filled('audience')) {
            $q->where('audience', $request->string('audience'));
        }
        return ApiResponse::ok($q->orderBy('price_monthly')->get());
    }

    public function heroSlides()
    {
        return ApiResponse::ok(
            DB::table('hero_slides')->where('is_active', true)->orderBy('display_order')->get()
        );
    }
}
