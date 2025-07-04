<?php

namespace App\Models\AffiliateSystem;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'mobile',
        'email',
        'occupation',
        'about_me',
        'why_join',
        'affiliate_code',
        'status',
        'approved_at',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    /**
     * Get the user account associated with the affiliate.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the referrals for the affiliate.
     */
    public function referrals()
    {
        return $this->hasMany(AffiliateReferral::class);
    }

    /**
     * Get the commissions for the affiliate.
     */
    public function commissions()
    {
        return $this->hasMany(AffiliateCommission::class);
    }

    /**
     * Get the payments made to the affiliate.
     */
    public function payments()
    {
        return $this->hasMany(AffiliatePayment::class);
    }
}
