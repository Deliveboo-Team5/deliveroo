<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Restaurant;
use App\Food;
use App\Category;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class OverviewController extends Controller
{
    public function index()
    {
        $restaurant = Auth::User()->getRestaurant->id;

        $today = substr(Carbon::today(), 0, 10);
        $data = [
            'day_order' => Order::where('restaurant_id', $restaurant)->where('delivery_time', 'like', $today.'%')->count(),
            'total_order' => Order::where('restaurant_id', $restaurant)->count(),
            'total_customer' => Order::where('restaurant_id', $restaurant)->distinct('name_customer')->count(),
            'total_earnings' => DB::table('orders')->where('restaurant_id', $restaurant)->sum('total_price'),
            'daily_earnings' => Order::where('restaurant_id', $restaurant)->where('delivery_time', 'like', $today.'%')->sum('total_price')
            ];
        return view('dashboard.overview', compact('data'));
    }
}
