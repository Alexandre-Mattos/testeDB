<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EmpresaSeeder::class,
            UserSeeder::class,
            ClienteSeeder::class,
            CidadeSeeder::class,
            TipoImovelSeeder::class,
            ImovelSeeder::class,
            LocacaoSeeder::class,
            VendaSeeder::class,
        ]);
    }
}
