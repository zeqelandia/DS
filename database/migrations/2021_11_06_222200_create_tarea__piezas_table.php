<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareaPiezasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea__piezas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tarea')->references('id')->on('tareas')->onDelete('cascade');
            $table->foreignId('id_pieza')->references('id')->on('piezas');
            $table->integer('cantidad')->unsigned();
            $table->float('precio');
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
        Schema::dropIfExists('tarea__piezas');
    }
}
