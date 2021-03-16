<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Food;
use Faker\Generator as Faker;

$factory->define(Food::class, function (Faker $faker) {
    return [
        'name_food' => $faker->word(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 4, $max = 40),
        'ingredients' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'restaurant_id' => $faker->numberBetween($min = 1, $max = 12),
        'is_visible' => $faker->boolean($chanceOfGettingTrue = 100),
        'img' => "https://upload.wikimedia.org/wikipedia/commons/a/a3/Eq_it-na_pizza-margherita_sep2005_sml.jpg"
    ];
});
