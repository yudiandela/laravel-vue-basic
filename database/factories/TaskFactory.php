<?php

use Faker\Generator as Faker;

$prior = ['high', 'medium', 'low'];

$factory->define(App\Task::class, function (Faker $faker) use ($prior) {
    return [
        'name' => $faker->sentence,
        'prior' => $prior[mt_rand(0, count($prior) - 1)],
        'user_id' => 1
    ];
});
