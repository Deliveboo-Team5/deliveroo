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


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
      
       
        return view( 'restaurant.index');

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
    if($request->img){
      $image =  $validated['img'] ;
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
        $restaurant = Restaurant::find($id);
        return view('restaurant.show',compact('restaurant'));
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

        $restaurants = Restaurant::all();
        $categories = Category::all();

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
