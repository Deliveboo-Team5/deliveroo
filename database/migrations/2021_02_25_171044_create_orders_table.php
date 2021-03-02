<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_address');
            $table->string('name_customer', 50);
            $table->string('phone');
            $table->double('total_price', 10, 2);
            $table->dateTime('delivery_time');
            $table->timestamps();
        });
        Schema::create('order_food', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('quantity');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('food_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('food_id')->references('id')->on('foods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
