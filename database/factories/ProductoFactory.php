<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nom_producto' => $this->faker->words(2, true), // dos palabras concatenadas
            'precio' => $this->faker->randomFloat(2, 10, 500),
            'desc_producto' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
