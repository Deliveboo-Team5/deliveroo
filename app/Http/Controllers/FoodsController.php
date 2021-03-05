<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Food;
use App\Category;
use App\Order;
use App\Http\Controllers\Auth;

class FoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $foods = Food::where('restaurant_id', '34')->get();
      return view('dashboard.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashboard.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Food $food)
    {
      $newFood = Food::firstOrCreate([
        'name_food' => $request['name_food'],
        'price' => $request['price'],
        'ingredients' => $request['ingredients'],
        'is_visible' => $request['is_visible'],
        'restaurant_id' => 34
      ]);
      return redirect(route('foods.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, Food $food)
    {
        $data = [
          'name_food' => $request['name_food'],
          'price' => $request['price'],
          'ingredients' => $request['ingredients'],
          'is_visible' => $request['is_visible']
        ];
        $food->update($data);
        return redirect(route('foods.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
      $food->delete();
      return redirec(route('foods.index'));
    }


    public function ajaxcall(Request $request){

      $foods = Food::all();

      return response()->json([
          'data' => [
            'food' => $foods
          ]
      ]);
    }
}



