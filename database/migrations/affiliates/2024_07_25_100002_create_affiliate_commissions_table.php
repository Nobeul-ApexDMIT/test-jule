<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_id')->constrained('affiliates')->onDelete('cascade');
            $table->foreignId('referral_id')->constrained('affiliate_referrals')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id'); // To store ID from either room_bookings or package_bookings
            $table->string('booking_type'); // 'room' or 'package'
            $table->string('guest_name')->nullable();
            $table->decimal('booking_value', 10, 2);
            $table->decimal('commission_rate', 5, 2)->comment('Percentage, e.g., 10.00 for 10%');
            $table->decimal('commission_amount', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index(['booking_id', 'booking_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliate_commissions');
    }
};
