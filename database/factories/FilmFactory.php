<?php

use App\Film;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word)." ".ucfirst($faker->word),
        'director' => $faker->firstName." ".$faker->lastName,
        'description' => $faker->realText(),
        'length' => $faker->randomElement(range(50,250)),
        'premiere_date' => $faker->year,
    ];
});
