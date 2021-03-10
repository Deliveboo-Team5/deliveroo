<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'delivery_address' => $faker->streetAddress(),
        'name_customer' => $faker->name(),
        'email'=> $faker->email(),
        'phone' => $faker->phoneNumber(),
        'delivery_time' => $faker->dateTime(),
        'total_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 1000),
        'restaurant_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
