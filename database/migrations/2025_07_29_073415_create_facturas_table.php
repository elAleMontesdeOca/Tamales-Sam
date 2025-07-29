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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->dateTime('fecha_factura');
            $table->integer('total');

            // ✅ Primero declara las columnas
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_tipoPago');

            // ✅ Luego agrega las claves foráneas
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('id_orden')->references('id_orden')->on('ordenes')->onDelete('cascade');
            $table->foreign('id_tipoPago')->references('id_tipoPago')->on('tipo_pagos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
