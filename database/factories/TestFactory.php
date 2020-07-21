<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Test,Question_test};
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' =>'0123456789',
        'code' => "ph07004",
        'question_test_id' => Question_test::inRandomOrder()->first()->id,
    ];
});
