<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            userSeeder::class,
            categorySeeder::class,
            restaurantSeeder::class,
            foodSeeder::class,
            orderSeeder::class,
            orderFoodSeeder::class,
            restaurantCategorySeeder::class
        ]);
    }
}
