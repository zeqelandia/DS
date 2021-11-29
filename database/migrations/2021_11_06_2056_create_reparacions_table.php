<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparacions', function (Blueprint $table) {
            $table->id();
            $table->date('fechaDeEntrada');
            $table->text('motivo');
            $table->mediumInteger('kilometraje')->unsigned();
            $table->date('fechaDeSalida')->nullable();
            $table->enum('estado', ['diagnostico', 'en proceso','completado','en carga'])->default('diagnostico');

            $table->string('dniCliente')->references('dni')->on('clientes');
            $table->string('patente')->references('patente')->on('vehiculos');
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
        Schema::dropIfExists('reparacions');
    }
}
