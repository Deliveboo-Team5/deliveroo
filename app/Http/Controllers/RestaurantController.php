<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Food;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RestaurantFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Braintree;
use Braintree\Gateway;
use Braintree\Transaction;



class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view( 'restaurant.index', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('restaurant.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantFormRequest $request)
    {

        $validated = $request->validated();
        $image ='';
            if($request['img'] !== null){
                $image = $validated['img']->storePublicly('images');
            }else{
            $image = 'https://www.novarellovillaggioazzurro.com/wp-content/uploads/2018/05/ristorante-servizio-1140x665.jpg';
        }

        $newRestaurant = Restaurant::firstOrCreate([
            'name_restaurant' => $validated['name_restaurant'],
            'img' => $image,
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'VAT' => $validated['VAT'],
            'user_id' => Auth::user()->id
        ]);


        $validatedCategory = $request->category;
        foreach($validatedCategory as $idCategory){
            DB::table("restaurant_category")->insert([
                "restaurant_id" => $newRestaurant->id,
                "category_id" => $idCategory
            ]);
        }

        return redirect(route('overview'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
    
        $token = $gateway->ClientToken()->generate();
    
        

        $restaurant = Restaurant::find($id);
        return view('restaurant.show', [
            'restaurant' => $restaurant,
            'token' => $token
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantFormRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxcall(Request $request){

        $restaurantsRaw = Restaurant::all();
        $categories = Category::all();

        function restaurantShuffle($array)
        {
            // Get array length
            $count = count($array);
            // Create a range of indicies
            $indi = range(0,$count-1);
            // Randomize indicies array
            shuffle($indi);
            // Initialize new array
            $newarray = array($count);
            // Holds current index
            $i = 0;
            // Shuffle multidimensional array
            foreach ($indi as $index)
            {
                $newarray[$i] = $array[$index];
                $i++;
            }
            return $newarray;
        }

        $restaurants = restaurantShuffle($restaurantsRaw);
        
        foreach($restaurants as $restaurant){
            $restaurant->category_id = [];
            $restaurant_categories = [];
            foreach($restaurant->getCategory as $category){
            array_push($restaurant_categories, $category->id);
            }
            $restaurant->category_id = $restaurant_categories;
        }

        return response()->json([
            'data' => [
                'restaurants' => $restaurants,
                'categories' => $categories,
            ],
        ]);
    }
}
