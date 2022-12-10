<?php

namespace Database\Factories;

use App\Models\TipoImovel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoImovelFactory extends Factory
{
    protected $model = TipoImovel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'empresa_id' => $this->faker->numberBetween(1, 5),
            'nome'       => $this->faker->unique()->randomElement(['Comercial', 'Residencial', 'Chácara', 'Depósito']),
        ];
    }
}
