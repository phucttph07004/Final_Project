<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Branch,User};
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'director_id' =>User::inRandomOrder()->first()->id,
        'status'=>$faker->numberBetween($min = 1, $max = 2),
        'address' =>$faker->name,
        'avatar' =>$faker->name,
        'branch_name'=>$faker->name,

    ];
});
