<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Apartamento;

class UpdateUserApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function ($user) {
            if ($user->apartamento) {
                $user->numero_apartamento = $user->apartamento->numero_apartamento;
                $user->save();
            }
        });
    }
}