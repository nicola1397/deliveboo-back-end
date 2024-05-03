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
}
