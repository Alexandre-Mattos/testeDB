<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'       => $this->faker->name(),
            'email'      => $this->faker->unique()->safeEmail(),
            'empresa_id' => $this->faker->numberBetween(1, 5),
            'cpf'        => mt_rand(1, 2222) . mt_rand(1, 2222), // password
        ];
    }
}
