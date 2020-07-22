<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Attendance,User,Student};
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'is_active' =>$faker->numberBetween($min = 0, $max = 1),
        'user_id' =>User::inRandomOrder()->first()->id,
        'student_id' =>Student::inRandomOrder()->first()->id,
    ];
});
