<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\RestaurantController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {

    // GET RESTAURANT

    $restaurant = Restaurant::where('user_id', Auth::id())->first();

    if (!$restaurant) {

      return redirect()->route('admin.restaurants.create')->with('error' , 'Non hai ancora un ristorante!');
    }

    $restaurantUserId = $restaurant->user_id;

    if (Auth::user()->id != $restaurantUserId) {
      abort(401);
    }

    $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantUserId) {
      $query->where('user_id', $restaurantUserId);
    })->with('dishes')->orderBy('date_time', 'desc')->get();

    return view('admin.dashboard', compact('restaurant', 'orders'));


  }
}
