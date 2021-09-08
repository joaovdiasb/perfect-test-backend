<?php

use Illuminate\Database\Seeder;
use Database\Seeders\{SaleSituationSeeder};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SaleSituationSeeder::class);
    }
}
