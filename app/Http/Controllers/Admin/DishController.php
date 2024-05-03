<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

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
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())->get();


        foreach ($restaurants as $restaurant) {
            $restaurant = $restaurant;
        }


        $dishes = Dish::where('restaurant_id', $restaurant->user_id)->paginate(10);
        return view('admin.dishes.index', compact('dishes'));
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
    public function store(Request $request, Restaurant $restaurant)
    {
        $data = $request->all();


        $dish = new Dish;
        $dish->fill($data);
        $dish->slug = Str::slug($dish->name);


        // $dish->restaurant_id = $restaurant->id;

        if (Arr::exists($data, 'image')) {
            $img_path = Storage::put('upload/projects', $data['image']);
            $dish->image = $img_path;
        }

        $dish->save();

        return redirect()->route('admin.dishes.show', compact('dish'))->with('message-class', 'alert-success')->with('message', 'New Dish Added.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
   
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish

     */
    public function edit(Dish $dish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
 
     */
    public function update(Request $request, Dish $dish)
    {
        //
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
}
