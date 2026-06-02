<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    protected $fillable = [
        'name','slug','audience','price_monthly','price_yearly','currency',
        'features','lead_credits','is_active',
    ];
    protected $casts = [
        'price_monthly' => 'decimal:2',
        'price_yearly' => 'decimal:2',
        'features' => 'array',
        'is_active' => 'bool',
    ];

    public function subscriptions(): HasMany { return $this->hasMany(Subscription::class); }
}
