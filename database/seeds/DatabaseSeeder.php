<?php

use App\Models\{Client, Product, Sale};
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

        factory(Client::class, 20)->create();
        factory(Product::class, 20)->create();
        factory(Sale::class, 20)->create();
    }
}
