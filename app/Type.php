<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function usersWhoLiked()
    {
        return $this->hasMany(User::class, 'favorite_type_id');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_type', 'type_id', 'film_id');
    }
}
