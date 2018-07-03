<?php

use App\Film;
use App\Type;
use App\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName . $faker->randomNumber(3),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('asdasd'), // secret
        'remember_token' => str_random(10),
        'role' => 'ROLE_USER',
        'is_banned' => $faker->boolean(10),
        'favorite_type_id' => Type::inRandomOrder()->first()->id,
        'favorite_film_id' => Film::inRandomOrder()->first()->id,
    ];
});
