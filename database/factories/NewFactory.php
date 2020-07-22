<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{News,User};
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->realText($maxNbChars = 300, $indexSize = 3),
        'type' => $faker->randomElement($array = array ('about','new')),
        'image' =>$faker->imageUrl(200, 200, 'cats'),
        'video' =>$faker->imageUrl(200, 200, 'cats'),
        'user_id' =>User::inRandomOrder()->first()->id,
    ];
});