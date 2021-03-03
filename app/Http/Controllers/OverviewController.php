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

class OverviewController extends Controller
{
    public function index()
    {
        // $food = Food::where('restaurant_id', 34);
        // dd($food);
        // $filter_food = array_filter($food, function(){
        //     return $food->getOrder->created_at = Carbon::today();  
        // });
        $data = [
            'day_order' => Order::where('created_at', '=', Carbon::today())->count(),
            'total_order' => Order::all()->count(),
            'total_customer' => Order::all()->groupBy('name_customer')->count(),
            'total_earnings' => DB::table('orders')->sum('total_price'),
            'daily_earnings' => Order::where('created_at', '=', Carbon::today())->sum('total_price')
            ];
        // dd($data);
        return view('dashboard.overview', compact('data'));
    }
}
