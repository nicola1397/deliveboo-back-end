<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantStoreRequest;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Type;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

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
        $types = Type::all();
        return view('admin.restaurants.form', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(RestaurantStoreRequest $request)
    {

        // validiamo i dati
        $request->validated();

        // recupero dati
        $data = $request->all();



        //istanzio nuovo ristorante
        $restaurant = new Restaurant;

        //filloil ristorante con i dati del form
        $restaurant->fill($data);


        /*
        $restaurant->name = $data['name'];
        $restaurant->phone = $data['phone'];
        $restaurant->p_iva = $data['p_iva'];
        $restaurant->image = $data['image'];
        $restaurant->address = $data['address'];
        // $restaurant->types = $data['types'];
        */


        //lego il nuovo ristorante all'autore/utente loggato
        $restaurant->user_id = Auth::id();
        //genero lo slug
        $restaurant->slug = Str::slug($restaurant->name);

        //gestione immagine
        if (Arr::exists($data, "image")) {
            $img_path = Storage::put('uploads/restaurants', $data['image']);
            $restaurant->image = $img_path;
        }

        //salvataggio nel db
        $restaurant->save();

        // relazione ristoranti ai tipi associati
        if (Arr::exists($data, 'types')) {
            $restaurant->types()->attach($data['types']);
        }

        return redirect()->route('admin.restaurants.show', $restaurant->id);
    }


    /*
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $project
     */
    public function show(Restaurant $restaurant, Dish $dish)
    {


        // Permission user-restaurant

        if (Auth::user()->id != $restaurant->user_id)
            abort(403);


        $user = User::where('user_id', $restaurant->user_id);
        $dishes = Dish::where("restaurant_id", $restaurant->id)->get();

        $types = Type::all();
        return view('admin.restaurants.show', compact('restaurant', 'user', 'types', 'dishes'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $project
     *                                                 
     */
    public function destroy(Restaurant $restaurant)
    {
        if (!empty($restaurant->image)) {
            Storage::delete($restaurant->image);
        }
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index')->with('message-class', 'alert-danger')->with('message', 'Restaurant Deleted');
    }
}
