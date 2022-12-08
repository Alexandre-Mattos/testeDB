<?php

namespace Database\Factories;

use App\Models\Locacao;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocacaoFactory extends Factory
{
    protected $model = Locacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data    = $this->faker->date();
        $duracao = rand(1, 12);
        return [
            'imovel_id'      => $this->faker->numberBetween(1, 15),
            'empresa_id'     => $this->faker->numberBetween(1, 5),
            'inicio_periodo' => $data,
            'fim_periodo'    => Carbon::parse($data)->addMonth($duracao),
            'duracao'        => $duracao,
            'status'         => 'Ativa', // password
            'valor'          => mt_rand(1, 10000),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Locacao $locacao) {
            $locacao->proprietarios()->create([
                'cliente_id' => $this->faker->numberBetween(1, 15),
                'empresa_id' => $locacao->empresa_id,
                'locacao_id' => $locacao->id,
            ]);
            $locacao->inquilinos()->create([
                'cliente_id' => $this->faker->numberBetween(1, 15),
                'empresa_id' => $locacao->empresa_id,
                'locacao_id' => $locacao->id,
            ]);

        });
    }
}
