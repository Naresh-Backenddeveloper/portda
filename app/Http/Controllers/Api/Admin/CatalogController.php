<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CommissionRule;
use App\Models\Plan;
use App\Models\Port;
use App\Models\Subcategory;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CatalogController extends Controller
{
    /* ---------- Categories ---------- */
    public function categoriesIndex() { return ApiResponse::paginated(Category::orderBy('display_order')->paginate(50)); }
    public function categoriesStore(Request $r)
    {
        $data = $r->validate([
            'name'          => ['required','string','max:120'],
            'slug'          => ['required','string','max:120','unique:categories,slug'],
            'icon'          => ['nullable','string','max:8'],
            'description'   => ['nullable','string'],
            'display_order' => ['nullable','integer'],
            'is_active'     => ['nullable','boolean'],
        ]);
        return ApiResponse::created(Category::create($data));
    }
    public function categoriesUpdate(Request $r, Category $category)
    {
        $data = $r->validate([
            'name'          => ['sometimes','string','max:120'],
            'slug'          => ['sometimes','string','max:120', Rule::unique('categories','slug')->ignore($category->id)],
            'icon'          => ['sometimes','nullable','string','max:8'],
            'description'   => ['sometimes','nullable','string'],
            'display_order' => ['sometimes','integer'],
            'is_active'     => ['sometimes','boolean'],
        ]);
        $category->update($data);
        return ApiResponse::ok($category->fresh());
    }
    public function categoriesDestroy(Category $category) { $category->delete(); return ApiResponse::ok(null, 'Deleted'); }

    /* ---------- Subcategories ---------- */
    public function subcategoriesIndex(Request $r)
    {
        $q = Subcategory::query()->with('category:id,name');
        $q->when($r->filled('category_id'), fn ($x) => $x->where('category_id', $r->integer('category_id')));
        return ApiResponse::paginated($q->paginate(50));
    }
    public function subcategoriesStore(Request $r)
    {
        $data = $r->validate([
            'category_id'   => ['required','exists:categories,id'],
            'name'          => ['required','string','max:120'],
            'slug'          => ['required','string','max:120'],
            'description'   => ['nullable','string'],
            'display_order' => ['nullable','integer'],
            'is_active'     => ['nullable','boolean'],
        ]);
        return ApiResponse::created(Subcategory::create($data));
    }
    public function subcategoriesUpdate(Request $r, Subcategory $subcategory)
    {
        $data = $r->validate([
            'name'          => ['sometimes','string','max:120'],
            'slug'          => ['sometimes','string','max:120'],
            'description'   => ['sometimes','nullable','string'],
            'display_order' => ['sometimes','integer'],
            'is_active'     => ['sometimes','boolean'],
        ]);
        $subcategory->update($data);
        return ApiResponse::ok($subcategory->fresh());
    }
    public function subcategoriesDestroy(Subcategory $subcategory) { $subcategory->delete(); return ApiResponse::ok(null, 'Deleted'); }

    /* ---------- Ports ---------- */
    public function portsIndex() { return ApiResponse::paginated(Port::orderBy('name')->paginate(50)); }
    public function portsStore(Request $r)
    {
        $data = $r->validate([
            'name'      => ['required','string','max:120'],
            'code'      => ['required','string','max:16','unique:ports,code'],
            'country'   => ['nullable','string','max:64'],
            'region'    => ['nullable','string','max:64'],
            'lat'       => ['nullable','numeric'],
            'lng'       => ['nullable','numeric'],
            'is_active' => ['nullable','boolean'],
        ]);
        return ApiResponse::created(Port::create($data));
    }
    public function portsUpdate(Request $r, Port $port)
    {
        $data = $r->validate([
            'name'      => ['sometimes','string','max:120'],
            'code'      => ['sometimes','string','max:16', Rule::unique('ports','code')->ignore($port->id)],
            'country'   => ['sometimes','nullable','string','max:64'],
            'region'    => ['sometimes','nullable','string','max:64'],
            'lat'       => ['sometimes','nullable','numeric'],
            'lng'       => ['sometimes','nullable','numeric'],
            'is_active' => ['sometimes','boolean'],
        ]);
        $port->update($data);
        return ApiResponse::ok($port->fresh());
    }
    public function portsDestroy(Port $port) { $port->delete(); return ApiResponse::ok(null, 'Deleted'); }

    /* ---------- Plans ---------- */
    public function plansIndex() { return ApiResponse::paginated(Plan::orderBy('price_monthly')->paginate(50)); }
    public function plansStore(Request $r)
    {
        $data = $r->validate([
            'name'          => ['required','string','max:120'],
            'slug'          => ['required','string','max:120','unique:plans,slug'],
            'audience'      => ['required', Rule::in(['vendor','buyer'])],
            'price_monthly' => ['required','numeric','min:0'],
            'price_yearly'  => ['required','numeric','min:0'],
            'currency'      => ['nullable','string','size:3'],
            'features'      => ['nullable','array'],
            'lead_credits'  => ['nullable','integer','min:0'],
            'is_active'     => ['nullable','boolean'],
        ]);
        return ApiResponse::created(Plan::create($data));
    }
    public function plansUpdate(Request $r, Plan $plan)
    {
        $data = $r->validate([
            'name'          => ['sometimes','string','max:120'],
            'slug'          => ['sometimes','string','max:120', Rule::unique('plans','slug')->ignore($plan->id)],
            'audience'      => ['sometimes', Rule::in(['vendor','buyer'])],
            'price_monthly' => ['sometimes','numeric','min:0'],
            'price_yearly'  => ['sometimes','numeric','min:0'],
            'features'      => ['sometimes','nullable','array'],
            'lead_credits'  => ['sometimes','integer','min:0'],
            'is_active'     => ['sometimes','boolean'],
        ]);
        $plan->update($data);
        return ApiResponse::ok($plan->fresh());
    }
    public function plansDestroy(Plan $plan) { $plan->delete(); return ApiResponse::ok(null, 'Deleted'); }

    /* ---------- Commission rules ---------- */
    public function commissionsIndex() { return ApiResponse::paginated(CommissionRule::with(['category:id,name','port:id,name'])->paginate(50)); }
    public function commissionsStore(Request $r)
    {
        $data = $r->validate([
            'category_id' => ['nullable','exists:categories,id'],
            'port_id'     => ['nullable','exists:ports,id'],
            'type'        => ['required', Rule::in(['flat','percentage'])],
            'value'       => ['required','numeric','min:0'],
            'is_active'   => ['nullable','boolean'],
        ]);
        return ApiResponse::created(CommissionRule::create($data));
    }
    public function commissionsUpdate(Request $r, CommissionRule $commission)
    {
        $data = $r->validate([
            'category_id' => ['sometimes','nullable','exists:categories,id'],
            'port_id'     => ['sometimes','nullable','exists:ports,id'],
            'type'        => ['sometimes', Rule::in(['flat','percentage'])],
            'value'       => ['sometimes','numeric','min:0'],
            'is_active'   => ['sometimes','boolean'],
        ]);
        $commission->update($data);
        return ApiResponse::ok($commission->fresh());
    }
    public function commissionsDestroy(CommissionRule $commission) { $commission->delete(); return ApiResponse::ok(null, 'Deleted'); }
}
