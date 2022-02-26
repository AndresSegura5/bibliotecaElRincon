<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prestamos', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_libro');
            $table->unsignedBigInteger('id_usuario');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion_1');
            $table->date('fecha_devolucion_2')->nullable();
            $table->string('estado');
            $table->integer('diasDeRetraso')->default(0);
            $table->integer('estaLibre')->default(1);
            $table->date('fechaLibre')->nullable();
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
        //
        Schema::dropIfExists('prestamos');
    }
}
