<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class VendorProfile extends Model
{
    protected $fillable = [
        'user_id','company_name','bio','gst_number','pan_number',
        'city','state','country','rating','rating_count','jobs_completed',
        'verification_status','is_premium','bank_account',
    ];
    protected $casts = [
        'rating' => 'decimal:2',
        'is_premium' => 'bool',
        'bank_account' => 'array',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function categories(): BelongsToMany { return $this->belongsToMany(Category::class, 'vendor_categories'); }
    public function subcategories(): BelongsToMany { return $this->belongsToMany(Subcategory::class, 'vendor_categories'); }
    public function ports(): BelongsToMany { return $this->belongsToMany(Port::class, 'vendor_ports'); }
}
