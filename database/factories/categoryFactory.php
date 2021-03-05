<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_category' => $faker->word(),
        'img' => 'https://www.novarellovillaggioazzurro.com/wp-content/uploads/2018/05/ristorante-servizio-1140x665.jpg',

    ];
});
