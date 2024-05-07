<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Http\Requests\DishStoreRequest;
use App\Http\Requests\DishUpdateRequest;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    
     */
    public function index(Request $request)
    {
    if(empty(Auth::user()->restaurant->id)){
    return redirect()->route('admin.restaurants.create')->with('message-class', 'alert-danger')->with('message', 'Devi prima creare un ristorante!');
    }



        $restaurantId = Auth::user()->restaurant->id;

        // Permission user-restaurant-dishes for index

        $restaurant = Auth::user()->restaurant;
        $dishes = Dish::where('restaurant_id', $restaurantId)->orderBy('name')->paginate(10);
        return view('admin.dishes.index', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create(Dish $dish)
    {
        return view('admin.dishes.form', compact('dish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(DishStoreRequest $request)
    {
        // Permission user-restaurant-dishes for store

        $restaurantId = Auth::user()->restaurant->id;

        // Dish validation
        $request->validated();
        $data = $request->all();
        $data['restaurant_id'] = $restaurantId;

        // Data dish in store
        $dish = new Dish;
        $dish->fill($data);
        $dish->slug = Str::slug($dish->name);
        // Add img in dish store
        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('uploads/dishes', $data['image']);
            $dish->image = $img_path;
        }

        $dish->save();

        // Redirect to dish show & success output
        return redirect()->route('admin.dishes.show', compact('dish'))->with('message-class', 'alert-success')->with('message', 'New Dish Added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
   
     */
    public function show(Dish $dish)
    {
        if (Auth::user()->id != $dish->restaurant->user_id)
            abort(403);

        $restaurant = Auth::user()->restaurant;

        return view('admin.dishes.show', compact('dish', 'restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish

     */
    public function edit(Dish $dish)
    {

        if ($dish->restaurant->user_id != Auth::id())
            abort(403);
        return view('admin.dishes.form', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
 
     */
    public function update(DishUpdateRequest $request, Dish $dish)
    {

        $restaurantId = Auth::user()->restaurant->id;

        $request->validated();
        $data = $request->all();
        $data['restaurant_id'] = $restaurantId;
        $dish->update($data);
        $dish->slug = Str::slug($data['name']);



        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('img/dishes', $data['image']);
            $dish->image = $img_path;
        }

        $dish->save();
        return redirect()->route('admin.dishes.show', compact('dish'))->with('message-class', 'alert-success')->with('message', 'Dish Edited.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
    
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }

    public function destroyImage(Dish $dish)
    {
        Storage::delete($dish->image);
        $dish->image = null;
        $dish->save();
        return redirect()->back();
    }
}
