<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Lesson_content,Level};
use Faker\Generator as Faker;

$factory->define(Lesson_content::class, function (Faker $faker) {
    return [
        'content' =>$faker->realText($maxNbChars = 200, $indexSize = 5),
        'lesson' =>$faker->numberBetween($min = 1, $max = 20),
        'level_id' =>Level::inRandomOrder()->first()->id,
        'title' =>$faker->name,
    ];
});
