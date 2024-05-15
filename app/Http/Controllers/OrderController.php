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

        })->with('dishes')->orderBy('date_time', 'desc')->paginate(10);


        return view('admin.orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        // First, check if the logged-in user owns the restaurant associated with the order
        $restaurantUserId = $order->dishes->first()->restaurant->user_id;

        if (Auth::id() != $restaurantUserId) {
            abort(403, 'You do not have permission to view this order.');
        }

        // Load the dishes with pivot data
        $order->load([
            'dishes' => function ($query) {
                $query->withPivot('quantity');
            }
        ]);


        // Return the view with the order
        return view('admin.orders.show', compact('order'));
    }


}




