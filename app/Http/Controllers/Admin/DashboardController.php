<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    $restaurants = Restaurant::where('user_id', Auth::id())->get();
    return view('admin.dashboard', compact('restaurants'));
  }
}
