<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    protected $fillable = [
        'chat_room_id','sender_id','type','body','attachment_path','meta','read_at',
    ];
    protected $casts = [
        'meta' => 'array',
        'read_at' => 'datetime',
    ];

    public function room(): BelongsTo { return $this->belongsTo(ChatRoom::class, 'chat_room_id'); }
    public function sender(): BelongsTo { return $this->belongsTo(User::class, 'sender_id'); }
}
