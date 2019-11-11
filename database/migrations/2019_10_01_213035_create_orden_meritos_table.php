<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenMeritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenMeritos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('incumbencia',100);
            $table->string('nivel',50);
            $table->integer('Año');
            $table->string('Cargo',50);
            $table->string('sexo',20);
            $table->string('CUIL',50);
            $table->string('Apellido',100);
            $table->string('Nombre',100);
            $table->string('Titulo',200);
            $table->string('CategoriaTitulo',25);
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
        Schema::dropIfExists('ordenMeritos');
    }
}
