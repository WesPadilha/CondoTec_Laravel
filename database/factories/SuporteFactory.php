<?php

namespace Database\Factories;

use App\Models\Suporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuporteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Suporte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'categoria' => $this->faker->word,
            'informacao' => $this->faker->sentence,
            'descricao' => $this->faker->paragraph,
            'carater' => $this->faker->randomElement(['normal', 'urgente']),
            'protocolo' => uniqid(),
        ];
    }
}
