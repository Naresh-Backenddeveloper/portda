<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $q = Notification::where('user_id', $request->user()->id)->latest();
        if ($request->boolean('unread')) $q->whereNull('read_at');
        return ApiResponse::paginated($q->paginate(30));
    }

    public function unreadCount(Request $request)
    {
        return ApiResponse::ok([
            'count' => Notification::where('user_id', $request->user()->id)->whereNull('read_at')->count(),
        ]);
    }

    public function markRead(Request $request, Notification $notification)
    {
        if ($notification->user_id !== $request->user()->id) return ApiResponse::error('Forbidden.', 403);
        $notification->update(['read_at' => now()]);
        return ApiResponse::ok($notification);
    }

    public function markAllRead(Request $request)
    {
        $n = Notification::where('user_id', $request->user()->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
        return ApiResponse::ok(['updated' => $n]);
    }

    public function destroy(Request $request, Notification $notification)
    {
        if ($notification->user_id !== $request->user()->id) return ApiResponse::error('Forbidden.', 403);
        $notification->delete();
        return ApiResponse::ok(null, 'Deleted');
    }
}
