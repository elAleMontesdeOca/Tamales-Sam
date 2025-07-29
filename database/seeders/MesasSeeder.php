<?php

namespace Database\Seeders;

use App\Models\Mesa;
use Illuminate\Database\Seeder;

class MesasSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Mesa::create([
                'num_mesa' => $i,
                'cap_mesa' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

