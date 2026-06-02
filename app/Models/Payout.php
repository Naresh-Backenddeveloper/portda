<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payout extends Model
{
    protected $fillable = [
        'reference','vendor_id','order_id','amount','commission','net_amount',
        'currency','status','utr_number','bank_account','paid_at',
    ];
    protected $casts = [
        'amount' => 'decimal:2',
        'commission' => 'decimal:2',
        'net_amount' => 'decimal:2',
        'bank_account' => 'array',
        'paid_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $p) {
            $p->reference ??= 'PYT-' . strtoupper(bin2hex(random_bytes(4)));
        });
    }

    public function vendor(): BelongsTo { return $this->belongsTo(User::class, 'vendor_id'); }
    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
}
