<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_type', function (Blueprint $table) {
            //creo una colonna restaurant_id che prende come riferimento l'id della tabella restaurants
            $table->id();

            $table->foreignId("restaurant_id")->constrained()->onDelete("cascade");

            //creo una colonna type_id che prende come riferimento l'id della tabella types
            $table->foreignId("type_id")->constrained()->onDelete("cascade");
            $table->timestamps();
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
