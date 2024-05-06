<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::select(['id', 'user_id', 'name', 'slug', 'phone', 'p_iva', 'address', 'image',])
            ->with([
                'dishes' => function ($query) {
                    $query->select(['id', 'restaurant_id', 'name', 'description', 'price', 'availability', 'image', 'slug']);
                },

                'types' => function ($query) {
                    $query->select(['id', 'label', 'color', 'image']);
                },
            ])

            ->get();

        return response()->json([
            'restaurants' => $restaurants,
            'success' => true
        ]);
    }

}
