<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Notification,Student,User};
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'title' =>$faker->name,
        'content' => $faker->realText($maxNbChars = 300, $indexSize = 5),
        'reciever'=>$faker->randomElement($array = array ('editor','teacher','teaching_asistant','general_manager','branch_manager','student')),
        'reciever_id'=>json_encode([0 ,1 ,2,3,4,5]),
        'user_id' =>User::inRandomOrder()->first()->id,
    ];
});
