<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

        $restaurant = new Restaurant;
        $restaurant->name = $data['name'];
        $restaurant->p_iva = $data['p_iva'];
        $restaurant->image = $data['image'];
        $restaurant->address = $data['address'];
        $restaurant->user_id = Auth::id();
        $restaurant->slug = Str::slug($restaurant->name);

        $restaurant->save();

        return redirect()->route('admin.restaurants.show', $restaurant->id);
    }
    /*
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $project
     *                                                 
     */
    public function destroy(Restaurant $restaurant)
    {
        // if (!empty($restaurant->image)) {
        //     Storage::delete($restaurant->image);
        // }
        $restaurant->delete();
        // return redirect()->route('admin.restaurants.index')->with('message-class', 'alert-danger')->with('message', 'Restaurant Deleted');
        return redirect()->route('admin.restaurants.index');
    }
}
