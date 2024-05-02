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
        $resturants = [
            [
                'name' => 'Lo sporcaccione',
                'p_iva' => '01235478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via innominabile, 44',
            ],
            [
                'name' => "L'asiatico allegro",
                'p_iva' => '01237898901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via della seta, 99',
            ],
            [
                'name' => 'Messicanino',
                'p_iva' => '01275308901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via dello scappato, 22',
            ],
            [
                'name' => 'Chernobyl',
                'p_iva' => '55555478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via radioattiva, XX',
            ],
            [
                'name' => 'DA Padre DEMETRIO',
                'p_iva' => '01235998901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via arrabbiata, 69',
            ],
            [
                'name' => 'Da quei 6mascalzoni',
                'p_iva' => '03215478901',
                'image' => 'picsum.photos/200/300',
                'address' => 'via inconsapevole, 23',
            ],
        ];

        foreach ($resturants as $resturant_data) {
            $resturant = new Restaurant;
            $resturant->name = $resturant_data['name'];
            $resturant->p_iva = $resturant_data['p_iva'];
            $resturant->image = $resturant_data['image'];
            $resturant->address = $resturant_data['address'];
            $resturant->save();
        }
    }
}
