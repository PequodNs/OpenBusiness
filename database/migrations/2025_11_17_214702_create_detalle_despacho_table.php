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
        Schema::create('detalle_despacho', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad_recibida');
            $table->timestamps();

            $table->foreign('id_orden')->references('id')->on('orden_despacho')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_despacho');
    }
};
