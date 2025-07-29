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
    Schema::create('clientes', function (Blueprint $table) {
        $table->id('id_cliente');
        $table->string('nom_cliente', 15);
        $table->string('app_cliente', 15);
        $table->string('apm_cliente', 15);
        $table->bigInteger('tel_cliente');
        $table->text('correo');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
