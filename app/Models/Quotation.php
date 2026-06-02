<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quotation extends Model
{
    protected $fillable = [
        'reference','service_request_id','vendor_id','amount','currency',
        'notes','line_items','valid_until','status','terms','is_negotiable','accepted_at',
    ];
    protected $casts = [
        'amount' => 'decimal:2',
        'line_items' => 'array',
        'terms' => 'array',
        'valid_until' => 'date',
        'is_negotiable' => 'bool',
        'accepted_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $q) {
            $q->reference ??= 'QTN-' . strtoupper(bin2hex(random_bytes(3)));
        });
    }

    public function serviceRequest(): BelongsTo { return $this->belongsTo(ServiceRequest::class); }
    public function vendor(): BelongsTo { return $this->belongsTo(User::class, 'vendor_id'); }
    public function revisions(): HasMany { return $this->hasMany(QuotationRevision::class); }
}
