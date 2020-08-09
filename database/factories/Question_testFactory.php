<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Question_test;
use App\Models\{Level,User};
use Faker\Generator as Faker;

$factory->define(Question_test::class, function (Faker $faker) {
    return [
        'question' => $faker->realText($maxNbChars = 200, $indexSize = 1),
        'answer' =>json_encode(["A" => "realTextA ","B" => "realTextB ","C" => "realTextC ","D" => "realTextD "] ),
        'correct_answer' => $faker->randomElement($array = array ('A','B','C','D')),
        'level_id' => Level::inRandomOrder()->first()->id,
        'status' => 1,
        'user_id' =>User::inRandomOrder()->first()->id,
    ];
});


// 'reciever_id'=>'{
//     id:1,
//     result:[
//         {
//             1:"a"
//         },
//         {
//             2:"b"
//         }
//     },
//     id:2,
//     result:[
//         {
//             1:"a"
//         },
//         {
//             2:"b"
//         }
//     }
//     }',
