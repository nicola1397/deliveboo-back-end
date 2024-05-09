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
        $restaurant = Restaurant::find(1)->where('user_id', Auth::id())->get()->toArray();
        $restaurantUserId = $restaurant[0]['user_id'];
        // dd($restaurantUserId);
        if (Auth::user()->id != $restaurantUserId)
            abort(403);




        // ###VARIE PROVE-------------------------------------------------------

        // $dishes = Auth::user()->restaurant->dishes->toArray();
        // $dishesId = [];

        // foreach ($dishes as $dish)
        //     array_push($dishesId, $dish['id']);


        // $dishes = Dish::where('restaurant_id', Auth::user()->restaurant->id)
        //     ->with('orders')
        //     ->get();

        // $ordersId = Order::all()->pluck('id')->toArray();
        // $ordersCount = $orders->count();

        // foreach ($allOrders as $order)
        //     if (!empty($order->dishes()))
        //         array_push($orders, $order);

        // ###FINE PROVE----------------------------------------------------------


        $orders = Order::with([
            'dishes' => function ($q) {
                $q->where('restaurant_id', Auth::user()->restaurant->id);
            }
        ])->get()->toArray();

        // dd($orders);

        return view('admin.orders.index', compact('orders'));
    }

}
