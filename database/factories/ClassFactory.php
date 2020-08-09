<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Classes,User,Level,Course};
use Faker\Generator as Faker;

$factory->define(Classes::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'teacher_id' =>User::inRandomOrder()->first()->id,
        'level_id' =>Level::inRandomOrder()->first()->id,
        'user_id' =>User::inRandomOrder()->first()->id,
        'course_id' =>Course::inRandomOrder()->first()->id,
        'is_active' => 1,
    ];
});
