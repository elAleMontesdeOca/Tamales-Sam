<?php

namespace Database\Factories;

use App\Models\Mesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MesaFactory extends Factory
{
    protected $model = Mesa::class;

    public function definition()
    {
        return [
            'num_mesa' => $this->faker->unique()->numberBetween(1, 50),
            'cap_mesa' => $this->faker->numberBetween(2, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
