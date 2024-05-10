<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {

    // GET RESTAURANT
  



    $restaurants = Restaurant::find(1)->where('user_id', Auth::id())->first()->toArray();
        $restaurantUserId = $restaurants['user_id'];
        if (Auth::user()->id != $restaurantUserId)
            abort(403);

            $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantUserId) {
                $query->where('user_id', $restaurantUserId);
            })->with('dishes')->get();


    return view('admin.dashboard', compact('restaurants', 'orders'));


  }
}
