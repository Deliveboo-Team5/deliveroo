<?php

use Illuminate\Database\Seeder;
use App\Food;
use App\Restaurant;
use Faker\Generator as Faker;

class foodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurant = Restaurant::all();
        $data = [
            [
                'name_food' => 'Pizza Margherita',
                'img' => 'https://lh3.googleusercontent.com/proxy/XoFPjqkaicmmbrg7LoDi-c68ZBO1mhayPWrVp_5sc9GXbkNLTHNXd8cMXv_eFR-UdAfmD1rcULZwAkn5Qhm_xUz7kWQ_ar_MjZLUSVqLUkpAeBgJX-9eIz25Y57sbUAEcTaJlekZ3gTH',
                'price' => 6,
                'ingredients' => 'Pomodoro, Mozzarella',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Pizza 4 Formaggi',
                'img' => 'https://blog.giallozafferano.it/ricettechepassione/wp-content/uploads/2020/05/pizza-napoletana-4-formaggi-bianca.jpg',
                'price' => 7.50,
                'ingredients' => 'Gorgonzola, Fontina, Parmigiano, Mozzarella',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Pizza prosciutto crudo',
                'img' => 'https://blog.giallozafferano.it/lericettedisimo/wp-content/uploads/2016/03/Pizza-con-prosciutto-crudo-e-mozzarella.jpg',
                'price' => 7,
                'ingredients' => 'Pomodoro, Mozzarella, Prosciutto crudo di San Daniele',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Hamburger Classico',
                'img' => 'https://i.ytimg.com/vi/muEfXH5qcm4/maxresdefault.jpg',
                'price' => 5,
                'ingredients' => 'Hamburger, Pomodoro, Insalata',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Cheeseburger',
                'img' => 'https://cdn.hswstatic.com/gif/cheeseburger-1.jpg',
                'price' => 5.50,
                'ingredients' => 'Hamburger, Formaggio fuso, salsa BBQ',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Tagliatelle al ragù',
                'img' => 'https://www.lospicchiodaglio.it/img/ricette/tagliatelleragu.jpg',
                'price' => 8.50,
                'ingredients' => 'Tagliatelle, Pomodoro, Carne tritata, Spezie',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Spaghetti allo scoglio',
                'img' => 'https://www.ricettealvolo.it/wp-content/uploads/2020/06/linguine-allo-scoglio.jpg',
                'price' => 12,
                'ingredients' => 'Linguine, Cozze, Vongole, Gamberetti, Pomodoro',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Trofie al pesto',
                'img' => 'https://img.comeunochef.com/2020-06/trofie-pesto-rucola-1.jpg',
                'price' => 6,
                'ingredients' => 'Trofie, Pesto alla Genovese',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Pizza fritta',
                'img' => 'https://amalfinotizie.it/wp-content/uploads/2018/11/Pizza-Fritta-Cicoli-e-Ricotta-Ricetta.jpg',
                'price' => 4.50,
                'ingredients' => 'Pasta di pizza, cicoli, ricotta, pepe',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Calzone Salsiccia e Peperoni',
                'img' => 'https://www.ricettasprint.it/wp-content/uploads/2018/06/calzoni-fritti-ripieni-di-salsiccia-e-peperoni.jpg',
                'price' => 7,
                'ingredients' => 'Pasta di pizza, Salsiccia, Peperoni, Scamorza',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Pansoti al sugo di noci',
                'img' => 'https://i.pinimg.com/originals/45/88/ef/4588ef8e57fcc2a3633a33b2f4d88804.jpg',
                'price' => 6,
                'ingredients' => 'Pansoti ripieni di Bietole, Borragine, Spinaci, Quagliata, in sugo di Noci, Aglio, Parmigiano',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Trippe in umido',
                'img' => 'https://assets.tmecosys.com/image/upload/t_web767x639/img/recipe/vimdb/109412.jpg',
                'price' => 3.50,
                'ingredients' => 'Trippa, Salsa di Pomodoro, Cipolla, Alloro',
                'is_visible' => 1,
                
            ],
            [
                'name_food' => 'Ravioli del plin',
                'img' => 'https://www.giallozafferano.it/images/26-2655/Ravioli-del-plin_780x520_wm.jpg',
                'price' => 5,
                'ingredients' => 'Ravioli, Lonza di Maiale, Vitello, Carote, Sedano, Cipolla, Spinaci, Pepe',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Risotto alla milanese',
                'img' => 'https://www.zafferanoemiliano.com/wp-content/uploads/img_273167294321441.jpg',
                'price' => 8,
                'ingredients' => 'Riso, Zafferano, Grana Padano, Cipolla, Burro',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Panna Cotta lamponi',
                'img' => 'https://www.oetker.ch/Recipe/Recipes/oetker.ch/ch-it/dessert/image-thumb__14568__RecipeDetailsLightBox/panna-cotta-classica.jpg',
                'price' => 3.50,
                'ingredients' => 'Panna, Zucchero a velo, Gelatina, Aroma alla vaniglia, Lamponi, Succo di Limone',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Torta al cioccolato',
                'img' => 'https://www.cucchiaio.it/content/cucchiaio/it/ricette/2020/03/torta-al-cioccolato-senza-uova/jcr:content/header-par/image-single.img10.jpg/1584524834075.jpg',
                'price' => 3,
                'ingredients' => 'Cioccolato Fondente, Cacao amaro, Farina, Zucchero, Uova, Burro, Lievito per dolci',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Profiteroles al cioccolato',
                'img' => 'https://www.gnamgnam.it/wp-content/uploads/2012/11/4-profiteroles-1.jpg',
                'price' => 4.50,
                'ingredients' => 'Latte, Burro, Zucchero, Sale, Farina, Uova, Panna, Aroma alla Vaniglia, Cioccolato Fondente,',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Tartufo Bianco',
                'img' => 'https://www.bofrost.it/writable/products/images-v2/15074.jpg',
                'price' => 4,
                'ingredients' => 'Uova, Zucchero, Succo di Limone, Latte, Farina, Panna montata, Caffè, Vanillina',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Coca Cola',
                'img' => 'https://www.coca-cola.com/content/dam/brands/global/coca-cola/images/og-image-coca-cola-siente-el-sabor-amigos-1200x627.jpg',
                'price' => 2,
                'ingredients' => 'Lattina da 330ml',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Coca Cola Zero',
                'img' => 'https://ciboserio.s3.eu-central-1.amazonaws.com/uploads/2020/01/04214453/coca-2.jpg',
                'price' => 2,
                'ingredients' => 'Lattina da 330ml',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Fanta',
                'img' => 'https://ilsalvagente.it/wp-content/uploads/2019/07/fanta_ingredienti1-696x464.jpg',
                'price' => 2,
                'ingredients' => 'Lattina da 330ml',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Sprite',
                'img' => 'https://www.coca-colaitalia.it/content/dam/one/it/it/entrypoints/sprite/sprite-prodotti-1600x700.jpg',
                'price' => 2,
                'ingredients' => 'Lattina da 330ml',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Birra Moretti 33cl',
                'img' => 'https://dimarsas.it/wp-content/uploads/2017/02/moretti-cl33x24-600x600.jpg',
                'price' => 3,
                'ingredients' => 'Birra in vetro',
                'is_visible' => 1,
            ],
            [
                'name_food' => 'Birra Menabrea 66cl',
                'img' => 'https://i2.wp.com/www.macelleriasparacello.it/wp-content/uploads/2019/05/MG_3190.jpg?fit=1080%2C720&ssl=1',
                'price' => 4,
                'ingredients' => 'Birra in vetro',
                'is_visible' => 1,
            ],
        ];

        foreach($restaurant as $index => $rest){
            for($i = 1; $i < 5; $i++){
                $numBet = $faker->numberBetween($min = 0, $max = 23);
                $newFood = new Food();
                $newFood->name_food = $data[$numBet]['name_food'];
                $newFood->img = $data[$numBet]['img'];
                $newFood->price = $data[$numBet]['price'];
                $newFood->ingredients = $data[$numBet]['ingredients'];
                $newFood->is_visible = 1;
                $newFood->restaurant_id = $index + 1;
                $newFood->save();
            }
        }

        // foreach($data as $d){
        //     $newFood = new Food();
        //     $newFood->name_food = $d['name_food'];
        //     $newFood->img = $d['img'];
        //     $newFood->price = $d['price'];
        //     $newFood->ingredients = $d['ingredients'];
        //     $newFood->is_visible = $d['is_visible'];
        //     $newFood->restaurant_id = $d['restaurant_id'];
        //     $newFood->save();
        // }
    }
}
