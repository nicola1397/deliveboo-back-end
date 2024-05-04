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
    public function index(Request $request, Restaurant $restaurant)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())->get()->toArray();
        $id_restaurant = $restaurant[0]['id'];

        $dishes = Dish::where('restaurant_id', $id_restaurant)->paginate(10);
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
    public function store(DishStoreRequest $request, Restaurant $restaurant)
    {

        $restaurant = Restaurant::where('user_id', Auth::id())->get()->toArray();
        $id_restaurant = $restaurant[0]['id'];

        $request->validated();
        $data = $request->all();
        $dish = new Dish;
        $dish->fill($data);
        $dish->slug = Str::slug($dish->name);

        $dish->restaurant_id = $id_restaurant;

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

        $restaurant = Restaurant::where('user_id', Auth::id())->get()->toArray();
        $id_restaurant = $restaurant[0]['id'];

        $request->validated();
        $data = $request->all();

        $dish->update($data);
        $dish->slug = Str::slug($data['name']);

        $dish->restaurant_id = $id_restaurant;

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
}
