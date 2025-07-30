<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nom_cliente' => $this->faker->firstName(),
            'app_cliente' => $this->faker->lastName(),
            'apm_cliente' => $this->faker->lastName(),
            'tel_cliente' => $this->faker->numerify('##########'), // número de 10 dígitos
            'correo' => $this->faker->unique()->safeEmail(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
