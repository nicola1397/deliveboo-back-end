<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest as PaymentRequest;
use App\Models\Dish;
use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        $orderData = $request->input('orderData');
        $token = $request->input('token');
$newOrder = $request->validate([
    'customer_name' => 'required|max:200',
    'email' => 'required|email|max:200',
    'phone' => 'required|max:20',
    'address' => 'required|max:250',
    'date_time' => 'required',
    'price' => 'required',
]);

Order::create($newOrder);



        $fileName = 'form-data.txt';
        $filePath = 'public/' . $fileName;
        Storage::put($filePath, $request);
        return redirect()->back()->with('success', 'Data has been saved to a text file.');

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
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
    }
}
