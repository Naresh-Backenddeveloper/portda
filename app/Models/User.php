<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'password',
        'role', 'status', 'avatar', 'locale',
        'email_verified_at', 'phone_verified_at', 'last_login_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isVendor(): bool { return $this->role === 'vendor'; }
    public function isBuyer(): bool { return $this->role === 'buyer'; }

    public function buyerProfile(): HasOne { return $this->hasOne(BuyerProfile::class); }
    public function vendorProfile(): HasOne { return $this->hasOne(VendorProfile::class); }
    public function kycDocuments(): HasMany { return $this->hasMany(KycDocument::class); }
    public function notifications(): HasMany { return $this->hasMany(Notification::class); }
    public function serviceRequests(): HasMany { return $this->hasMany(ServiceRequest::class, 'buyer_id'); }
    public function quotations(): HasMany { return $this->hasMany(Quotation::class, 'vendor_id'); }
    public function buyerOrders(): HasMany { return $this->hasMany(Order::class, 'buyer_id'); }
    public function vendorOrders(): HasMany { return $this->hasMany(Order::class, 'vendor_id'); }
    public function subscriptions(): HasMany { return $this->hasMany(Subscription::class); }
    public function activeSubscription(): HasOne { return $this->hasOne(Subscription::class)->where('status', 'active')->latestOfMany(); }
}
