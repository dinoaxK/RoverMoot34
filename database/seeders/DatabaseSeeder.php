<?php

namespace Database\Seeders;

use App\Models\ScoutDistrict;
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
            CountrySeeder::class,
            TitleSeeder::class,
            DistrictSeeder::class,
            ScoutAwardSeeder::class,
            RoverAwardSeeder::class,
            WarrantSeeder::class,
            UserSeeder::class
        ]);
    }
}
