<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::insert([
            [
                'nom_cliente' => 'Ana',
                'app_cliente' => 'Martínez',
                'apm_cliente' => 'López',
                'tel_cliente' => 5551234567,
                'correo' => 'ana@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nom_cliente' => 'Luis',
                'app_cliente' => 'Ramírez',
                'apm_cliente' => 'Hernández',
                'tel_cliente' => 5559876543,
                'correo' => 'luis@example.com',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

