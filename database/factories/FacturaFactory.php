<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Orden;
use App\Models\TipoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
            'fecha_factura' => $this->faker->dateTimeThisYear(),
            'total' => $this->faker->numberBetween(100, 1000), // es integer en DB
            'id_cliente' => Cliente::factory(),
            'id_orden' => Orden::factory(),
            'id_tipoPago' => TipoPago::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
