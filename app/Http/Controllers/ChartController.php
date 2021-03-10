<?php

namespace App\Http\Controllers;
use App\User;
use App\Restaurant;
use App\Food;
use App\Category;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FoodRequest;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
      $restaurant = Auth::User()->getRestaurant->id;
      // $restaurant = 2;
      $foods = Food::where('restaurant_id', $restaurant)->get();
      $orders = Order::where('restaurant_id', $restaurant)->get();


      return response()->json([
          'data' => [
            'food' => $foods,
            'order' => $orders
          ]
      ]);
    }
}
