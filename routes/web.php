<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Restaurant as RestaurantResource;
use App\Restaurant;
use App\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('restaurant');
});




Route::get('overview', 'OverviewController@index')->name('overview')->middleware('auth');

Route::get('my_orders', 'OrdersController@index')->middleware('auth');

Route::get('statistics', function () {
    return view('dashboard.statistics');
})->middleware('auth');

Route::resource('foods', 'FoodsController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('restaurant', 'RestaurantController')->except('index','show')->middleware('auth');

Route::resource('restaurant', 'RestaurantController')->only('index','show');


Route::get('/api/restaurant', 'RestaurantController@ajaxcall');
Route::get('/api/food', 'FoodsController@ajaxcall');
Route::get('/api/statistics', 'ChartController@index');

Route::post('/checkout', 'PaymentsController@checkout');