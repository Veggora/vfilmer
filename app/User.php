<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'role', 'is_banned'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['reviews', 'films', 'favoriteType', 'favoriteFilm'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'author_id');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_user', 'user_id', 'film_id');
    }

    public function favoriteType()
    {
        return $this->belongsTo(Type::class, 'favorite_type_id');
    }

    public function favoriteFilm()
    {
        return $this->belongsTo(Film::class, 'favorite_film_id');
    }
}
