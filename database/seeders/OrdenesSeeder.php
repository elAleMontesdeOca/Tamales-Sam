<?php

namespace Database\Seeders;

use App\Models\Orden;
use Illuminate\Database\Seeder;

class OrdenesSeeder extends Seeder
{
    public function run(): void
    {
        Orden::insert([
            [
                'fecha_orden' => now(), 
                'estado_orden' => 'pendiente',
                'id_cliente' => 1,
                'id_mesa' => 1,
                'id_producto' => 1,
                'id_tipoPago' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_orden' => now()->subHour(),
                'estado_orden' => 'entregado',
                'id_cliente' => 2,
                'id_mesa' => 2,
                'id_producto' => 2,
                'id_tipoPago' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
