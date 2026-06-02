<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Port extends Model
{
    protected $fillable = ['name','code','country','region','lat','lng','is_active'];
    protected $casts = ['is_active' => 'bool', 'lat' => 'decimal:6', 'lng' => 'decimal:6'];

    public function serviceRequests(): HasMany { return $this->hasMany(ServiceRequest::class); }
    public function vendors(): BelongsToMany { return $this->belongsToMany(VendorProfile::class, 'vendor_ports'); }
}
