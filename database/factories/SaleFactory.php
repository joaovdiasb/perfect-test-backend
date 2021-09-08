<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Client, Product, SaleSituation, Sale};
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'dh_sold'           => now()->addDays(rand(0, 365))->addHours(rand(0, 26)),
        'quantity'          => rand(1, 500),
        'discount'          => rand(1, 100),
        'sale_situation_id' => SaleSituation::all()->random()->id,
        'product_id'        => Product::all()->random()->id,
        'client_id'         => Client::all()->random()->id
    ];
});
