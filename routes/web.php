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

Route::post('/checkout', function (Request $request) {

    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    

    if ($result->success) {
        $transaction = $result->transaction;
        $newOrder = new Order([
            'name_customer' => $request->name,
            'delivery_address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'delivery_time' => $request->delivery_time,
            'total_price' => $request->amount,
            'restaurant_id' => $request->restaurant,
        ]);
        $newOrder->save();

        for($i=0; $i < count($request->food); $i++){
            DB::table("order_food")->insert([
                "food_id" => $request->food[$i],
                "order_id" => $newOrder->id, 
                "quantity" =>  $request->quantity[$i],
            ]);
        };
        //header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);

        return back()->with('success_message', 'Il tuo ordine è stato inviato al ristorante. L\'ID dell\'ordine è: ' . $newOrder->id);
    } else {
        $errorString = "";

        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        //$_SESSION["errors"] = $errorString;
        //header("Location: " . $baseUrl . "index.php");

        return back()->withErrors('An error occurred with the message: ' . $result->message);
    }
});