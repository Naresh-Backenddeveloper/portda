<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\Notification;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $u = $request->user();
        $q = ChatRoom::query()
            ->where(fn ($x) => $x->where('buyer_id', $u->id)->orWhere('vendor_id', $u->id))
            ->with([
                'buyer:id,name,avatar',
                'vendor:id,name,avatar',
                'serviceRequest:id,reference,title',
                'lastMessage',
            ])
            ->orderByDesc('last_message_at')
            ->orderByDesc('id');
        return ApiResponse::paginated($q->paginate(30));
    }

    public function show(Request $request, ChatRoom $room)
    {
        $u = $request->user();
        if ($u->id !== $room->buyer_id && $u->id !== $room->vendor_id && ! $u->isAdmin()) {
            return ApiResponse::error('Forbidden.', 403);
        }
        $room->load([
            'buyer:id,name,avatar',
            'vendor:id,name,avatar',
            'serviceRequest:id,reference,title',
            'messages' => fn ($q) => $q->latest()->limit(50),
        ]);
        $room->setRelation('messages', $room->messages->reverse()->values());
        return ApiResponse::ok($room);
    }

    public function openWith(Request $request)
    {
        $u = $request->user();
        $data = $request->validate([
            'counterparty_user_id' => ['required','exists:users,id','different:counterparty_user_id_self'],
            'service_request_id'   => ['nullable','exists:service_requests,id'],
            'order_id'             => ['nullable','exists:orders,id'],
        ]);

        $other = User::findOrFail($data['counterparty_user_id']);
        if ($u->id === $other->id) return ApiResponse::error('Cannot chat with yourself.', 422);

        // Determine buyer/vendor IDs based on roles
        if ($u->isBuyer() && $other->isVendor()) {
            [$buyerId, $vendorId] = [$u->id, $other->id];
        } elseif ($u->isVendor() && $other->isBuyer()) {
            [$buyerId, $vendorId] = [$other->id, $u->id];
        } else {
            return ApiResponse::error('Chat only between buyer and vendor.', 422);
        }

        $room = ChatRoom::firstOrCreate(
            [
                'buyer_id'           => $buyerId,
                'vendor_id'          => $vendorId,
                'service_request_id' => $data['service_request_id'] ?? null,
            ],
            [
                'order_id'        => $data['order_id'] ?? null,
                'last_message_at' => now(),
            ]
        );

        return ApiResponse::ok($room->load(['buyer:id,name,avatar','vendor:id,name,avatar']));
    }

    public function sendMessage(Request $request, ChatRoom $room)
    {
        $u = $request->user();
        if ($u->id !== $room->buyer_id && $u->id !== $room->vendor_id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        $data = $request->validate([
            'type'       => ['nullable', Rule::in(['text','image','file'])],
            'body'       => ['nullable','string'],
            'attachment' => ['nullable','file','max:10240'],
        ]);
        $type = $data['type'] ?? 'text';
        if ($type === 'text' && empty($data['body'])) {
            return ApiResponse::error('Text message body required.', 422);
        }
        $attachmentPath = null;
        if (in_array($type, ['image','file'], true) && $request->hasFile('attachment')) {
            $attachmentPath = Storage::disk('public')->putFile('chat', $request->file('attachment'));
        }

        $msg = ChatMessage::create([
            'chat_room_id'    => $room->id,
            'sender_id'       => $u->id,
            'type'            => $type,
            'body'            => $data['body'] ?? null,
            'attachment_path' => $attachmentPath,
        ]);
        $room->forceFill(['last_message_at' => now()])->save();

        $otherId = $u->id === $room->buyer_id ? $room->vendor_id : $room->buyer_id;
        Notification::create([
            'user_id'    => $otherId,
            'type'       => 'chat.message',
            'title'      => "New message from {$u->name}",
            'body'       => substr((string) ($msg->body ?? 'Attachment'), 0, 100),
            'action_url' => "/chat?room={$room->id}",
        ]);

        return ApiResponse::created($msg);
    }

    public function markRead(Request $request, ChatRoom $room)
    {
        $u = $request->user();
        if ($u->id !== $room->buyer_id && $u->id !== $room->vendor_id) {
            return ApiResponse::error('Forbidden.', 403);
        }
        ChatMessage::where('chat_room_id', $room->id)
            ->where('sender_id', '!=', $u->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
        return ApiResponse::ok(null, 'Marked read');
    }
}
