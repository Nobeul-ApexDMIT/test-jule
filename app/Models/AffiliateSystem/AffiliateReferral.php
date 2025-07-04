<?php

namespace App\Models\AffiliateSystem;

use App\Models\RoomManagement\RoomBooking;
use App\Models\PackageManagement\PackageBooking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateReferral extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'booking_id',
        'booking_type',
    ];

    /**
     * Get the affiliate that owns the referral.
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    /**
     * Get the booking associated with the referral.
     * This could be a RoomBooking or a PackageBooking.
     */
    public function booking()
    {
        if ($this->booking_type === 'room') {
            return $this->belongsTo(RoomBooking::class, 'booking_id');
        } elseif ($this->booking_type === 'package') {
            return $this->belongsTo(PackageBooking::class, 'booking_id');
        }
        return null; // Or throw an exception for unknown type
    }

    /**
     * Get the commission associated with this referral.
     */
    public function commission()
    {
        return $this->hasOne(AffiliateCommission::class, 'referral_id');
    }
}
