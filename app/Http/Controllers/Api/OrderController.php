<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest as PaymentRequest;
use App\Mail\NewsOrders;
use App\Mail\OrderUserMail;
use App\Mail\OrderRestaurantMail;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            // salvataggio nuovo ordine nel DB
            $order = new Order;
            $order->fill($newOrder);
            $order->save();

            // recupero la mail del titolare del ristorante
            $restaurantId = $orderData[0]['restaurant_id'];
            $restaurant = Restaurant::with('user')->find($restaurantId);
            $restaurant_mail = $restaurant->user->email;
            $restaurantOwnerName = $restaurant->user->name;

            // invio le mail di conferma al ristoratore
            Mail::to($restaurant_mail)->send(new OrderRestaurantMail($restaurantOwnerName, $newOrder));

            // invio le mail di conferma all'utente
            Mail::to($email)->send(new OrderUserMail($newOrder));



            foreach ($orderData as $dish) {
                // You can use the attach method if you have defined a many-to-many relationship in your Order model.
                $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
            }




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
