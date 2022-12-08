<?php

namespace Database\Factories;

use App\Models\Conta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContaFactory extends Factory
{
    protected $model = Conta::class;

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
            'empresa_id'      => $this->faker->randomNumber(1, 5),
            'locacao_id'      => $this->faker->randomNumber(1, 5),
            'valor'           => mt_rand(1, 2222),
            'status'          => 'em_aberto',
            'data_vencimento' => Carbon::parse($data)->addMonth($duracao),
        ];
    }
}
