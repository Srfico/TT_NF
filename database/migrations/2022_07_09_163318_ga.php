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
        Schema::create('Ga',function(blueprint $table){
            $table->id();
            $table->integer('Vertice_Inicial');
            $table->integer('Num_Iteraciones');
            $table->integer('Num_IterMax_WMejora');
            $table->integer('Num_Individuos');
            $table->string('Cruce');
            $table->string('Mutacion');
            $table->float('Prob_Mutacion');
            $table->float('Fitness_Opt');
            $table->float('Tiempo_Lim');
            $table->integer('Elites');
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
        Schema::dropIfExists('Ga');
    }
};
