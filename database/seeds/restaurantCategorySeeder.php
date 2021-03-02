<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\Restaurant;
use App\Category;

class restaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $restaurants = Restaurant::all();
        $categories = Category::all();
        
        foreach ($restaurants as $restaurant){
            for($i = 1; $i <= $faker->numberBetween(1,$categories->count()); $i++){
                
                DB::table("restaurant_category")->insert([
                    "restaurant_id" => $restaurant->id,
                    "category_id" => $i
                ]);
            }
        }
        
    }
    
}
