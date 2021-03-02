<?php

use Illuminate\Database\Seeder;
use App\Food;

class foodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Food::class, 50)->create();
    }
}
