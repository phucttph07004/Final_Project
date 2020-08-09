<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Enrollment,Level};

use Faker\Generator as Faker;

$factory->define(Enrollment::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'date_of_birth' => $faker->date(),
        'phone' =>'0123456789',
        'address' => "hà nội",
        'status' => 1,
        'weekday' => $faker->dayOfWeek(),
        'note' =>$faker->realText($maxNbChars = 200, $indexSize = 3),
        'level_id' => Level::inRandomOrder()->first()->id,
        'email' => $faker->unique()->safeEmail,
    ];
});
