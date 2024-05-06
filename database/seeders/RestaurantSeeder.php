<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds of the restaurants
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'user_id' => 1,
                'name' => 'Lo sporcaccione',
                'phone' => '3247526001',
                'p_iva' => '01235478907',
                'image' => 'img/restaurants/losporcaccione.png',
                'address' => 'via innominabile, 44, 70100, Bari',
                'types' => [
                    "Italiana",
                    "BBQ",
                    'Dolci'
                ],
            ],
            [
                'user_id' => 2,
                'name' => "L'asiatico allegro",
                'phone' => '3247526002',
                'p_iva' => '01237898906',
                'image' => 'img/restaurants/lasiaticoallegro.png',
                'address' => 'via della seta, 99, 20100, Milano',
                'types' => [
                    "Asiatica",
                    'Pesce'
                ],
            ],

            [
                'user_id' => 3,
                'name' => 'Messicanino',
                'phone' => '3247526003',
                'p_iva' => '01275308905',
                'image' => 'img/restaurants/messicanino.jpg',
                'address' => 'via del sombrero, 22, 20100, Milano',
                'types' => [
                    "Messicana",
                    'BBQ'
                ],
            ],
            [
                'user_id' => 4,
                'name' => 'Nonno Bismarck',
                'phone' => '3247526004',
                'p_iva' => '55555478904',
                'image' => 'img/restaurants/nonno-bismarck.jpg',
                'address' => 'via bellicosa, XX, 40100, Bologna',
                'types' => [
                    "Tedesca",
                    'Dolci'
                ],
            ],
            [
                'user_id' => 5,
                'name' => 'Da Padre Demetrio',
                'phone' => '3247526005',
                'p_iva' => '01235998902',
                'image' => 'img/restaurants/da-demetrio.jpg',
                'address' => 'via arrabbiata, 69, 07100, Sassari',
                'types' => [
                    "Italiana",
                    'Sarda'
                ],
            ],
            [
                'user_id' => 6,
                'name' => 'Il buco',
                'phone' => '3247526006',
                'p_iva' => '55555478934',
                'image' => 'img/restaurants/il-buco.jpeg',
                'address' => 'via giocosa, XX, 41100, Modena',
                'types' => [
                    "Pesce",
                    'Italiana',
                    'Dolci'
                ],
            ],

        ];
        // Salvare nuovo ristorante
        foreach ($restaurants as $restaurant_data) {
            $restaurant = new Restaurant;
            $restaurant->user_id = $restaurant_data['user_id'];
            $restaurant->name = $restaurant_data['name'];
            $restaurant->phone = $restaurant_data['phone'];
            $restaurant->slug = Str::slug($restaurant->name);
            $restaurant->p_iva = $restaurant_data['p_iva'];
            $restaurant->image = $restaurant_data['image'];
            $restaurant->address = $restaurant_data['address'];
            $restaurant->save();

            // Associare i tipi di ristorante al ristorante
            $restaurantTypes = $restaurant_data['types'];

            // dove Type e uguale al nome di un elemento dell'array $restaurantTypes la funzione pluck associa gli id corrispondenti
            $restaurant->types()->attach(Type::whereIn('label', $restaurantTypes)->pluck('id'));
        }
    }
}
