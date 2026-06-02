<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\DashboardController as ApiDashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function buyer(Request $request, ApiDashboard $api)
    {
        $stats = $api->summary($request)->getData(true)['data'] ?? [];
        return view('buyer_app.dashboard', compact('stats'));
    }

    public function vendor(Request $request, ApiDashboard $api)
    {
        $stats = $api->summary($request)->getData(true)['data'] ?? [];
        return view('vendor_app.dashboard', compact('stats'));
    }

    public function admin(Request $request, ApiDashboard $api)
    {
        $stats = $api->summary($request)->getData(true)['data'] ?? [];
        return view('admin.dashboard', compact('stats'));
    }
}
