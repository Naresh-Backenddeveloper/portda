<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dispute extends Model
{
    protected $fillable = [
        'reference','order_id','raised_by','against','subject','description',
        'status','resolution','resolved_by','resolved_at',
    ];
    protected $casts = ['resolved_at' => 'datetime'];

    protected static function booted(): void
    {
        static::creating(function (self $d) {
            $d->reference ??= 'DSP-' . strtoupper(bin2hex(random_bytes(3)));
        });
    }

    public function order(): BelongsTo { return $this->belongsTo(Order::class); }
    public function raiser(): BelongsTo { return $this->belongsTo(User::class, 'raised_by'); }
    public function resolver(): BelongsTo { return $this->belongsTo(User::class, 'resolved_by'); }
}
