<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* RESTAURANT 1 DISHES */
        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Tagliere di affettati locali";
        $dish->description = "Selezione di affettati locali di prima qualità";
        $dish->price = 12;
        $dish->availability = false;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/tagliere.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Costata pacettata";
        $dish->description = "Costata di maiale grigliata e a metà cottura avvolta nella pancetta prima della cottura finale";
        $dish->price = 18;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Galletto alla brace";
        $dish->description = "Galletto di prima scelta, marinato con birra, rosmarino, aglio e grigliato";
        $dish->price = 15;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "La regina Fiorentina";
        $dish->description = "Bistecca Fiorentina da 1.5Kg al sangue, servita con contorno di patate al forno e pomodorini";
        $dish->price = 22;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 1;
        $dish->name = "Tiramisù";
        $dish->description = "Nostro Tiramisù della casa con uova pastorizzate  mascarpone no lattosio e biscotti homemade";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/tiramisu.jpg';
        $dish->save();


        /* RESTAURANT 2 DISHES */

        /* $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Involtini primavera";
        $dish->description = "Involtini primavera tradizionali, con verdure e salsa agrodolce di accomagnamento";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Ravioli di gamberi";
        $dish->description = "Ravioli al vapore tradizionali con ripieno di verdure e gamberi";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Onigiri";
        $dish->description = "Onigini di riso con ripieno di pollo fritto e verdure fritte";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Riso cantonese";
        $dish->description = "Tradizionale riso cantonese con verdure, gamberi e zafferano";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 2;
        $dish->name = "Bocconcini sushi";
        $dish->description = "Selezione di 4 coppie di sushi con salmone, gambero, tonno e polipo";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save(); */

        /* RESTAURANT 3 DISHES */

        /* $dish = new Dish;
        $dish->restaurant_id = 3;
        $dish->name = "Nachos";
        $dish->description = "Tortillias con formaggio fuso, avocado e pomodorini";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();
        
        $dish = new Dish;
        $dish->restaurant_id = 3;
        $dish->name = "Empanadas";
        $dish->description = "Ravioli croccanti di pasta cotti al forno con ripieno di patate e carne";
        $dish->price = 9;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 3;
        $dish->name = "Frijoles";
        $dish->description = "Fagioli rossi messicanicotti con sugo piccante e pezzi di salsiccia";
        $dish->price = 12;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 3;
        $dish->name = "Churrasco";
        $dish->description = "Grigliata di carne mista (pollo, manzo, maiale, agnello) cotta con fiamma lambente";
        $dish->price = 25;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 3;
        $dish->name = "Costata di Manzo Argentino alla brace";
        $dish->description = "Costata di Manzo Argentino cotto su brace di pietra Pomice con contorno a scelta";
        $dish->price = 23;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save(); */


        /* RESTAURANT 4 DISHES */

        $dish = new Dish;
        $dish->restaurant_id = 4;
        $dish->name = "Ueberbackene Zwiebelsuppe";
        $dish->description = "Zuppa di cipolle e patate cotta a fuoco lento in un tegame di terracotta";
        $dish->price = 9;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 4;
        $dish->name = "Crauti";
        $dish->description = "Crauti di verza fermentata con aceto e sale cotti con pezzi di wuster e accompagnati con senape";
        $dish->price = 12;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();
        
        $dish = new Dish;
        $dish->restaurant_id = 4;
        $dish->name = "Knodel";
        $dish->description = "Canederli con speck e formaggio cotti in brodo ";
        $dish->price = 13;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 4;
        $dish->name = "Gulash";
        $dish->description = "Spezzatino di cinghiale, cotto 3 ore con sugo di cipolla, carota, pomodoro e spezie";
        $dish->price = 17;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 4;
        $dish->name = "Sacher";
        $dish->description = "Torta sacher tipica con farina, cioccolato, burro e marmellata di albiccocche";
        $dish->price = 7;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/costata.webp';
        $dish->save();


        /* RESTAURANT 5 DISHES */

        /* $dish = new Dish;
        $dish->restaurant_id = 5;
        $dish->name = "Tagliere di formaggi";
        $dish->description = "Selezione di pecorini sardi e casumarzu con carasau di accompagnamento";
        $dish->price = 15;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 5;
        $dish->name = "Culurgiones al pomodoro e pecorino";
        $dish->description = "Pasta ripiena con patate e menta in sugo di pomodoro e spolverata di pecorino";
        $dish->price = 12;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();
        
        $dish = new Dish;
        $dish->restaurant_id = 5;
        $dish->name = "Porceddu";
        $dish->description = "Giovanissimo esemplare di maialino, strappato alla madre e grigliato a fuoco lento sulla brace";
        $dish->price = 22;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 5;
        $dish->name = "Sa trattalia";
        $dish->description = "Spiedi grigliati con interiora di agnello (pezzetti di cuore, polmone, fegato e reni)";
        $dish->price = 16;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 5;
        $dish->name = "Seadas";
        $dish->description = "Ravioli di semola e strutto, ripieni di formaggio, fritti e ricoperti di miele subito dopo la fruttura, sono da comsumare ancora caldi";
        $dish->price = 8;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/spaghetti.jpg';
        $dish->save(); */

        /* RESTAURANT 6 DISHES */

        /* $dish = new Dish;
        $dish->restaurant_id = 6;
        $dish->name = "Crudi di pesce";
        $dish->description = "Cruditè di pesce di prima Qualità";
        $dish->price = 18;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/crudomare.jpeg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 6;
        $dish->name = "Risotto alla Pescatora";
        $dish->description = "Risotto ai frutti di mare con battuta di gambero rosso di Mazzara";
        $dish->price = 14;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/pescatora.jpg';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 6;
        $dish->name = "Pizza con le acciughe";
        $dish->description = "Pizza con pomodoro, mozzarella, basilico, olio, origano e acciughe";
        $dish->price = 7;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/margherita.avif';
        $dish->save();
        
        $dish = new Dish;
        $dish->restaurant_id = 6;
        $dish->name = "SanPietro al forno";
        $dish->description = "Pesce SanPietro di varie pezzature con contorno a scelta";
        $dish->price = 28;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/sanpietro.webp';
        $dish->save();

        $dish = new Dish;
        $dish->restaurant_id = 6;
        $dish->name = "Panna cotta";
        $dish->description = "Panna cotta fatta in casa con topping a scelta";
        $dish->price = 5;
        $dish->availability = true;
        $dish->slug = Str::slug($dish->name);
        $dish->image = 'img/dishes/pannacotta.avif';
        $dish->save(); */
    }
}
