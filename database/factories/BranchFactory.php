<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Branch,User};
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'director_id' =>User::inRandomOrder()->first()->id,
        'teaching_assitant_id' =>User::inRandomOrder()->first()->id,
        'address' =>$faker->name,
        'branch_name'=>$faker->name,

    ];
});
