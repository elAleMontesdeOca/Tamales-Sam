<?php

namespace Database\Seeders;

use App\Models\TipoPago;
use Illuminate\Database\Seeder;

class TipoPagosSeeder extends Seeder
{
    public function run(): void
    {
        TipoPago::insert([
            ['tipo_pago' => 'efectivo', 'created_at' => now(), 'updated_at' => now()],
            ['tipo_pago' => 'tarjeta', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
