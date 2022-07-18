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
        Schema::create('Ls',function(Blueprint $table){
            $table->id();
            $table->integer('Vertice_Inicial');
            $table->integer('Num_Iteraciones');
            $table->integer('Num_Vecinas');
            $table->bigInteger('Tiempo_Lim');
            $table->string('Tipo_Improv');
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
        Schema::dropIfExists('Ls');
    }
};
