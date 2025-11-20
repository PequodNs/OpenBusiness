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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_distribuidor');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega')->nullable();
            $table->string('estado')->default('pendiente'); //los estados seran: pendiente,recibido,cancelado
            $table->unsignedBigInteger('id_usuario')->nullable(); //para ver que usuario realizo la accion
            $table->timestamps();

            $table->foreign('id_distribuidor')->references('id')->on('distribuidores')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
