<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'reference','buyer_id','port_id','category_id','subcategory_id',
        'vessel_name','imo_number','title','description',
        'service_date','service_time','budget_min','budget_max','currency',
        'urgency','status','attachments','meta','expires_at',
    ];
    protected $casts = [
        'service_date' => 'date',
        'budget_min' => 'decimal:2',
        'budget_max' => 'decimal:2',
        'attachments' => 'array',
        'meta' => 'array',
        'expires_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $r) {
            $r->reference ??= 'PORT-' . strtoupper(bin2hex(random_bytes(3)));
        });
    }

    public function buyer(): BelongsTo { return $this->belongsTo(User::class, 'buyer_id'); }
    public function port(): BelongsTo { return $this->belongsTo(Port::class); }
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function subcategory(): BelongsTo { return $this->belongsTo(Subcategory::class); }
    public function quotations(): HasMany { return $this->hasMany(Quotation::class); }
    public function acceptedQuotation(): HasOne { return $this->hasOne(Quotation::class)->where('status', 'accepted'); }
    public function order(): HasOne { return $this->hasOne(Order::class); }
}
