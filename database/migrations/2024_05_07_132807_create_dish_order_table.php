<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_order', function (Blueprint $table) {
            //creo una colonna dish_id che prende come riferimento l'id della tabella dishes
            $table->foreignId("dish_id")->constrained()->onDelete("cascade");

            //creo una colonna order_id che prende come riferimento l'id della tabella order
            $table->foreignId("order_id")->constrained()->onDelete("cascade");

            // creo la colonna quantità
            $table->smallInteger('quantity')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_order');
    }
};
