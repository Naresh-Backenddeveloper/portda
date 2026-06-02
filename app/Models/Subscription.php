<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    protected $fillable = [
        'user_id','plan_id','billing_cycle','amount','currency','status',
        'started_at','current_period_end','cancelled_at','credits_remaining',
    ];
    protected $casts = [
        'amount' => 'decimal:2',
        'started_at' => 'datetime',
        'current_period_end' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function plan(): BelongsTo { return $this->belongsTo(Plan::class); }
}
