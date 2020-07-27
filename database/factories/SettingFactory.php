<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'logo' =>$faker->imageUrl(200, 200, 'cats'),
        'email' => $faker->unique()->safeEmail,
        'phone' =>'0123456789',
        'slogan' =>$faker->realText($maxNbChars = 50, $indexSize = 1),
    ];
});
