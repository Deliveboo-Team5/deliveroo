<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\Order;
use App\Food;


class orderFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $orders = Order::all();

        foreach ($orders as $order){
        
            for($i = 1; $i <= 10; $i++){
                
                DB::table("order_food")->insert([
                    "food_id" => $faker->numberBetween(1,50),
                    "order_id" => $order->id, 
                    "quantity" =>  $faker->numberBetween(1,10)
                ]);
            }
        }
    }
}
