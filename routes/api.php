<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// ROUTES FOR BESTEMMIE 



Route::get('/restaurants/search={types}', [RestaurantControllerApi::class, 'filter']);
Route::apiResource('restaurants', RestaurantControllerApi::class);

//braintree
Route::get('order/generate', [OrderController::class, 'generate']);
Route::post('order/make/payment', [OrderController::class, 'makePayment']);


/*order
* todo: rotta ordine
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
