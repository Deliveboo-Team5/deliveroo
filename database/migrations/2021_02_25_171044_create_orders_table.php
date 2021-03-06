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
            $table->string('email', 50);
            $table->string('phone');
            $table->datetime('delivery_time');
            $table->double('total_price', 10, 2);
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
