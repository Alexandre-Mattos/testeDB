<?php

namespace Database\Seeders;

use App\Models\Imovel;
use Illuminate\Database\Seeder;

class ImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Imovel::factory()
            ->count(120)
            ->create();
    }
}
