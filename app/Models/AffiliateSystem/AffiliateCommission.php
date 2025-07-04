<?php

namespace App\Models\AffiliateSystem;

use App\Models\RoomManagement\RoomBooking;
use App\Models\PackageManagement\PackageBooking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'referral_id',
        'booking_id',
        'booking_type',
        'guest_name',
        'booking_value',
        'commission_rate',
        'commission_amount',
        'status',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'booking_value' => 'decimal:2',
        'commission_rate' => 'decimal:2',
        'commission_amount' => 'decimal:2',
    ];

    /**
     * Get the affiliate that earned the commission.
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    /**
     * Get the referral that generated this commission.
     */
    public function referral()
    {
        return $this->belongsTo(AffiliateReferral::class, 'referral_id');
    }

    /**
     * Get the booking associated with the commission.
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
}
