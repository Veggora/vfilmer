<?php

use App\Actor;
use App\Film;
use Illuminate\Database\Seeder;

class ActorFilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = Film::all();
        $actors = Actor::all();

        foreach ($films as $film) {
            $film->actors()->sync($actors->random(15)->pluck('id'));
        }
    }
}
