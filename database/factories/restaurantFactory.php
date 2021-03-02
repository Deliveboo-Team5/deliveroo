<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name_restaurant' => $faker->company(),
        'img' => $faker->url('https://www.novarellovillaggioazzurro.com/wp-content/uploads/2018/05/ristorante-servizio-1140x665.jpg'),
        'phone' => $faker->phoneNumber(),
        'address' => $faker->streetAddress(),
        'VAT' => $faker->swiftBicNumber(),
        'user_id' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
