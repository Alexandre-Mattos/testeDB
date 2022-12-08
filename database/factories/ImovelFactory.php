<?php

namespace Database\Factories;

use App\Models\Imovel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelFactory extends Factory
{
    protected $model = Imovel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'           => $this->faker->name(),
            'empresa_id'     => $this->faker->numberBetween(1, 5),
            'descricao'      => $this->faker->randomLetter(),
            'cidade_id'      => $this->faker->numberBetween(1, 5),
            'tipo_imovel_id' => $this->faker->numberBetween(1, 4),
            'status'         => 'Ativo',
        ];
    }

}
