<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{

    protected $model = Empresa::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'     => $this->faker->name(),
            'cpf_cnpj' => mt_rand(1, 2222) . mt_rand(1, 2222),
            'telefone' => Str::random(10),
            'tipo'     => $this->faker->randomElement(['LTDA', 'PF']),
        ];
    }
}
