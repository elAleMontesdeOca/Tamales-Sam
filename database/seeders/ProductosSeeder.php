<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    public function run(): void
    {
        Producto::insert([
            ['nom_producto' => 'Tamal Verde', 'precio' => 20, 'desc_producto' => 'Tamal con chile verde y pollo','created_at' => now(), 'updated_at' => now()],
            ['nom_producto' => 'Tamal Rojo', 'precio' => 22, 'desc_producto' => 'Tamal con mole rojo y pollo','created_at' => now(), 'updated_at' => now()],
            ['nom_producto' => 'Champurrado', 'precio' => 18, 'desc_producto' => 'Tamal champurrado','created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
