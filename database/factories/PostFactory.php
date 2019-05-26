<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'title' => $faker->sentence,
        'cat_id' => $faker->numberBetween($min = 1, $max = 3),
        'content' => $faker->paragraph,
        'comment_count' => 3
    ];
});
