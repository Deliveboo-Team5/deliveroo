<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name_food' => $faker->word(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 4, $max = 40),
        'ingredients' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'restaurant_id' => $faker->numberBetween($min = 1, $max = 50),
        'is_visible' => $faker->boolean($chanceOfGettingTrue = 100)

    ];
});
