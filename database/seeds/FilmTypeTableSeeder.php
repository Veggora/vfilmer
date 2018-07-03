<?php

use App\Film;
use App\Type;
use Illuminate\Database\Seeder;

class FilmTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = Film::all();
        $types = Type::all();

        foreach ($films as $film) {
            $film->types()->sync($types->random(3)->pluck('id'));
        }
    }
}
