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
  



    $restaurant = Restaurant::where('user_id', Auth::id())->first();

    if (!$restaurant) {
        // Handle the case where the restaurant doesn't exist
        abort(404, 'Restaurant not found.');
    }
    
    $restaurantUserId = $restaurant->user_id;
    
    if (Auth::user()->id != $restaurantUserId) {
        abort(403);
    }
    
    $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantUserId) {
        $query->where('user_id', $restaurantUserId);
    })->with('dishes')->orderBy('date_time', 'desc')->get();
    
    return view('admin.dashboard', compact('restaurant', 'orders'));
    
  }
}
