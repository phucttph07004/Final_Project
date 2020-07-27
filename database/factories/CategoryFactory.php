<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Category,User};
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'User_id' =>User::inRandomOrder()->first()->id,
    ];
});
