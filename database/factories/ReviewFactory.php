<?php

use App\Film;
use App\Review;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'content' => $faker->realText(),
        'is_verified' => $faker->boolean,
        'author_id' => User::inRandomOrder()->first()->id,
        'film_id' => Film::inRandomOrder()->first()->id
    ];
});
