<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
    protected $fillable = ['category_id','name','slug','description','display_order','is_active'];
    protected $casts = ['is_active' => 'bool', 'display_order' => 'int'];

    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
}
