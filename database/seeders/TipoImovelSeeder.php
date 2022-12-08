<?php

namespace Database\Seeders;

use App\Models\TipoImovel;
use Illuminate\Database\Seeder;

class TipoImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoImovel::factory()
            ->count(4)
            ->create();
    }
}
