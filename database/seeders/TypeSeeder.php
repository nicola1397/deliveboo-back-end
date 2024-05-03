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
        $type->label = 'italiana';
        $type->color = $faker->hexColor();
        $type->save();

        $type = new Type;
        $type->label = 'asiatica';
        $type->color = $faker->hexColor();
        $type->save();

        $type = new Type;
        $type->label = 'messicana';
        $type->color = $faker->hexColor();
        $type->save();

        $type = new Type;
        $type->label = 'tedesca';
        $type->color = $faker->hexColor();
        $type->save();

        $type = new Type;
        $type->label = 'sarda';
        $type->color = $faker->hexColor();
        $type->save();

    }
}
