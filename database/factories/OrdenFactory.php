<?php

namespace Database\Factories;

use App\Models\Orden;
use App\Models\Cliente;
use App\Models\Mesa;
use App\Models\Producto;
use App\Models\TipoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenFactory extends Factory
{
    protected $model = Orden::class;

    public function definition()
    {
        return [
            'fecha_orden' => $this->faker->dateTimeThisYear(),
            'estado_orden' => $this->faker->randomElement(['pendiente', 'preparando', 'entregado']),
            'id_cliente' => Cliente::factory(),
            'id_mesa' => Mesa::factory(),
            'id_producto' => Producto::factory(),
            'id_tipoPago' => TipoPago::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
