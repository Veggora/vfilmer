<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $guarded = [];

    public function films()
    {
        return $this->belongsToMany(Film::class, 'actor_film', 'actor_id', 'film_id');
    }
}
