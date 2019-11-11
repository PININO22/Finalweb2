<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantaDOcenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlantaDocente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Curso',50);
            $table->integer('Horas');
            $table->string('Division',50);
            $table->integer('Codigo');
            $table->string('SituacionRevista',50);

            $table->integer('id_escuela');
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
        Schema::dropIfExists('PlantaDocente');
    }
}
