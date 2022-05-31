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
        Schema::create('order_summeries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cupon_name')->nullable();
            $table->integer('cart_total');
            $table->integer('discount')->default(0);
            $table->integer('sub_total');
            $table->integer('grand_total');
            $table->integer('shiping');
            $table->integer('payment_status')->default(0);
            $table->integer('payment_option');

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
        Schema::dropIfExists('order_summeries');
    }
};
