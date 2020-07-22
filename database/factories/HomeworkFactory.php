<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\{Homework,Classroom,Student};
use App\Model;
use Faker\Generator as Faker;

$factory->define(Homework::class, function (Faker $faker) {
    return [
        'content' =>$faker->realText($maxNbChars = 200, $indexSize = 5),
        'public' =>$faker->randomElement($array = array ('yes','no')),
        'class_id' =>Classroom::inRandomOrder()->first()->id,
        'student_id' =>Student::inRandomOrder()->first()->id,
        'title' =>$faker->name,
        'deadline'=>$faker->date(),
    ];
});
