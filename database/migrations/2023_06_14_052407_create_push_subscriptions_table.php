<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushSubscriptionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('push_subscriptions', function (Blueprint $table) {
      $table->id();
      $table->string('subscribable_type');
      $table->unsignedBigInteger('subscribable_id');
      $table->string('endpoint', 500)->unique();
      $table->string('public_key')->nullable();
      $table->string('auth_token')->nullable();
      $table->string('content_encoding')->nullable();
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
    Schema::dropIfExists('push_subscriptions');
  }
}
