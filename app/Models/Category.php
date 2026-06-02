<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name','slug','icon','description','display_order','is_active'];
    protected $casts = ['is_active' => 'bool', 'display_order' => 'int'];

    public function subcategories(): HasMany { return $this->hasMany(Subcategory::class)->orderBy('display_order'); }
    public function serviceRequests(): HasMany { return $this->hasMany(ServiceRequest::class); }
}
