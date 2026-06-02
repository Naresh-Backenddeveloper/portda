<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatRoom extends Model
{
    protected $fillable = [
        'service_request_id','order_id','buyer_id','vendor_id','last_message_at',
    ];
    protected $casts = ['last_message_at' => 'datetime'];

    public function buyer(): BelongsTo { return $this->belongsTo(User::class, 'buyer_id'); }
    public function vendor(): BelongsTo { return $this->belongsTo(User::class, 'vendor_id'); }
    public function serviceRequest(): BelongsTo { return $this->belongsTo(ServiceRequest::class); }
    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function messages(): HasMany { return $this->hasMany(ChatMessage::class)->orderBy('created_at'); }
    public function lastMessage(): HasMany { return $this->hasMany(ChatMessage::class)->latest()->limit(1); }
}
