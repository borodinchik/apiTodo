<?php

use Faker\Generator as Faker;

use App\Task;
use App\Comment;
use App\User;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function()
        {
            return User::all()->random();
        },
        'task_id' => function()
        {
            return Task::all()->random();
        },
    ];
});
