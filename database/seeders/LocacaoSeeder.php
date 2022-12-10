<?php

namespace Database\Seeders;

use App\Models\Locacao;
use Illuminate\Database\Seeder;

class LocacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Locacao::factory()
            ->hasImovel(1, [
                'status' => 'Locado',
            ])
            ->hasContas(rand(1, 12))
            ->count(50)
            ->create();
    }
}
