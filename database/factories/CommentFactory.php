<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'commenter' => $faker->name,
        'comment' => $faker->sentence,
    ];
});
