<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'reference','order_id','payer_id','amount','currency','method','type',
        'status','gateway_txn_id','utr_number','proof_path','gateway_response',
        'verified_by','paid_at','verified_at',
    ];
    protected $casts = [
        'amount' => 'decimal:2',
        'gateway_response' => 'array',
        'paid_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $p) {
            $p->reference ??= 'PAY-' . strtoupper(bin2hex(random_bytes(4)));
        });
    }

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function payer(): BelongsTo { return $this->belongsTo(User::class, 'payer_id'); }
    public function verifier(): BelongsTo { return $this->belongsTo(User::class, 'verified_by'); }
}
