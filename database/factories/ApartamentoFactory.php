<?php

namespace Database\Factories;

use App\Models\Apartamento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'numero_apartamento' => $this->faker->unique()->randomNumber(3),
        ];
    }
}
