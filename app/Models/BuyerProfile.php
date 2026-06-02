<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BuyerProfile extends Model
{
    protected $fillable = [
        'user_id','company_name','imo_number','gst_number',
        'billing_address','city','state','country','postal_code','default_port_id',
    ];

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function defaultPort(): BelongsTo { return $this->belongsTo(Port::class, 'default_port_id'); }
}
