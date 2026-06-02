<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    protected $fillable = [
        'order_id','buyer_id','vendor_id','rating','title','body','tags',
        'status','vendor_reply','replied_at',
    ];
    protected $casts = [
        'tags' => 'array',
        'replied_at' => 'datetime',
    ];

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function buyer(): BelongsTo { return $this->belongsTo(User::class, 'buyer_id'); }
    public function vendor(): BelongsTo { return $this->belongsTo(User::class, 'vendor_id'); }
}
