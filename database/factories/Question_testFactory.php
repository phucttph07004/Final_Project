<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Question_test;
use App\Models\Level;
use Faker\Generator as Faker;

$factory->define(Question_test::class, function (Faker $faker) {
    return [
        'question' => $faker->realText($maxNbChars = 200, $indexSize = 1),
        'answer' =>json_encode(["A" => "realTextA ","B" => "realTextB ","C" => "realTextC ","D" => "realTextD "] ),
        'correct_answer' => $faker->randomElement($array = array ('A','B','C','D')),
        'level_id' => Level::inRandomOrder()->first()->id,
    ];
});
