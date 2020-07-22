<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'level' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
