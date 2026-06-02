<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Dispute;
use App\Models\KycDocument;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function summary(Request $request)
    {
        return ApiResponse::ok([
            'gmv'               => (float) Payment::where('status','success')->sum('amount'),
            'revenue'           => (float) Order::sum('commission'),
            'users_by_role'     => User::selectRaw('role, COUNT(*) c')->groupBy('role')->pluck('c','role'),
            'orders_by_status'  => Order::selectRaw('status, COUNT(*) c')->groupBy('status')->pluck('c','status'),
            'payments_by_method'=> Payment::selectRaw('method, COUNT(*) c, SUM(amount) total')->groupBy('method')->get(),
            'monthly_gmv'       => Order::selectRaw("DATE_FORMAT(created_at,'%Y-%m') as month, SUM(total) as gmv")
                                       ->where('payment_status','paid')
                                       ->groupBy('month')
                                       ->orderBy('month')
                                       ->limit(12)
                                       ->get(),
            'pending_kyc'       => KycDocument::where('status','pending')->count(),
            'pending_disputes'  => Dispute::where('status','open')->count(),
        ]);
    }

    public function audit(Request $request)
    {
        $q = AuditLog::with('user:id,name')->latest();
        $q->when($request->filled('action'), fn ($x) => $x->where('action', $request->string('action')));
        return ApiResponse::paginated($q->paginate(50));
    }
}
