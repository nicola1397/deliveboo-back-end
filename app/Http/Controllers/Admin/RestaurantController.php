<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $project
     */
    public function show(Restaurant $restaurant)
    {
        $user = User::where('user_id', $restaurant->user_id);
        $types = Type::all();
        return view('admin.restaurants.show', compact('restaurant', 'user', 'types'));
    }
}
