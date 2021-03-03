<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;


class OrdersController extends Controller
{
  public function index()
  {
      $orders = Order::orderBy('created_at', 'desc')->paginate();
      return view('dashboard.my_orders', compact('orders'));
  }
}
