<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaHora')->nullable();
            $table->enum('estado', ['no realizado', 'completada'])->default('no realizado');
            $table->float('precio');

            $table->foreignId('id_ordenTrabajo')->references('id')->on('orden_trabajos')->onDelete('cascade');
            $table->foreignId('id_accion')->references('id')->on('accions');
            $table->string('id_nickname')->references('nickname')->on('users')->nullable();

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
        Schema::dropIfExists('tareas');
    }
}
