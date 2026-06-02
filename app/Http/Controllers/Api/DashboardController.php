<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dispute;
use App\Models\KycDocument;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Quotation;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function summary(Request $request)
    {
        $u = $request->user();
        return match (true) {
            $u->isBuyer()  => ApiResponse::ok($this->buyer($u)),
            $u->isVendor() => ApiResponse::ok($this->vendor($u)),
            $u->isAdmin()  => ApiResponse::ok($this->admin()),
            default        => ApiResponse::error('Unknown role.', 422),
        };
    }

    protected function buyer(User $u): array
    {
        return [
            'open_requests'        => ServiceRequest::where('buyer_id', $u->id)->where('status','open')->count(),
            'awaiting_quotes'      => ServiceRequest::where('buyer_id', $u->id)->where('status','open')->doesntHave('quotations')->count(),
            'pending_orders'       => Order::where('buyer_id', $u->id)->whereIn('status',['placed','confirmed','in_progress'])->count(),
            'completed_orders'     => Order::where('buyer_id', $u->id)->where('status','completed')->count(),
            'total_spent'          => (float) Payment::whereHas('order', fn ($q) => $q->where('buyer_id', $u->id))->where('status','success')->sum('amount'),
            'recent_requests'      => ServiceRequest::where('buyer_id', $u->id)->with(['port:id,name,code','category:id,name'])->withCount('quotations')->latest()->limit(5)->get(),
            'recent_orders'        => Order::where('buyer_id', $u->id)->with(['vendor:id,name','serviceRequest:id,reference,title'])->latest()->limit(5)->get(),
            'unread_notifications' => Notification::where('user_id', $u->id)->whereNull('read_at')->count(),
        ];
    }

    protected function vendor(User $u): array
    {
        $vp      = $u->vendorProfile;
        $catIds  = $vp ? $vp->categories->pluck('id')->all() : [];
        $portIds = $vp ? $vp->ports->pluck('id')->all() : [];

        $availableLeadsQ = ServiceRequest::whereIn('status', ['open','quoted'])
            ->whereIn('category_id', $catIds ?: [0])
            ->whereIn('port_id', $portIds ?: [0])
            ->whereDoesntHave('quotations', fn ($q) => $q->where('vendor_id', $u->id));

        return [
            'available_leads'      => (clone $availableLeadsQ)->count(),
            'active_quotes'        => Quotation::where('vendor_id', $u->id)->where('status','submitted')->count(),
            'won_orders'           => Order::where('vendor_id', $u->id)->whereIn('status',['placed','confirmed','in_progress'])->count(),
            'completed_orders'     => Order::where('vendor_id', $u->id)->where('status','completed')->count(),
            'total_earned'         => (float) Payment::whereHas('order', fn ($q) => $q->where('vendor_id', $u->id))->where('status','success')->sum('amount'),
            'rating'               => (float) (optional($vp)->rating ?? 0),
            'recent_leads'         => (clone $availableLeadsQ)->with(['port:id,name,code','category:id,name','buyer:id,name'])->latest()->limit(5)->get(),
            'recent_orders'        => Order::where('vendor_id', $u->id)->with(['buyer:id,name','serviceRequest:id,reference,title'])->latest()->limit(5)->get(),
            'unread_notifications' => Notification::where('user_id', $u->id)->whereNull('read_at')->count(),
        ];
    }

    protected function admin(): array
    {
        return [
            'users_by_role'        => User::selectRaw('role, COUNT(*) as c')->groupBy('role')->pluck('c','role'),
            'total_requests'       => ServiceRequest::count(),
            'total_orders'         => Order::count(),
            'total_revenue'        => (float) Payment::where('status','success')->sum('amount'),
            'pending_kyc'          => KycDocument::where('status','pending')->count(),
            'pending_disputes'     => Dispute::where('status','open')->count(),
            'recent_orders'        => Order::with(['buyer:id,name','vendor:id,name'])->latest()->limit(10)->get(),
            'recent_signups'       => User::latest()->limit(10)->get(['id','name','email','role','created_at']),
            'orders_by_status'     => Order::selectRaw('status, COUNT(*) as c')->groupBy('status')->pluck('c','status'),
            'unread_notifications' => Notification::where('user_id', auth()->id())->whereNull('read_at')->count(),
        ];
    }
}
