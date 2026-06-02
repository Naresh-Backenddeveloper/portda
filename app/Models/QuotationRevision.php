<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationRevision extends Model
{
    protected $fillable = ['quotation_id','proposed_by','amount','notes','status'];
    protected $casts = ['amount' => 'decimal:2'];

    public function quotation(): BelongsTo { return $this->belongsTo(Quotation::class); }
    public function proposer(): BelongsTo { return $this->belongsTo(User::class, 'proposed_by'); }
}
