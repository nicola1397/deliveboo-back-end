<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        // creo un  nuovo ordine
        for($i = 0; $i < 100; $i++) {

            $order = new Order;
            $order->customer_name = $faker->firstName();
            $order->email = $faker->email();;
            $order->phone = $faker->phoneNumber();
            $order->address = $faker->address();
            $order->date_time = $faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d');
            $order->price = $faker->randomFloat(2, 0, 999);
            
            $order->save();
            
            // collego l'ordine ad un piatto randomico
            $dish = Dish::where('id', random_int(1, 30))->get();
            $order->dishes()->attach($dish);
        }
        
    }
}
