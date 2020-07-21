<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Classroom,Branch,User,Level,Schedule};
use Faker\Generator as Faker;

$factory->define(Classroom::class, function (Faker $faker) {
    return [
        'branch_id' =>Branch::inRandomOrder()->first()->id,
        'teacher_id' =>User::inRandomOrder()->first()->id,
        'teaching_assitant_id' =>User::inRandomOrder()->first()->id,
        'level_id' =>Level::inRandomOrder()->first()->id,
        'schedule_id' =>Schedule::inRandomOrder()->first()->id,
        'class_name' =>$faker->name,
        'code' =>'ph07004',
    ];
});
