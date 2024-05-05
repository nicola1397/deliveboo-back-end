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
        Schema::create('restaurant_type', function (Blueprint $table) {
            //creo una colonna restaurant_id che prende come riferimento l'id della tabella restaurants
            $table->unsignedBigInteger("restaurant_id")->nullable();
            $table->foreign("restaurant_id")->references("id")->on("restaurants");

            //creo una colonna type_id che prende come riferimento l'id della tabella types
            $table->unsignedBigInteger("type_id")->nullable();
            $table->foreign("type_id")->references("id")->on("types");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_type');
    }
};
