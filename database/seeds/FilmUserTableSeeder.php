<?php

use App\Film;
use App\User;
use Illuminate\Database\Seeder;

class FilmUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = Film::all();
        $users = User::all();

        foreach ($users as $user) {
            $user->films()->sync($films->random(20)->pluck('id'));
        }
    }
}
