<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Restaurant as RestaurantResource;
use App\Restaurant;

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




Route::get('overview', 'OverviewController@index')->name('overview');

Route::get('my_orders', 'OrdersController@index');

Route::get('statistics', function () {
    return view('dashboard.statistics');
});

Route::resource('foods', 'FoodsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('restaurant', 'RestaurantController')->names([
  'index' => 'restaurant.index',
  'show' => 'restaurant.show'
]);
 

// Route::get('register', 'RegisterController@index')->name('register');
// Route::post('register', 'RegisterController@store');

// Route::get('login', 'LoginController@index')->name('login');
// Route::post('login', 'LoginController@store');


Route::get('/api/restaurant', 'RestaurantController@ajaxcall');
Route::get('/api/food', 'FoodsController@ajaxcall');