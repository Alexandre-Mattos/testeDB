<?php

namespace Database\Factories;

use App\Models\Venda;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendaFactory extends Factory
{
    protected $model = Venda::class;

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
            'imovel_id'   => $this->faker->randomNumber(1, 100),
            'cliente_id'  => $this->faker->randomNumber(1, 200),
            'valor'       => mt_rand(100000, 20000000),
            'data_compra' => Carbon::parse($data)->subMonth($duracao),
        ];
    }
}
