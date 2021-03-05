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

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurants = Restaurant::paginate(30);
        $categories = Category::all();
       
        return view( 'restaurant.index', compact('restaurants' , 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('restaurant.create');
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
    
        
        Restaurant::firstOrCreate([
            'name_restaurant' => $validated['name_restaurant'],
            'img' => $validated['img'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'VAT' => $validated['VAT'],
            'user_id' => Auth::user()->id
        ]);
       
        
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
    public function update(Request $request, $id)
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
        

        foreach($restaurants as $restaurant){
            $restaurant->getCategory;
        }

        return response()->json([
            'data' => $restaurants,
        ]);
    }
}
