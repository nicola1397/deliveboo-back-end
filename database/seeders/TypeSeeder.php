<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = new Type;
        $type->label = 'Italiana';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/italy.svg';
        $type->save();

        $type = new Type;
        $type->label = 'Asiatica';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/asian.jpg';
        $type->save();

        $type = new Type;
        $type->label = 'Messicana';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/mexican.png';
        $type->save();

        $type = new Type;
        $type->label = 'Tedesca';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/germany.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Sarda';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/sardinia.png';
        $type->save();

        $type = new Type;
        $type->label = 'BBQ';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/bbq.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Pizza';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/pizza.jpg';
        $type->save();

        $type = new Type;
        $type->label = 'Dolci';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/dessert.avif';
        $type->save();

        $type = new Type;
        $type->label = 'Pesce';
        $type->color = $faker->hexColor();
        $type->image = 'assets/types/fish.jpg';
        $type->save();

    }
}
