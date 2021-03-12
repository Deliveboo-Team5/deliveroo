<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use Braintree;
use Braintree\Gateway;
use Braintree\Transaction; 




class PaymentsController extends Controller
{
    public function checkout(PaymentRequest $requestData ,Request $request){
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
                'delivery_address' =>  $request->address,
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
    }
}
