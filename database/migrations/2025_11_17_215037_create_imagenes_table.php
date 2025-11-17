<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('ruta_imagen');
            $table->string('tipo')->default('producto'); // los tipos pueden ser: producto, distribuidor, otro
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_distribuidor')->nullable();
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_distribuidor')->references('id')->on('distribuidores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
