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
        Schema::create('Sa',function(Blueprint $table){
            $table->id();
            $table->integer('Vertice_Inicial');
            $table->integer('Num_Iteraciones');
            $table->integer('Num_Vecinas');
            $table->float('Tiempo_Lim');
            $table->string('Tipo_Improv');
            $table->string('Enfriamiento');
            $table->float('Param_Geometrico');
            $table->float('Param_Lineal');
            $table->float('Lambda');
            $table->float('Sigma');
            $table->float('Gamma');
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
        schema::dropIfExists('Sa');
    }
};
