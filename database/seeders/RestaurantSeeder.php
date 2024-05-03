<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'user_id' => 1,
                'name' => 'Lo sporcaccione',
                'p_iva' => '01235478901',
                'image' => 'img/restaurants/losporcaccione.png',
                'address' => 'via innominabile, 44',
            ],
/*             [
                'user_id' => 1,
                'name' => "L'asiatico allegro",
                'p_iva' => '01237898901',
                'image' => 'img/restaurants/lasiaticoallegro.png',
                'address' => 'via della seta, 99',
            ],
            
            [
                'user_id' => 1,
                'name' => 'Messicanino',
                'p_iva' => '01275308901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via del sombrero, 22',
            ], */
            [
                'user_id' => 2,
                'name' => 'Nonno Bismarck',
                'p_iva' => '55555478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via bellicosa, XX',
            ],
/*             [
                'user_id' => 2,
                'name' => 'Da Padre Demetrio',
                'p_iva' => '01235998901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via arrabbiata, 69',
            ],
            [
                'user_id' => 2,
                'name' => 'Da quei mascalzoni',
                'p_iva' => '03215478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via inconsapevole, 23',
            ], */
           
        ];

        foreach ($restaurants as $restaurant_data) {
            $restaurant = new Restaurant;
            $restaurant->user_id = $restaurant_data['user_id'];
            $restaurant->name = $restaurant_data['name'];
            $restaurant->slug = Str::slug($restaurant->name);
            $restaurant->p_iva = $restaurant_data['p_iva'];
            $restaurant->image = $restaurant_data['image'];
            $restaurant->address = $restaurant_data['address'];
            $restaurant->save();
        }
    }
}
