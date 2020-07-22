<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Archivement,Classroom,Student};
use Faker\Generator as Faker;

$factory->define(Archivement::class, function (Faker $faker) {
    return [
        'medium_score' =>$faker->numberBetween($min = 0, $max = 10),
        'session'=>$faker->numberBetween($min = 1, $max = 20),
        'class_id' =>Classroom::inRandomOrder()->first()->id,
        'student_id' =>Student::inRandomOrder()->first()->id,
    ];
});
