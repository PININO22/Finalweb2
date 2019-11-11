<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscuelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escuelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            

            $table->string('Nombre',100);
            $table->string('Email',100);
            $table->integer('CUE');
            $table->boolean('EsBilingue');
            $table->integer('CantidadAlumos');
            $table->string('Telefono',50);
            $table->string('TelefonoInterno',50);
            $table->string('Orientacion',50);
            $table->string('Dirección',100);
            
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
        Schema::dropIfExists('escuelas');
    }
}
