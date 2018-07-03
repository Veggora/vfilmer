<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypesTableSeeder::class);
        $this->call(ActorsTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(FilmTypeTableSeeder::class);
        $this->call(FilmUserTableSeeder::class);
        $this->call(ActorFilmTableSeeder::class);
    }
}
