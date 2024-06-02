<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Apartamento;
use App\Models\Suporte;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Cria um usuário específico
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'numero_apartamento' => '123', // Número de apartamento específico para o usuário
        ]);

        // Cria um apartamento associado ao usuário
        Apartamento::factory()->create([
            'user_id' => $user->id,
            'numero_apartamento' => $user->numero_apartamento,
        ]);

        // Cria um suporte para o usuário
        Suporte::factory()->create([
            'user_id' => $user->id,
            'categoria' => 'Categoria de Teste',
            'informacao' => 'Informação de Teste',
            'descricao' => 'Descrição de Teste',
            'carater' => 'Caráter de Teste',
            'protocolo' => uniqid(),
        ]);
    }
}
