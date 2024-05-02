<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $dish = new Dish;
            $dish->restaurant_id = 1;
            $dish->name = "pizza";
            $dish->description = "Pizza Margherita: pomodoro, mozzarella, basilico, olio, origano";
            $dish->price = 5;
            $dish->slug = Str::slug($dish->name);
            $dish->save();
        }
    }
}
