<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds of the dishes
     *
     * @return void
     */
    public function run()
    {

        $dishes = [
            [
                'restaurant_id' => 1,
                'name' => 'Tagliere di affettati locali',
                'description' => 'Selezione di affettati locali di prima qualità',
                'price' => 12,
                'availability' => false,
                'image' => 'uploads/dishes/tagliere.webp',
            ],

            [
                'restaurant_id' => 1,
                'name' => 'Costata pacettata',
                'description' => 'Costata di maiale grigliata e a metà cottura avvolta nella pancetta prima della cottura finale',
                'price' => 18,
                'availability' => true,
                'image' => 'uploads/dishes/costata.webp',
            ],

            [
                'restaurant_id' => 1,
                'name' => 'Galletto alla brace',
                'description' => 'Galletto di prima scelta, marinato con birra, rosmarino, aglio e grigliato',
                'price' => 15,
                'availability' => true,
                'image' => 'uploads/dishes/galletto alla diavola Fine Dining Lovers.avif',
            ],

            [
                'restaurant_id' => 1,
                'name' => 'La regina Fiorentina',
                'description' => 'Bistecca Fiorentina da 1.5Kg al sangue, servita con contorno di patate al forno e pomodorini',
                'price' => 22,
                'availability' => true,
                'image' => 'uploads/dishes/bistecca-fiorentina.jpg',
            ],

            [
                'restaurant_id' => 1,
                'name' => 'Tiramisù',
                'description' => 'Nostro Tiramisù della casa con uova pastorizzate  mascarpone no lattosio e biscotti homemade',
                'price' => 8,
                'availability' => true,
                'image' => 'uploads/dishes/tiramisu.jpg',
            ],

            [
                'restaurant_id' => 2,
                'name' => 'Involtini primavera',
                'description' => 'Involtini primavera tradizionali, con verdure e salsa agrodolce di accomagnamento',
                'price' => 8,
                'availability' => true,
                'image' => 'uploads/dishes/Veg-Spring-Rolls-3.jpg',
            ],

            [
                'restaurant_id' => 2,
                'name' => 'Ravioli di gamberi',
                'description' => 'Ravioli al vapore tradizionali con ripieno di verdure e gamberi',
                'price' => 8.50,
                'availability' => false,
                'image' => 'uploads/dishes/ravioli-al-vapore-cinesi-ecco-la-vera-ricetta-tradizionale-ripieno-carne-o-pesce.jpg',
            ],

            [
                'restaurant_id' => 2,
                'name' => 'Onigiri',
                'description' => 'Onigiri di riso con ripieno di pollo fritto e verdure fritte',
                'price' => 10.50,
                'availability' => true,
                'image' => 'uploads/dishes/onigiri.webp',
            ],

            [
                'restaurant_id' => 2,
                'name' => 'Riso cantonese',
                'description' => 'Tradizionale riso cantonese con verdure, gamberi e zafferano',
                'price' => 14.99,
                'availability' => true,
                'image' => 'uploads/dishes/riso-alla-cantonese-.jpeg',
            ],

            [
                'restaurant_id' => 2,
                'name' => 'Bocconcini sushi',
                'description' => 'Selezione di 4 coppie di sushi con salmone, gambero, tonno e polipo',
                'price' => 9.99,
                'availability' => true,
                'image' => 'uploads/dishes/bocconcini sushi mix.webp',
            ],

            [
                'restaurant_id' => 3,
                'name' => 'Nachos',
                'description' => 'Tortillias con formaggio fuso, avocado e pomodorini',
                'price' => 12.99,
                'availability' => true,
                'image' => 'uploads/dishes/nachos.jpeg',
            ],

            [
                'restaurant_id' => 3,
                'name' => 'Empanadas',
                'description' => 'Ravioli croccanti di pasta cotti al forno con ripieno di patate e carne',
                'price' => 15.99,
                'availability' => true,
                'image' => 'uploads/dishes/empanadas.jpeg',
            ],

            [
                'restaurant_id' => 3,
                'name' => 'Frijoles',
                'description' => 'Fagioli rossi messicanicotti con sugo piccante e pezzi di salsiccia',
                'price' => 11.99,
                'availability' => true,
                'image' => 'uploads/dishes/frijoles.jpeg',
            ],

            [
                'restaurant_id' => 3,
                'name' => 'Churrasco',
                'description' => 'Grigliata di carne mista (pollo, manzo, maiale, agnello) cotta con fiamma lambente',
                'price' => 25,
                'availability' => true,
                'image' => 'uploads/dishes/churrasco.jpeg',
            ],

            [
                'restaurant_id' => 3,
                'name' => 'Costata di Manzo Argentino alla brace',
                'description' => 'Costata di Manzo Argentino cotto su brace di pietra Pomice con contorno a scelta',
                'price' => 23.50,
                'availability' => false,
                'image' => 'uploads/dishes/manzo argentino all abrace.jpeg',
            ],

            [
                'restaurant_id' => 4,
                'name' => 'Ueberbackene Zwiebelsuppe',
                'description' => 'Zuppa di cipolle e patate cotta a fuoco lento in un tegame di terracotta',
                'price' => 9,
                'availability' => true,
                'image' => 'uploads/dishes/Ueberbackene Zwiebelsuppe.webp',
            ],


            [
                'restaurant_id' => 4,
                'name' => 'Crauti',
                'description' => 'Crauti di verza fermentata con aceto e sale cotti con pezzi di würstel e accompagnati con senape',
                'price' => 12,
                'availability' => true,
                'image' => 'uploads/dishes/original_wurstel-tedeschi-con-crauti-ed-erbe-aromatiche.jpg',
            ],


            [
                'restaurant_id' => 4,
                'name' => 'Knödel',
                'description' => 'Canederli con speck e formaggio cotti in brodo ',
                'price' => 19,
                'availability' => true,
                'image' => 'uploads/dishes/knodel.webp',
            ],


            [
                'restaurant_id' => 4,
                'name' => 'Gulash',
                'description' => 'Spezzatino di cinghiale, cotto 3 ore con sugo di cipolla, carota, pomodoro e spezie',
                'price' => 17,
                'availability' => false,
                'image' => 'uploads/dishes/knodel.webp',
            ],


            [
                'restaurant_id' => 4,
                'name' => 'Sacher',
                'description' => 'Torta sacher tipica con farina, cioccolato, burro e marmellata di albiccocche',
                'price' => 7,
                'availability' => true,
                'image' => 'uploads/dishes/sacher.jpeg',
            ],


            [
                'restaurant_id' => 5,
                'name' => 'Tagliere di formaggi',
                'description' => 'Selezione di pecorini sardi e casumarzu con carasau di accompagnamento',
                'price' => 15,
                'availability' => true,
                'image' => 'uploads/dishes/tagliere sardo.jpeg',
            ],


            [
                'restaurant_id' => 5,
                'name' => 'Culurgiones al pomodoro e pecorino',
                'description' => 'Pasta ripiena con patate e menta in sugo di pomodoro e spolverata di pecorino',
                'price' => 12,
                'availability' => true,
                'image' => 'uploads/dishes/culurgiones-al-pomodoro.jpg',
            ],


            [
                'restaurant_id' => 5,
                'name' => 'Porceddu',
                'description' => 'iovanissimo esemplare di maialino, grigliato a fuoco lento sulla brace',
                'price' => 22,
                'availability' => false,
                'image' => 'uploads/dishes/porceddu.jpeg',
            ],


            [
                'restaurant_id' => 5,
                'name' => 'Sa trattalia',
                'description' => 'Spiedi grigliati con interiora di agnello (pezzetti di cuore, polmone, fegato e reni)',
                'price' => 16,
                'availability' => true,
                'image' => 'uploads/dishes/trattalia.jpeg',
            ],


            [
                'restaurant_id' => 5,
                'name' => 'Seadas',
                'description' => 'Ravioli di semola e strutto, ripieni di formaggio, fritti e ricoperti di miele subito dopo la fruttura, sono da comsumare ancora caldi',
                'price' => 8,
                'availability' => true,
                'image' => 'uploads/dishes/seadas.jpeg',
            ],


            [
                'restaurant_id' => 6,
                'name' => 'Crudi di pesce',
                'description' => 'Cruditè di pesce di prima Qualità',
                'price' => 18,
                'availability' => true,
                'image' => 'uploads/dishes/crudomare.jpeg',
            ],


            [
                'restaurant_id' => 6,
                'name' => 'Risotto alla Pescatora',
                'description' => 'Risotto ai frutti di mare con battuta di gambero rosso di Mazzara',
                'price' => 14,
                'availability' => false,
                'image' => 'uploads/dishes/pescatora.jpg',
            ],

            [
                'restaurant_id' => 6,
                'name' => 'Pizza Margherita',
                'description' => 'Pizza con pomodoro, mozzarella, basilico, olio, origano',
                'price' => 7,
                'availability' => true,
                'image' => 'uploads/dishes/margherita.avif',
            ],


            [
                'restaurant_id' => 6,
                'name' => 'SanPietro al forno',
                'description' => 'Pesce SanPietro di varie pezzature con contorno a scelta',
                'price' => 28,
                'availability' => true,
                'image' => 'uploads/dishes/sanpietro.webp',
            ],

            [
                'restaurant_id' => 6,
                'name' => 'Panna cotta',
                'description' => 'Panna cotta fatta in casa con topping a scelta',
                'price' => 5,
                'availability' => true,
                'image' => 'uploads/dishes/pannacotta.avif',
            ],



        ];

        // Salvare nuovo ristorante
        foreach ($dishes as $dish_data) {

            $dish = new Dish;
            $dish->restaurant_id = $dish_data['restaurant_id'];
            $dish->name = $dish_data['name'];
            $dish->description = $dish_data['description'];
            $dish->price = $dish_data['price'];
            $dish->availability = $dish_data['availability'];
            $dish->slug = Str::slug($dish_data['name']);
            $dish->image = $dish_data['image'];
            $dish->save();

            // rendere lo slug univoco includendo l'id
            $dish->slug = Str::slug($dish->name) . '-' . $dish->id;
            $dish->update();
        }


    }
}
