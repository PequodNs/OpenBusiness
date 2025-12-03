<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('ventas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_usuario')->nullable(); // quién hizo la venta
        $table->date('fecha');
        $table->decimal('total', 12, 2)->default(0);
        $table->timestamps();

        $table->foreign('id_usuario')->references('id')->on('users')->nullOnDelete();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
