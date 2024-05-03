<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurant = new Restaurant;
        // todo: importare i Types per la selezione nella creazione
        return view('admin.restaurants.form', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newRestaurant = new Restaurant;
        $newRestaurant->name = $data['name'];
        $newRestaurant->p_iva = $data['p_iva'];
        $newRestaurant->image = $data['image'];
        $newRestaurant->address = $data['address'];

        $newRestaurant->save();

        return redirect()->route('restaurants.show', $newRestaurant->id);
    }
}
