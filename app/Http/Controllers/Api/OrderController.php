<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest as PaymentRequest;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMailable;




class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        //generazione del token da braintree
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {    
        
        $customer_name = $request->input('customer_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $date_time = $request->input('date_time');
        $price = $request->input('price');
        $amount = $request->input('amount');
        $orderData = json_decode($request->input('orderData'), true);
        $token = $request->input('token');

$newOrder = $request->validate([
    'customer_name' => 'required|max:200',
    'email' => 'required|email|max:200',
    'phone' => 'required|max:20',
    'address' => 'required|max:250',
    'date_time' => 'required',
    'price' => 'required',
]);

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => "fake-valid-nonce",
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo!'
            ];
       
            $restaurant_id =  $orderData[0]['restaurant_id'];
            $restaurant = Restaurant::with('user')->find($restaurant_id);
            $userEmail = $restaurant->user->email;
            Mail::to($userEmail)->send(new OrderMailable());
            Mail::to($email)->send(new OrderMailable());
                        
            DB::transaction(function () use ($orderData, $newOrder) {
            
                  $order = Order::create($newOrder);
                            
                          
                   foreach ($orderData as $dish) {
                     $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
                            }
                        });

            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita!'
            ];
            return response()->json($data, 401);
        }
    }
}

