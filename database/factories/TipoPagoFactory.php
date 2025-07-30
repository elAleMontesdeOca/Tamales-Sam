<?php

namespace Database\Factories;

use App\Models\TipoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoPagoFactory extends Factory
{
    protected $model = TipoPago::class;

    public function definition()
    {
        return [
            'tipo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta', 'transferencia', 'paypal']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
