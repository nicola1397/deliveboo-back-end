<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds of the types of restaurants.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $type = new Type;
        $type->label = 'Italiana';
        $type->image = 'assets/types/italy.svg';
        $type->save();

        $type = new Type;
        $type->label = 'Asiatica';
        $type->image = 'assets/types/asian.jpg';
        $type->save();

        $type = new Type;
        $type->label = 'Messicana';
        $type->image = 'assets/types/mexican.png';
        $type->save();

        $type = new Type;
        $type->label = 'Tedesca';
        $type->image = 'assets/types/germany.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Sarda';
        $type->image = 'assets/types/sardinia.png';
        $type->save();

        $type = new Type;
        $type->label = 'BBQ';
        $type->image = 'assets/types/bbq.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Pizza';
        $type->image = 'assets/types/pizza.jpg';
        $type->save();

        $type = new Type;
        $type->label = 'Dolci';
        $type->image = 'assets/types/dessert.avif';
        $type->save();

        $type = new Type;
        $type->label = 'Pesce';
        $type->image = 'assets/types/fish.jpg';
        $type->save();

        $type = new Type;
        $type->label = 'Pasta';
        $type->image = 'assets/types/pasta.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Tagliere';
        $type->image = 'assets/types/tagliere misto.jpeg';
        $type->save();

        $type = new Type;
        $type->label = 'Pollo';
        $type->image = 'assets/types/pollo arrosto.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Vegano';
        $type->image = 'assets/types/vegetali.jpeg';
        $type->save();

        $type = new Type;
        $type->label = 'Celiaci';
        $type->image = 'assets/types/pasta.webp';
        $type->save();

        $type = new Type;
        $type->label = 'Gelato';
        $type->image = 'assets/types/gelato.jpg';
        $type->save();

        $type = new Type;
        $type->label = 'Kebab';
        $type->image = 'assets/types/kebab.avif';
        $type->save();

        // $type = new Type;
        // $type->label = 'Argentino';
        // $type->image = 'assets/types/bbq.webp';
        // $type->save();
    }
}
