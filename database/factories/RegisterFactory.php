<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Register;
use Faker\Generator as Faker;

$factory->define(Register::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'date_of_birth' => $faker->date(),
        'phone' =>'0123456789',
        'address' => "hà nội",
        'is_active' => 0,
        'email' => $faker->unique()->safeEmail,
    ];
});