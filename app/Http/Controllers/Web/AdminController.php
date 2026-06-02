<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Broadcast;
use App\Models\Category;
use App\Models\CommissionRule;
use App\Models\Dispute;
use App\Models\KycDocument;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Payout;
use App\Models\Plan;
use App\Models\Port;
use App\Models\Quotation;
use App\Models\Review;
use App\Models\ServiceRequest;
use App\Models\Subcategory;
use App\Models\Subscription;
use App\Models\User;
use App\Models\VendorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /* ---------------- Users ---------------- */
    public function users(Request $request)
    {
        $q = User::with(['buyerProfile','vendorProfile'])->latest();
        if ($request->filled('role'))   $q->where('role', $request->role);
        if ($request->filled('status')) $q->where('status', $request->status);
        if ($request->filled('q')) {
            $s = '%'.$request->q.'%';
            $q->where(fn($w) => $w->where('name','like',$s)->orWhere('email','like',$s));
        }
        $items = $q->paginate(25)->withQueryString();
        return view('admin.users', compact('items'));
    }

    public function buyerDetail(Request $request, User $user)
    {
        $user->load(['buyerProfile.defaultPort','kycDocuments','buyerOrders'=>fn($q)=>$q->latest()->limit(20)]);
        return view('admin.buyer-detail', compact('user'));
    }

    public function suspendUser(Request $request, User $user) { $user->update(['status'=>'suspended']); return back()->with('flash','User suspended.'); }
    public function activateUser(Request $request, User $user) { $user->update(['status'=>'active']); return back()->with('flash','User activated.'); }

    /* ---------------- Admins ---------------- */
    public function admins(Request $request)
    {
        $items = User::where('role','admin')->latest()->paginate(25);
        return view('admin.admins', compact('items'));
    }

    /* ---------------- Vendors ---------------- */
    public function vendors(Request $request)
    {
        $q = User::where('role','vendor')->with(['vendorProfile.categories','vendorProfile.ports'])->latest();
        if ($request->filled('status'))              $q->where('status', $request->status);
        if ($request->filled('verification_status')) $q->whereHas('vendorProfile', fn($v)=>$v->where('verification_status',$request->verification_status));
        $items = $q->paginate(25)->withQueryString();
        return view('admin.vendors', compact('items'));
    }

    public function vendorDetail(Request $request, User $user)
    {
        $user->load(['vendorProfile.categories','vendorProfile.ports','vendorProfile.subcategories','kycDocuments','vendorOrders'=>fn($q)=>$q->latest()->limit(20)]);
        return view('admin.vendor-detail', compact('user'));
    }

    public function verifyVendor(Request $request, User $user)
    {
        app(\App\Http\Controllers\Api\Admin\VendorController::class)->verify($request, $user);
        return back()->with('flash','Vendor verified.');
    }
    public function rejectVendor(Request $request, User $user)
    {
        $request->merge(['reason' => $request->input('reason','Did not meet standards.')]);
        app(\App\Http\Controllers\Api\Admin\VendorController::class)->reject($request, $user);
        return back()->with('flash','Vendor rejected.');
    }
    public function togglePremium(Request $request, User $user)
    {
        app(\App\Http\Controllers\Api\Admin\VendorController::class)->togglePremium($user);
        return back()->with('flash','Premium flag toggled.');
    }

    /* ---------------- KYC ---------------- */
    public function kyc(Request $request)
    {
        $status = $request->input('status','pending');
        $items = KycDocument::with('user:id,name,email,role')
            ->where('status',$status)
            ->latest()
            ->paginate(25);
        return view('admin.kyc', compact('items','status'));
    }
    public function approveKyc(Request $request, KycDocument $kyc)
    {
        app(\App\Http\Controllers\Api\Admin\KycController::class)->approve($request, $kyc);
        return back()->with('flash','KYC approved.');
    }
    public function rejectKyc(Request $request, KycDocument $kyc)
    {
        $request->merge(['reason'=>$request->input('reason','Did not match guidelines.')]);
        app(\App\Http\Controllers\Api\Admin\KycController::class)->reject($request, $kyc);
        return back()->with('flash','KYC rejected.');
    }

    /* ---------------- Requests ---------------- */
    public function requests(Request $request)
    {
        $q = ServiceRequest::with(['buyer:id,name','port:id,name,code','category:id,name'])
            ->withCount('quotations')
            ->latest();
        if ($request->filled('status')) $q->where('status',$request->status);
        $items = $q->paginate(25)->withQueryString();
        return view('admin.requests', compact('items'));
    }

    /* ---------------- Quote moderation ---------------- */
    public function quoteModeration(Request $request)
    {
        $q = Quotation::with(['vendor:id,name','serviceRequest:id,reference,title,buyer_id','serviceRequest.buyer:id,name'])
            ->latest();
        if ($request->filled('status')) $q->where('status',$request->status);
        $items = $q->paginate(25)->withQueryString();
        return view('admin.quote-moderation', compact('items'));
    }
    public function flagQuotation(Request $request, Quotation $quotation)
    {
        app(\App\Http\Controllers\Api\Admin\QuotationController::class)->flag($quotation);
        return back()->with('flash','Quotation flagged.');
    }

    /* ---------------- Orders ---------------- */
    public function orders(Request $request)
    {
        $q = Order::with(['buyer:id,name','vendor:id,name','serviceRequest:id,reference,title'])->latest();
        if ($request->filled('status'))         $q->where('status',$request->status);
        if ($request->filled('payment_status')) $q->where('payment_status',$request->payment_status);
        $items = $q->paginate(25)->withQueryString();
        return view('admin.orders', compact('items'));
    }
    public function orderDetail(Request $request, Order $order)
    {
        $order->load(['buyer','vendor','serviceRequest.port','quotation','payments','invoice','review','events'=>fn($q)=>$q->latest()->limit(30)]);
        return view('admin.order-detail', compact('order'));
    }
    public function forceCompleteOrder(Request $request, Order $order)
    {
        app(\App\Http\Controllers\Api\Admin\OrderController::class)->forceComplete($request, $order);
        return back()->with('flash','Order force-completed.');
    }
    public function forceCancelOrder(Request $request, Order $order)
    {
        $request->merge(['reason'=>$request->input('reason','Admin cancellation.')]);
        app(\App\Http\Controllers\Api\Admin\OrderController::class)->forceCancel($request, $order);
        return back()->with('flash','Order cancelled.');
    }

    /* ---------------- Reviews ---------------- */
    public function reviews(Request $request)
    {
        $items = Review::with(['buyer:id,name','vendor:id,name','order:id,reference'])->latest()->paginate(25);
        return view('admin.reviews', compact('items'));
    }

    /* ---------------- Disputes ---------------- */
    public function disputes(Request $request)
    {
        $q = Dispute::with(['order:id,reference,buyer_id,vendor_id','raiser:id,name'])->latest();
        if ($request->filled('status')) $q->where('status',$request->status);
        $items = $q->paginate(25)->withQueryString();
        return view('admin.disputes', compact('items'));
    }
    public function resolveDispute(Request $request, Dispute $dispute)
    {
        $request->validate(['resolution'=>['required','string','max:1000']]);
        app(\App\Http\Controllers\Api\Admin\DisputeController::class)->resolve($request, $dispute);
        return back()->with('flash','Dispute resolved.');
    }
    public function escalateDispute(Request $request, Dispute $dispute)
    {
        app(\App\Http\Controllers\Api\Admin\DisputeController::class)->escalate($dispute);
        return back()->with('flash','Dispute escalated.');
    }

    /* ---------------- Payments ---------------- */
    public function payments(Request $request)
    {
        $q = Payment::with(['order:id,reference,buyer_id,vendor_id'])->latest();
        if ($request->filled('status')) $q->where('status',$request->status);
        if ($request->filled('method')) $q->where('method',$request->method);
        $items = $q->paginate(25)->withQueryString();
        return view('admin.payments', compact('items'));
    }
    public function verifyPayment(Request $request, Payment $payment)
    {
        app(\App\Http\Controllers\Api\Admin\PaymentController::class)->verifyOffline($request, $payment);
        return back()->with('flash','Payment verified.');
    }
    public function failPayment(Request $request, Payment $payment)
    {
        $request->merge(['reason'=>$request->input('reason','Marked failed by admin.')]);
        app(\App\Http\Controllers\Api\Admin\PaymentController::class)->markFailed($request, $payment);
        return back()->with('flash','Payment marked failed.');
    }

    /* ---------------- Commission / Subscriptions / Plans ---------------- */
    public function commission(Request $request)
    {
        $items = CommissionRule::with(['category:id,name','port:id,name'])->latest()->paginate(50);
        $categories = Category::orderBy('name')->get();
        $ports = Port::orderBy('name')->get();
        return view('admin.commission', compact('items','categories','ports'));
    }
    public function storeCommission(Request $request)
    {
        $data = $request->validate([
            'category_id'=>['nullable','exists:categories,id'],
            'port_id'    =>['nullable','exists:ports,id'],
            'type'       =>['required', Rule::in(['flat','percentage'])],
            'value'      =>['required','numeric','min:0'],
            'is_active'  =>['nullable','boolean'],
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        CommissionRule::create($data);
        return back()->with('flash','Commission rule added.');
    }
    public function deleteCommission(Request $request, CommissionRule $commission) { $commission->delete(); return back()->with('flash','Rule removed.'); }

    public function subscriptions(Request $request)
    {
        $items = Subscription::with(['user:id,name,email,role','plan:id,name,slug'])->latest()->paginate(25);
        return view('admin.subscriptions', compact('items'));
    }

    public function plans(Request $request)
    {
        $items = Plan::latest()->paginate(25);
        return view('admin.plans', compact('items'));
    }
    public function storePlan(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required','string','max:120'],
            'slug'          => ['required','string','max:120','unique:plans,slug'],
            'audience'      => ['required', Rule::in(['vendor','buyer'])],
            'price_monthly' => ['required','numeric','min:0'],
            'price_yearly'  => ['required','numeric','min:0'],
            'lead_credits'  => ['nullable','integer','min:0'],
            'features'      => ['nullable','string'],
        ]);
        if (!empty($data['features'])) {
            $data['features'] = array_filter(array_map('trim', explode("\n", $data['features'])));
        }
        $data['is_active'] = $request->boolean('is_active', true);
        $data['currency'] = 'INR';
        Plan::create($data);
        return back()->with('flash','Plan created.');
    }
    public function deletePlan(Request $request, Plan $plan) { $plan->delete(); return back()->with('flash','Plan deleted.'); }

    /* ---------------- Categories / Subcategories ---------------- */
    public function categories(Request $request)
    {
        $items = Category::with('subcategories')->orderBy('display_order')->paginate(50);
        return view('admin.categories', compact('items'));
    }
    public function categoryNew(Request $request) { return view('admin.category-new'); }
    public function storeCategory(Request $request)
    {
        $data = $request->validate([
            'name'        => ['required','string','max:120'],
            'slug'        => ['required','string','max:120','unique:categories,slug'],
            'icon'        => ['nullable','string','max:8'],
            'description' => ['nullable','string'],
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        Category::create($data);
        return redirect('/admin/categories')->with('flash','Category created.');
    }
    public function categoryDetail(Request $request, Category $category)
    {
        $category->load('subcategories');
        return view('admin.category-detail', compact('category'));
    }
    public function deleteCategory(Request $request, Category $category) { $category->delete(); return back()->with('flash','Category deleted.'); }

    public function subserviceNew(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.subservice-new', compact('categories'));
    }
    public function storeSubservice(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required','exists:categories,id'],
            'name'        => ['required','string','max:120'],
            'slug'        => ['required','string','max:120'],
            'description' => ['nullable','string'],
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        Subcategory::create($data);
        return redirect('/admin/categories')->with('flash','Subservice added.');
    }

    /* ---------------- Ports ---------------- */
    public function ports(Request $request)
    {
        $items = Port::orderBy('name')->paginate(50);
        return view('admin.ports', compact('items'));
    }
    public function storePort(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required','string','max:120'],
            'code'    => ['required','string','max:16','unique:ports,code'],
            'country' => ['nullable','string','max:64'],
            'region'  => ['nullable','string','max:64'],
        ]);
        $data['is_active'] = $request->boolean('is_active', true);
        Port::create($data);
        return back()->with('flash','Port added.');
    }
    public function deletePort(Request $request, Port $port) { $port->delete(); return back()->with('flash','Port removed.'); }

    /* ---------------- Broadcast ---------------- */
    public function broadcast(Request $request)
    {
        $items = Broadcast::with('creator:id,name')->latest()->paginate(25);
        return view('admin.broadcast', compact('items'));
    }
    public function storeBroadcast(Request $request)
    {
        $data = $request->validate([
            'title'    => ['required','string','max:191'],
            'body'     => ['required','string'],
            'audience' => ['required', Rule::in(['all','buyers','vendors','admins'])],
        ]);
        $data['created_by'] = $request->user()->id;
        $data['status'] = 'draft';
        Broadcast::create($data);
        return back()->with('flash','Broadcast drafted.');
    }
    public function sendBroadcast(Request $request, Broadcast $broadcast)
    {
        app(\App\Http\Controllers\Api\Admin\BroadcastController::class)->send($broadcast);
        return back()->with('flash','Broadcast sent.');
    }

    /* ---------------- Audit ---------------- */
    public function audit(Request $request)
    {
        $items = AuditLog::with('user:id,name')->latest()->paginate(50);
        return view('admin.audit', compact('items'));
    }

    /* ---------------- Analytics ---------------- */
    public function analytics(Request $request)
    {
        $api = app(\App\Http\Controllers\Api\Admin\AnalyticsController::class);
        $stats = $api->summary($request)->getData(true)['data'] ?? [];
        return view('admin.analytics', compact('stats'));
    }
}
