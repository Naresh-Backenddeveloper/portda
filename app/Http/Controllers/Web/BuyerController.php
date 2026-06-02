<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Port;
use App\Models\Quotation;
use App\Models\ServiceRequest;
use App\Models\VendorProfile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BuyerController extends Controller
{
    public function requests(Request $request)
    {
        $uid = $request->user()->id;
        $q = ServiceRequest::where('buyer_id', $uid)
            ->with(['port:id,name,code','category:id,name'])
            ->withCount('quotations')
            ->latest();
        if ($request->filled('status')) $q->where('status', $request->status);
        if ($request->filled('q')) {
            $s = '%'.$request->q.'%';
            $q->where(fn($w) => $w->where('title','like',$s)->orWhere('vessel_name','like',$s));
        }
        $items = $q->paginate(20)->withQueryString();
        return view('buyer_app.requests', compact('items'));
    }

    public function newRequest(Request $request)
    {
        $ports = Port::where('is_active', true)->orderBy('name')->get();
        $categories = Category::where('is_active', true)->with('subcategories')->orderBy('display_order')->get();
        return view('buyer_app.new-request', compact('ports','categories'));
    }

    public function storeRequest(Request $request)
    {
        $data = $request->validate([
            'port_id'        => ['required','exists:ports,id'],
            'category_id'    => ['required','exists:categories,id'],
            'subcategory_id' => ['nullable','exists:subcategories,id'],
            'vessel_name'    => ['required','string','max:191'],
            'imo_number'     => ['nullable','string','max:32'],
            'title'          => ['required','string','max:191'],
            'description'    => ['nullable','string'],
            'service_date'   => ['nullable','date'],
            'service_time'   => ['nullable','string','max:16'],
            'budget_min'     => ['nullable','numeric','min:0'],
            'budget_max'     => ['nullable','numeric'],
            'urgency'        => ['required', Rule::in(['standard','urgent','critical'])],
        ]);
        $data['buyer_id'] = $request->user()->id;
        $data['status']   = 'open';
        ServiceRequest::create($data);
        return redirect('/buyer/requests')->with('flash','Service request posted.');
    }

    public function quotations(Request $request)
    {
        $uid = $request->user()->id;
        $items = Quotation::whereHas('serviceRequest', fn($q) => $q->where('buyer_id', $uid))
            ->with(['serviceRequest:id,reference,title,vessel_name','vendor.vendorProfile'])
            ->latest()
            ->paginate(20);
        return view('buyer_app.quotations', compact('items'));
    }

    public function vendors(Request $request)
    {
        $q = VendorProfile::where('verification_status','verified')
            ->with(['user:id,name,avatar','categories:id,name','ports:id,name,code'])
            ->orderByDesc('is_premium')
            ->orderByDesc('rating');
        if ($request->filled('q')) $q->where('company_name','like','%'.$request->q.'%');
        $items = $q->paginate(20)->withQueryString();
        $ports = Port::where('is_active',true)->orderBy('name')->get();
        $categories = Category::where('is_active',true)->orderBy('display_order')->get();
        return view('buyer_app.vendors', compact('items','ports','categories'));
    }

    public function orders(Request $request)
    {
        $uid = $request->user()->id;
        $q = Order::where('buyer_id', $uid)
            ->with(['vendor:id,name','serviceRequest:id,reference,title,vessel_name,port_id','serviceRequest.port:id,name,code'])
            ->latest();
        if ($request->filled('status')) $q->where('status', $request->status);
        $items = $q->paginate(20)->withQueryString();
        return view('buyer_app.orders', compact('items'));
    }

    public function payments(Request $request)
    {
        $uid = $request->user()->id;
        $items = Payment::where('payer_id', $uid)
            ->with(['order:id,reference'])
            ->latest()
            ->paginate(20);
        return view('buyer_app.payments', compact('items'));
    }

    public function invoices(Request $request)
    {
        $uid = $request->user()->id;
        $items = Invoice::where('buyer_id', $uid)
            ->with(['order:id,reference','vendor:id,name'])
            ->latest()
            ->paginate(20);
        return view('buyer_app.invoices', compact('items'));
    }

    public function notifications(Request $request)
    {
        $items = Notification::where('user_id', $request->user()->id)->latest()->paginate(30);
        return view('buyer_app.notifications', compact('items'));
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
        return view('buyer_app.chat', compact('rooms','activeRoom'));
    }

    public function sendMessage(Request $request, \App\Models\ChatRoom $room)
    {
        app(\App\Http\Controllers\Api\ChatController::class)->sendMessage($request, $room);
        return back();
    }

    public function profile(Request $request)
    {
        $user = $request->user()->load(['buyerProfile.defaultPort']);
        $ports = Port::where('is_active',true)->orderBy('name')->get();
        return view('buyer_app.profile', compact('user','ports'));
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
            'company_name'    => ['required','string','max:191'],
            'imo_number'      => ['nullable','string','max:32'],
            'gst_number'      => ['nullable','string','max:32'],
            'billing_address' => ['nullable','string'],
            'city'            => ['nullable','string','max:64'],
            'state'           => ['nullable','string','max:64'],
            'country'         => ['nullable','string','max:64'],
            'postal_code'     => ['nullable','string','max:16'],
            'default_port_id' => ['nullable','exists:ports,id'],
        ]);
        $user->buyerProfile()->updateOrCreate(['user_id' => $user->id], $profileData);
        return back()->with('flash','Profile updated.');
    }

    public function acceptQuotation(Request $request, Quotation $quotation)
    {
        $api = app(\App\Http\Controllers\Api\QuotationController::class);
        $api->accept($request, $quotation);
        return back()->with('flash','Quotation accepted — order created.');
    }

    public function rejectQuotation(Request $request, Quotation $quotation)
    {
        $api = app(\App\Http\Controllers\Api\QuotationController::class);
        $api->reject($request, $quotation);
        return back()->with('flash','Quotation rejected.');
    }

    public function cancelRequest(Request $request, ServiceRequest $serviceRequest)
    {
        $api = app(\App\Http\Controllers\Api\ServiceRequestController::class);
        $api->cancel($request, $serviceRequest);
        return back()->with('flash','Request cancelled.');
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
