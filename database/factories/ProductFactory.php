<?php

/** @var Factory $factory */

use App\Models\Admin;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->firstName,
        'description' => $faker->name,
        'price' => 23,
        'quantity' => 1,
        'condition' => 'New',
        'brand' => 'Nike',
        'vendor_id' => 1,
    ];
});
