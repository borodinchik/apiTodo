<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'body' => $faker->paragraph,
    ];
});
