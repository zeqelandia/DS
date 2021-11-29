<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['pendiente', 'en proceso','completado','en carga'])->default('pendiente');
            $table->float('porcentajeAvance')->default(0.0);
            $table->integer('horasTotales')->default(0);
          
            $table->foreignId('id_reparacion')->references('id')->on('reparacions')->onDelete('cascade');;
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
        Schema::dropIfExists('orden_trabajos');
    }
}
