<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class ResturantSeeder extends Seeder
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
                'image' => 'picsum.photos/200/300',
                'address' => 'via innominabile, 44',
                'user_id' => '1'
            ],
            [
                'user_id' => 1,
                'name' => "L'asiatico allegro",
                'p_iva' => '01237898901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via della seta, 99',
                'user_id' => '2'
            ],
            /*
            [
                'user_id' => 1,
                'name' => 'Messicanino',
                'p_iva' => '01275308901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via dello scappato, 22',
            ],
            [
                'user_id' => 2,
                'name' => 'Chernobyl',
                'p_iva' => '55555478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via radioattiva, XX',
            ],
            [
                'user_id' => 2,
                'name' => 'DA Padre DEMETRIO',
                'p_iva' => '01235998901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via arrabbiata, 69',
            ],
            [
                'user_id' => 2,
                'name' => 'Da quei 6mascalzoni',
                'p_iva' => '03215478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via inconsapevole, 23',
            ],
            */
        ];

<<<<<<< HEAD:database/seeders/ResturantSeeder.php
        foreach ($resturants as $resturant_data) {
            $resturant = new Restaurant;
            $resturant->user_id= $resturant_data['user_id'];
            $resturant->name = $resturant_data['name'];
            $resturant->p_iva = $resturant_data['p_iva'];
            $resturant->image = $resturant_data['image'];
            $resturant->address = $resturant_data['address'];
            $resturant->save();
=======
        foreach ($restaurants as $restaurant_data) {
            $restaurant = new Restaurant;
            $restaurant->name = $restaurant_data['name'];
            $restaurant->p_iva = $restaurant_data['p_iva'];
            $restaurant->image = $restaurant_data['image'];
            $restaurant->address = $restaurant_data['address'];
            $restaurant->user_id = $restaurant_data['user_id'];
            $restaurant->save();
>>>>>>> b5600a68d1606a63c3c0d2997280675f900e91ef:database/seeders/RestaurantSeeder.php
        }
    }
}
