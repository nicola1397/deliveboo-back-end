<?php

use App\Http\Controllers\Guest\DashboardController as GuestDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// # Rotte pubbliche
Route::get('/', [GuestDashboardController::class, 'index'])
  ->name('home');

// # Rotte protette
Route::middleware('auth')
  ->prefix('/admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
      ->name('dashboard');

    /* ROUTES RESTAURANTS */
    Route::resource('/restaurants', RestaurantController::class);

    /* ROUTES DISHES */
    Route::resource('/dishes', DishController::class);

    /* ROUTES FOR DISH IMAGE REMOVAL */
    Route::delete('/dishes/{dish}/destroyImage', [DishController::class, 'destroyImage'])->name('dish.destroyImage');

    // ROUTE FOR ORDERS
    Route::resource('/orders', OrderController::class);

  });


require __DIR__ . '/auth.php';

