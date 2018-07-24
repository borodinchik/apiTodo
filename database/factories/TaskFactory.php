<?php

use Faker\Generator as Faker;

use App\Task;
use App\User;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'body' => $faker->paragraph,
        'user_id' => function()
        {
            return User::all()->random();
        },
        'status_id' => 0
    ];
});
