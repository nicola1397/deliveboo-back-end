<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    
     */

    public function index()
    {

        // controllo se l'utente loggato corrisponde a chi fa la richiesta
        $restaurant = Restaurant::find(1)->where('user_id', Auth::id())->first()->toArray();
        $restaurantUserId = $restaurant['user_id'];
        if (Auth::user()->id != $restaurantUserId)
            abort(401);

        $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantUserId) {
            $query->where('user_id', $restaurantUserId);
        })->with('dishes')->get();

        return view('admin.orders.index', compact('orders'));
    }


    public function show(Order $order, Dish $dish)
    {
        // Controllo dei permessi per vedere gli ordini inerenti al ristorante
        $restaurant = Restaurant::find(1)->where('user_id', Auth::id())->first()->toArray();
        $restaurantUserId = $restaurant['user_id'];
        $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantUserId) {
            $query->where('user_id', $restaurantUserId);
        })->with([
                    'dishes' => function ($query) {
                        $query->withPivot('order_id');
                    }
                ])->get()->toArray();

        // $orderId = $orders[0]['id'];

        // if ($order->id != $orderId) {
        //     abort(401);
        // }


        $order = Order::where('id', $order->id)->with([
            'dishes' => function ($query) {
                $query->withPivot('quantity');
            }
        ])->firstOrFail();

        return view('admin.orders.show', compact('order'));
    }


}

