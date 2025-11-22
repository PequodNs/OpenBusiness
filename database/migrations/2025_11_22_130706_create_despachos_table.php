<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDespachosTable extends Migration
{
    public function up()
    {
        Schema::create('despachos', function (Blueprint $table) {
            $table->id(); // ID de despacho
            $table->string('numero')->unique(); // Número de despacho
            $table->date('fecha'); // Fecha de despacho
            $table->string('cliente'); // Cliente relacionado
            $table->string('estado')->default('activo'); // Estado del despacho
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('despachos');
    }
}