<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
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
<<<<<<< HEAD
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
=======
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $project
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
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


    // public function destroyImg(Project $project)
    // {
    //     Storage::delete($project->image);
    //     $project->image = null;
    //     $project->save();
    //     return redirect()->back();
    // }
>>>>>>> 390f13dc8aa0906114291d00d8a566296fcf105e
}
