<?php

namespace Database\Seeders;

use App\Models\FederalEntity;
use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            FederalEntitySeeder::class,
            MunicipalitySeeder::class,
            SettlementTypeSeeder::class,
            SettlementSeeder::class,
            PostalCodeSeeder::class,
        ]);
    }
}
