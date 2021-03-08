<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Food;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{
  public function index()
  {
    $restaurant = Auth::User()->getRestaurant->id;

    $data = [
      'orders' => Order::where('restaurant_id', $restaurant)->get(),
      'food' => Food::all()
    ];

    return view('dashboard.my_orders', compact('data'));
  }
}
