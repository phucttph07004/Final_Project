<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Register,Branch};
use Faker\Generator as Faker;

$factory->define(Register::class, function (Faker $faker) {
    return [
        // 'branch_id' =>Branch::inRandomOrder()->first()->id,
        'fullname' => $faker->name,
        'date_of_birth' => $faker->date(),
        'phone' =>'0123456789',
        'address' => "hà nội",
        'is_active' => 0,
        'note' =>$faker->realText($maxNbChars = 200, $indexSize = 3),
        'email' => $faker->unique()->safeEmail,
    ];
});
