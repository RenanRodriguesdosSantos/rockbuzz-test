<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text(1000),
        'published' => $faker->boolean(),
        'author_id' => \App\User::all('id')->pluck('id')->random()
    ];
});

