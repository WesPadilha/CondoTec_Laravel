<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apartamento;

class ApartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Apartamento::create([
            'numero_apartamento' => '101',
            'user_id' => 1,
        ]);
    }
}
