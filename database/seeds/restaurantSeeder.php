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
        // factory(App\Restaurant::class, 50)->create();
        $restaurants = [
          [
            'name_restaurant' => 'Pizzeria Caprera',
            'img' => 'https://image.freepik.com/free-photo/restaurant-interior_1127-3394.jpg',
            'phone' => '391 451 3644',
            'address' => 'Via Enrico Toti, 2, 20081, Roma',
            'VAT' => '39145136449',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Ristorante Il Mare Caldo',
            'img' => 'https://image.freepik.com/free-photo/restaurant-hall-with-red-brick-walls-wooden-tables-pipes-ceiling_140725-8504.jpg',
            'phone' => '02 946 2842',
            'address' => 'Via Costantino Cantù, 27, Roma',
            'VAT' => '00294628422',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Ristorante Amicizia',
            'img' => 'https://image.freepik.com/free-photo/stir-fried-pork-with-korean-sauce-dark-background_1150-37952.jpg',
            'phone' => '320 714 5322',
            'address' => 'Via Legnano, 16, Roma',
            'VAT' => '32071453222',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Ristorante Mamma Mia',
            'img' => 'https://image.freepik.com/free-photo/group-friends-eating-together_53876-9934.jpg',
            'phone' => '06 6641 2389',
            'address' => 'Piazza S. Giovanni Battista de La Salle, 9, Roma',
            'VAT' => '06664123899',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Ristorante Miss You',
            'img' => 'https://image.freepik.com/free-photo/chef-cooking-food-restaurant-kitchen_53876-67.jpg',
            'phone' => '02 9496 3471',
            'address' => 'Viale, Via Felice Cavallotti, 18/a,, Roma',
            'VAT' => '02949634711',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Restaurante Zotto',
            'img' => 'https://image.freepik.com/free-photo/restaurant-interior_1127-3392.jpg',
            'phone' => '02 4946 7765',
            'address' => 'Via Giacomo Watt, 5/b, Roma',
            'VAT' => '02494677655',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Mamajuana',
            'img' => 'https://image.freepik.com/free-photo/cozy-restaurant-with-people-waiter_175935-230.jpg',
            'phone' => '02 3296 0815',
            'address' => 'Via Giuseppe Ripamonti, 21, Roma',
            'VAT' => '02329608155',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Rossini Restaurant',
            'img' => 'https://image.freepik.com/free-photo/banquet-table-with-snacks_144627-18361.jpg',
            'phone' => '347 154 3027',
            'address' => 'Via dei Piatti, 4, Roma',
            'VAT' => '34715430277',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Sevilla Mia Restaurante',
            'img' => 'https://image.freepik.com/free-photo/chef-prepares-fresh-salmon-fish-smorgu-trout-sprinkling-salt-with-ingredients_96270-11.jpg',
            'phone' => '320753 065',
            'address' => 'Viale Coni Zugna, 50, Roma',
            'VAT' => '32075300655',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Ta Bueno Restaurante',
            'img' => 'https://www.freepik.com/free-photo/interior-shot-cafe-with-chairs-near-bar-with-wooden-tables_7810365.htm#page=1&query=restaurant&position=13',
            'phone' => '02 3656 1135',
            'address' => 'Via Nicola Antonio Porpora, 143, Roma',
            'VAT' => '02365611355',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Nabucco',
            'img' => 'https://image.freepik.com/free-photo/restaurant-hall-with-round-square-tables-some-chairs-plants_140725-8031.jpg',
            'phone' => '02 860663',
            'address' => 'Via Fiori Chiari, 10, Roma',
            'VAT' => '02860663155',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
          [
            'name_restaurant' => 'Bosco Verticale Restaurant',
            'img' => 'https://image.freepik.com/free-photo/front-view-breakfast-table-with-eggs-buns-cheese-fresh-juice-restaurant-during-daytime-food-meal-breakfast_140725-25904.jpg',
            'phone' => '02 688 0836',
            'address' => 'Via Federico Confalonieri, 15, Roma',
            'VAT' => '0268808366',
            // 'user_id' => $faker->unique()->numberBetween($min = 1, $max = 12)
          ],
        ];

        foreach($restaurants as $index => $r){
        $newRestaurant = new Restaurant();
        $newRestaurant->name_restaurant = $r['name_restaurant'];
        $newRestaurant->img = $r['img'];
        $newRestaurant->phone = $r['phone'];
        $newRestaurant->address = $r['address'];
        $newRestaurant->VAT = $r['VAT'];
        $newRestaurant->user_id = $index + 1;
        $newRestaurant->save();
        }
    }
}
