<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;

class MyRestaurantController extends Controller
{
    public function index()
    {
      $restaurantId = Auth::User()->getRestaurant->id;
      $restaurant = Restaurant::find($restaurantId);


      return view('dashboard.my_restaurant.index', compact('restaurant'));
    }
}
