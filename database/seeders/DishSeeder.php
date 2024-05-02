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
        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Tagliere di affettati locali";
        $dish->description = "Selezione di affettati locali di prima qualità";
        $dish->price = 17;
        $dish->slug = Str::slug($dish->name);
        $dish->save();


        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Pizza Margherita";
        $dish->description = "Pizza con pomodoro, mozzarella, basilico, olio, origano";
        $dish->price = 5;
        $dish->slug = Str::slug($dish->name);
        $dish->save();


        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Spaghetti al pomodoro";
        $dish->description = "Spaghetto trafilato al bronzo saltato con del pomodoro del Piennolo";
        $dish->price = 8;
        $dish->slug = Str::slug($dish->name);
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Costata di Manzo Argentino alla brace";
        $dish->description = "Costata di Manzo Argentino cotto su brace di pietra Pomice con contorno a scelta";
        $dish->price = 25;
        $dish->slug = Str::slug($dish->name);
        $dish->save();


        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Tiramisù";
        $dish->description = "Nostro Tiramisù della casa con uova pastorizzate  mascarpone no lattosio e biscotti homemade";
        $dish->price = 8;
        $dish->slug = Str::slug($dish->name);
        $dish->save();



        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Crudi di pesce";
        $dish->description = "Cruditè di pesce di prima Qualità";
        $dish->price = 40;
        $dish->slug = Str::slug($dish->name);
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Risotto alla Pescatora";
        $dish->description = "Risotto ai frutti di mare con battuta di gambero rosso di Mazzara";
        $dish->price = 5;
        $dish->slug = Str::slug($dish->name);
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "SanPietro al forno";
        $dish->description = "Pesce SanPietro di varie pezzature con contorno a scelta";
        $dish->price = 40;
        $dish->slug = Str::slug($dish->name);
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Panna cotta";
        $dish->description = "Panna cotta fatta in casa con topping a scelta";
        $dish->price = 7;
        $dish->slug = Str::slug($dish->name);
        $dish->save();
    }
}
