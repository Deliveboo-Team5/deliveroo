<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class restaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Restaurant::class, 50)->create();
    }
}
