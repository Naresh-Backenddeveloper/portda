<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'number','order_id','buyer_id','vendor_id',
        'subtotal','tax','total','currency','status','issued_at','due_at','line_items','file_path',
    ];
    protected $casts = [
        'subtotal' => 'decimal:2',
        'tax' => 'decimal:2',
        'total' => 'decimal:2',
        'issued_at' => 'date',
        'due_at' => 'date',
        'line_items' => 'array',
    ];

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function buyer(): BelongsTo { return $this->belongsTo(User::class, 'buyer_id'); }
    public function vendor(): BelongsTo { return $this->belongsTo(User::class, 'vendor_id'); }
}
