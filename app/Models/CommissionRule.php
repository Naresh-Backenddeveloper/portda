<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommissionRule extends Model
{
    protected $fillable = ['category_id','port_id','type','value','is_active'];
    protected $casts = ['value' => 'decimal:4', 'is_active' => 'bool'];

    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function port(): BelongsTo { return $this->belongsTo(Port::class); }
}
