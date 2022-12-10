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
            'cliente_id'     => $this->faker->numberBetween(1, 200),
            'descricao'      => $this->faker->sentence(),
            'cidade_id'      => $this->faker->numberBetween(1, 5),
            'tipo_imovel_id' => $this->faker->numberBetween(1, 4),
            'status'         => $this->faker->randomElement(['Ativo', 'Locado', 'Vendido']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Imovel $imovel) {

            $imovel->proprietario()->create([
                'cliente_id' => $this->faker->numberBetween(1, 15),
                'imovel_id'  => $imovel->id,
            ]);

        });
    }

}
