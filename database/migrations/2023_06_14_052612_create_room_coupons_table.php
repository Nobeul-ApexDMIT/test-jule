<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCouponsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('room_coupons', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('code');
      $table->string('type');
      $table->unsignedDecimal('value', 8, 2);
      $table->date('start_date');
      $table->date('end_date');
      $table->unsignedInteger('serial_number');
      $table->text('rooms')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('room_coupons');
  }
}
