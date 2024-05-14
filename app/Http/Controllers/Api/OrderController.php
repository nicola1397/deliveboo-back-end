<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest as PaymentRequest;
use App\Models\Dish;
use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;



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

        $request->validated();
        $data = $request->all();

        $customer_name = $request->input('customer_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $date_time = $request->input('date_time');
        $price = $request->input('price');
        $amount = $request->input('amount');
        $orderData = json_decode($request->input('orderData'), true);
        $token = $request->input('token');
        $newOrder = $data;



        // Order::create($newOrder);
        DB::transaction(function () use ($orderData, $newOrder) {

            $order = Order::create($newOrder);
            // dd($orderData);
            foreach ($orderData as $dish) {
                // You can use the attach method if you have defined a many-to-many relationship in your Order model.
                $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
            }
        });

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
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita!'
            ];
            return response()->json($data, 401);
        }

    }

    public function newOrder(Request $request)
    {
        // todo logica nuovo ordine
        // todo Mail::to($request->user())->send(new NewsOrders());
    }
}
