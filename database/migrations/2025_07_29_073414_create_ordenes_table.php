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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id('id_orden');
            $table->dateTime('fecha_orden');
            $table->enum('estado_orden', ['pendiente', 'preparando', 'entregado']);

            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_mesa');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_tipoPago');

            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('id_mesa')->references('id_mesa')->on('mesas');
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->foreign('id_tipoPago')->references('id_tipoPago')->on('tipo_pagos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes'); // ✅ también corrige aquí
    }
};
