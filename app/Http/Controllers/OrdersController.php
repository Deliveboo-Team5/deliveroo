<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Food;


class OrdersController extends Controller
{
  public function index()
  {
      $data = [
        'orders' => Order::orderBy('created_at', 'desc')->paginate(),
        'food' => Food::all()
      ];
      return view('dashboard.my_orders', compact('data'));
  }
}
