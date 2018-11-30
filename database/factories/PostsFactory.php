<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'teaser' => $faker->name,
        'content' => $faker->paragraph,
        'created' => $faker->date,
    ];
});
