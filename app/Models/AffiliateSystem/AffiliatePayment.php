<?php

namespace App\Models\AffiliateSystem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliatePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_id',
        'amount',
        'payment_date',
        'notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'amount' => 'decimal:2',
    ];

    /**
     * Get the affiliate to whom the payment was made.
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
