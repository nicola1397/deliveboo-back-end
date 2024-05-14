<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
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

        $restaurants = Restaurant::select(['id', 'user_id', 'name', 'slug', 'phone', 'p_iva', 'address', 'image'])
            ->orderBy('name')
            ->with([
                'dishes' => function ($query) {
                    $query->select(['id', 'restaurant_id', 'name', 'description', 'price', 'availability', 'image', 'slug'])->orderBy('name');
                },
                'types' => function ($query) {
                    $query->select(['label', 'image', 'color'])->orderBy('label');
                },
            ])->get()->map(function ($restaurants) {
                $restaurants->image = asset('storage/' . $restaurants->image);
                $restaurants->dishes->each(function ($dish) {
                    $dish->image = asset('storage/' . $dish->image);
                });
                $restaurants->types->each(function ($type) {
                    $type->image = asset('storage/' . $type->image);
                });
                return $restaurants;
            });

        $types = Type::select(['id', 'label', 'image'])
            ->orderBy('label')
            ->get();
        foreach ($types as $type) {
            $type->image = asset('/storage' . "/" . $type->image);
        }


        return response()->json([
            'restaurants' => $restaurants,
            'types' => $types,
            'success' => true
        ]);
    }

    public function show($slug)
    {

        $restaurants = Restaurant::select(['id', 'user_id', 'name', 'slug', 'phone', 'p_iva', 'address', 'image',])
            ->where('slug', $slug)
            ->orderBy('name')
            ->with([
                'dishes' => function ($query) {
                    $query->select(['id', 'restaurant_id', 'name', 'description', 'price', 'availability', 'image', 'slug'])
                        ->orderBy('name');
                },

                'types' => function ($query) {
                    $query->select(['label', 'image'])->orderBy('label');
                },
            ])->get()->map(function ($restaurants) {
                $restaurants->image = asset('storage/' . $restaurants->image);
                $restaurants->dishes->each(function ($dish) {
                    $dish->image = asset('storage/' . $dish->image);
                });
                $restaurants->types->each(function ($type) {
                    $type->image = asset('storage/' . $type->image);
                });
                return $restaurants;
            });

        return response()->json([
            'restaurants' => $restaurants,
            'success' => true
        ]);
    }



    public function filter($params, Request $request)
    {

        $paramsArray = explode('&', $params);
        $paramsCollection = collect($paramsArray);


        $restaurants = Restaurant::select(['id', 'user_id', 'name', 'slug', 'phone', 'p_iva', 'address', 'image'])
            ->orderBy('name')
            ->whereHas('types', function ($query) use ($paramsCollection) {
                $query->whereIn('label', $paramsCollection->toArray());
            }, '>=', $paramsCollection->count())
            ->with([
                'dishes' => function ($query) {
                    $query->select(['id', 'restaurant_id', 'name', 'description', 'price', 'availability', 'image', 'slug'])->orderBy('name');
                },
                'types' => function ($query) {
                    $query->select(['label', 'image', 'color'])->orderBy('label');
                },
            ])
            ->get()->map(function ($restaurants) {
                $restaurants->image = asset('storage/' . $restaurants->image);
                $restaurants->dishes->each(function ($dish) {
                    $dish->image = asset('storage/' . $dish->image);
                });
                $restaurants->types->each(function ($type) {
                    $type->image = asset('storage/' . $type->image);
                });
                return $restaurants;
            });

        $types = Type::select(['id', 'label', 'image'])->orderBy('label')->get();
        foreach ($types as $type) {
            $type->image = asset('/storage' . "/" . $type->image);
        }


        return response()->json([
            'restaurants' => $restaurants,
            'types' => $types,
            'success' => true,
            'explosion' => $paramsCollection
        ]);
    }

    public function charts()
    {

        $restaurants = Restaurant::find(1)->where('user_id', Auth::id())->first()->toArray();
        $restaurantUserId = $restaurants['user_id'];
        if (Auth::user()->id != $restaurantUserId)
            abort(401);

        $orders = Order::whereHas('dishes.restaurant', function ($query) use ($restaurantUserId) {
            $query->where('user_id', $restaurantUserId);
        })->with('dishes')->get();


        return response()->json([$orders]);

    }

}

