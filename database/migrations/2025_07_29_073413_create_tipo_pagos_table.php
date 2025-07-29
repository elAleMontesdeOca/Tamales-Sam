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
        Schema::create('tipo_pagos', function (Blueprint $table) {
            $table->id('id_tipoPago');
            $table->string('tipo_pago', 20); // Ej: 'efectivo', 'tarjeta'
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_pagos');
    }
};
