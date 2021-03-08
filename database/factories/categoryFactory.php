<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name_category' => $faker->word(),
        'img' => 'https://www.sushi-sushi.it/pub/media/magefan_blog/71306801_2447430058627610_6104279736102420480_n.jpg',

    ];
});
