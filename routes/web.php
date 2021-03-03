<?php

use Illuminate\Support\Facades\Route;

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

Route::get('overview', 'OverviewController@index');

Route::get('my_orders', 'OrdersController@index');

Route::get('statistics', function () {
    return view('dashboard.statistics');
});

Route::resource('foods', 'FoodsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('restaurant', 'RestaurantController');
