<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();

        $types = Type::all()->pluck('id')->toArray();
        $types_length = count($types);


        foreach ($restaurants as $restaurant) {
            $fake_num_tech = $faker->numberBetween(0, $types_length);
            $restaurant->types()->sync($faker->randomElements($types, $fake_num_tech));
        }
    }
}
