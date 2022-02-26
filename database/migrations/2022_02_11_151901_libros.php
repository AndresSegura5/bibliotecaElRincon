<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('libros', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('nombre');
            $table->string('categoria_id');
            $table->string('ISBN');
            $table->string('autor');
            $table->string('editorial');
            $table->string('archivo')->nullable();
            $table->string('disponible')->default("si");
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
        Schema::dropIfExists('libros');
    }
}
