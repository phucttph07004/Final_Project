<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Writing_essay,Student,Level};
use Faker\Generator as Faker;

$factory->define(Writing_essay::class, function (Faker $faker) {
    return [
        'content' =>$faker->realText($maxNbChars = 200, $indexSize = 5),
        'score' =>$faker->numberBetween($min = 0, $max = 10),
        'level_id' =>Level::inRandomOrder()->first()->id,
        'student_id' =>Student::inRandomOrder()->first()->id,
        'title' =>$faker->name,
    ];
});
