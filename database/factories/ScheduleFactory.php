<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Classroom,User,Level,Schedule};
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'teacher_id' =>User::inRandomOrder()->first()->id,
        'level_id' =>Level::inRandomOrder()->first()->id,
        'time' =>$faker->date(),
    ];
});
