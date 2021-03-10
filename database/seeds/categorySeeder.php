<?php

use Illuminate\Database\Seeder;
use App\Category;
class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          [
            'name' => 'Pizza',
            'img' => 'https://img.freepik.com/free-photo/mixed-pizza-with-various-ingridients_140725-3790.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],
          [
            'name' => 'Sushi',
            'img' => 'https://img.freepik.com/free-photo/japanese-food-maki-nigiri-sushi-set-black-background-top-view-copy-space_123827-2338.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],
          [
            'name' => 'Dessert',
            'img' => 'https://img.freepik.com/free-photo/sweet-cupcake-with-cranberry-black_210435-9.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],
          [
            'name' => 'Healthy',
            'img' => 'https://www.freepik.com/search?dates=any&format=search&page=1&query=healthy%20food&sort=popular&type=photo',
          ],
          [
            'name' => 'Gelato',
            'img' => 'https://img.freepik.com/free-photo/ice-cream-scoops-bowl-mixed-ice-cream-ice-cream-cup-black-background_64762-40.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],
          [
            'name' => 'Hamburger',
            'img' => 'https://image.freepik.com/free-photo/hamburgers-with-beef-tomato-red-onion-lettuce_2829-10846.jpg',
          ],
          [
            'name' => 'Kebab',
            'img' => 'https://image.freepik.com/free-photo/turkish-arabic-traditional-ramadan-mix-kebab-plate-kebab-adana-chicken-lamb-beef-lavash-bread-with-sauce-top-view_2829-6169.jpg',
          ],
          [
            'name' => 'Sandwich',
            'img' => 'https://img.freepik.com/free-photo/chicken-avocado-sandwish-plate_1372-1214.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],
          [
            'name' => 'Americano',
            'img' => 'https://img.freepik.com/free-photo/baked-chicken-wings-asian-style_2829-10159.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],
          [
            'name' => 'Italiano',
            'img' => 'https://img.freepik.com/free-photo/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table_2829-19739.jpg?size=626&ext=jpg&uid=R533347&ga=GA1.2.1489747274.1570093904',
          ],

        ];

        foreach($data as $d){
        $newCategory = new Category();
        $newCategory->name = $d['name'];
        $newCategory->img = $d['img'];
        $newCategory->save();
        }
    }
}
