<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    protected $model = Cidade::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->unique()->randomElement(['Araranguá', 'Sombrio', 'Criciúma', 'Tubarão', 'Florianópolis', 'Palhoça', 'São José', 'Balneário Camboriu', 'Itapema', 'Laguna']),
            'uf'   => 'SC',
        ];
    }
}
