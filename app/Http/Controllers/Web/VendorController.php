<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payout;
use App\Models\Port;
use App\Models\Quotation;
use App\Models\Review;
use App\Models\ServiceRequest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    public function inbox(Request $request)
    {
        $user = $request->user();
        $vp   = $user->vendorProfile;
        $catIds  = $vp ? $vp->categories->pluck('id')->all() : [];
        $portIds = $vp ? $vp->ports->pluck('id')->all() : [];

        $q = ServiceRequest::whereIn('status',['open','quoted'])
            ->when($catIds,  fn($x) => $x->whereIn('category_id', $catIds))
            ->when($portIds, fn($x) => $x->whereIn('port_id', $portIds))
            ->whereDoesntHave('quotations', fn($x) => $x->where('vendor_id', $user->id))
            ->with(['port:id,name,code','category:id,name','buyer:id,name'])
            ->withCount('quotations')
            ->latest();

        if ($request->filled('q')) $q->where('title','like','%'.$request->q.'%');
        $items = $q->paginate(20)->withQueryString();
        return view('vendor_app.inbox', compact('items'));
    }

    public function quoteForm(Request $request, ServiceRequest $serviceRequest)
    {
        return view('vendor_app.inbox', [
            'items' => collect(),
            'quoteRequest' => $serviceRequest->load(['port','category','buyer']),
        ]);
    }

    public function submitQuote(Request $request)
    {
        $data = $request->validate([
            'service_request_id' => ['required','exists:service_requests,id'],
            'amount'             => ['required','numeric','min:0'],
            'notes'              => ['nullable','string'],
            'valid_until'        => ['nullable','date'],
        ]);
        $api = app(\App\Http\Controllers\Api\QuotationController::class);
        $req = Request::create('/api/quotations', 'POST', $data);
        $req->setUserResolver(fn() => $request->user());
        $api->store($req);
        return redirect('/vendor/quotations')->with('flash','Quotation submitted.');
    }

    public function quotations(Request $request)
    {
        $items = Quotation::where('vendor_id', $request->user()->id)
            ->with(['serviceRequest:id,reference,title,vessel_name,buyer_id','serviceRequest.buyer:id,name'])
            ->latest()
            ->paginate(20);
        return view('vendor_app.quotations', compact('items'));
    }

    public function orders(Request $request)
    {
        $uid = $request->user()->id;
        $q = Order::where('vendor_id', $uid)
            ->with(['buyer:id,name','serviceRequest:id,reference,title,vessel_name,port_id','serviceRequest.port:id,name,code'])
            ->latest();
        if ($request->filled('status')) $q->where('status', $request->status);
        $items = $q->paginate(20)->withQueryString();
        return view('vendor_app.orders', compact('items'));
    }

    public function payouts(Request $request)
    {
        $items = Payout::where('vendor_id', $request->user()->id)
            ->with(['order:id,reference'])
            ->latest()
            ->paginate(20);
        return view('vendor_app.payouts', compact('items'));
    }

    public function billing(Request $request)
    {
        $uid = $request->user()->id;
        $invoices = Invoice::where('vendor_id', $uid)->with('order:id,reference')->latest()->paginate(15);
        $subscription = Subscription::where('user_id',$uid)->where('status','active')->with('plan')->latest()->first();
        return view('vendor_app.billing', compact('invoices','subscription'));
    }

    public function reviews(Request $request)
    {
        $items = Review::where('vendor_id', $request->user()->id)
            ->with(['buyer:id,name,avatar','order:id,reference'])
            ->latest()
            ->paginate(20);
        return view('vendor_app.reviews', compact('items'));
    }

    public function notifications(Request $request)
    {
        $items = Notification::where('user_id',$request->user()->id)->latest()->paginate(30);
        return view('vendor_app.notifications', compact('items'));
    }

    public function chat(Request $request)
    {
        $uid = $request->user()->id;
        $rooms = \App\Models\ChatRoom::where(fn($q) => $q->where('buyer_id',$uid)->orWhere('vendor_id',$uid))
            ->with(['buyer:id,name,avatar','vendor:id,name,avatar','lastMessage','serviceRequest:id,reference,title'])
            ->orderByDesc('last_message_at')
            ->get();
        $activeRoom = null;
        if ($request->filled('room')) {
            $activeRoom = \App\Models\ChatRoom::with(['messages.sender:id,name','buyer:id,name','vendor:id,name'])
                ->where('id', $request->integer('room'))
                ->where(fn ($q) => $q->where('buyer_id', $uid)->orWhere('vendor_id', $uid))
                ->first();
        }
        return view('vendor_app.chat', compact('rooms','activeRoom'));
    }

    public function sendMessage(Request $request, \App\Models\ChatRoom $room)
    {
        app(\App\Http\Controllers\Api\ChatController::class)->sendMessage($request, $room);
        return back();
    }

    public function profile(Request $request)
    {
        $user = $request->user()->load(['vendorProfile.categories','vendorProfile.ports','vendorProfile.subcategories']);
        $ports = Port::where('is_active',true)->orderBy('name')->get();
        $categories = Category::where('is_active',true)->with('subcategories')->orderBy('display_order')->get();
        return view('vendor_app.profile', compact('user','ports','categories'));
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $userData = $request->validate([
            'name'  => ['required','string','max:120'],
            'email' => ['sometimes','email', \Illuminate\Validation\Rule::unique('users','email')->ignore($user->id)],
            'phone' => ['nullable','string','max:20', \Illuminate\Validation\Rule::unique('users','phone')->ignore($user->id)],
        ]);
        if (array_key_exists('email', $userData) && $userData['email'] !== $user->email) {
            $userData['email_verified_at'] = null;
        }
        if (array_key_exists('phone', $userData) && $userData['phone'] !== $user->phone) {
            $userData['phone_verified_at'] = null;
        }
        $user->fill($userData)->save();
        $profileData = $request->validate([
            'company_name' => ['required','string','max:191'],
            'bio'          => ['nullable','string'],
            'gst_number'   => ['nullable','string','max:32'],
            'pan_number'   => ['nullable','string','max:16'],
            'city'         => ['nullable','string','max:64'],
            'state'        => ['nullable','string','max:64'],
            'country'      => ['nullable','string','max:64'],
        ]);
        $user->vendorProfile()->updateOrCreate(['user_id'=>$user->id], $profileData);
        if ($request->filled('port_ids')) {
            $user->vendorProfile->ports()->sync($request->input('port_ids', []));
        }
        return back()->with('flash','Profile saved.');
    }

    public function startOrder(Request $request, Order $order)
    {
        app(\App\Http\Controllers\Api\OrderController::class)->start($request, $order);
        return back()->with('flash','Order started.');
    }

    public function completeOrder(Request $request, Order $order)
    {
        app(\App\Http\Controllers\Api\OrderController::class)->complete($request, $order);
        return back()->with('flash','Order completed.');
    }

    public function kyc(Request $request)
    {
        $items = \App\Models\KycDocument::where('user_id', $request->user()->id)->latest()->get();
        return view('shared.kyc', compact('items'));
    }

    public function storeKyc(Request $request)
    {
        app(\App\Http\Controllers\Api\KycController::class)->store($request);
        return back()->with('flash','Document uploaded — pending review.');
    }

    public function destroyKyc(Request $request, \App\Models\KycDocument $kyc)
    {
        app(\App\Http\Controllers\Api\KycController::class)->destroy($request, $kyc);
        return back()->with('flash','Document removed.');
    }
}
