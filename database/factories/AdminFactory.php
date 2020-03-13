<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => 'password1234',
        'role' => 1,
    ];
});
