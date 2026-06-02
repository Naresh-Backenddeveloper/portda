<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $fillable = [
        'reference','service_request_id','quotation_id','buyer_id','vendor_id',
        'subtotal','tax','commission','total','currency',
        'status','payment_status','scheduled_at','started_at','completed_at',
        'cancelled_at','cancel_reason','meta',
    ];
    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'commission' => 'decimal:2',
        'total' => 'decimal:2',
        'scheduled_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'meta' => 'array',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $o) {
            $o->reference ??= 'ORD-' . strtoupper(bin2hex(random_bytes(3)));
        });
    }

    public function serviceRequest(): BelongsTo { return $this->belongsTo(ServiceRequest::class); }
    public function quotation(): BelongsTo { return $this->belongsTo(Quotation::class); }
    public function buyer(): BelongsTo { return $this->belongsTo(User::class, 'buyer_id'); }
    public function vendor(): BelongsTo { return $this->belongsTo(User::class, 'vendor_id'); }
    public function events(): HasMany { return $this->hasMany(OrderEvent::class)->latest(); }
    public function payments(): HasMany { return $this->hasMany(Payment::class); }
    public function invoice(): HasOne { return $this->hasOne(Invoice::class); }
    public function review(): HasOne { return $this->hasOne(Review::class); }
}
