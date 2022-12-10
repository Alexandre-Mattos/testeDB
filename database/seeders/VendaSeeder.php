<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Venda::factory()
            ->hasImovel(1, [
                'status' => 'Vendido',
            ])
            ->count(50)
            ->create();
    }
}
