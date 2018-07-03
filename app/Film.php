<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $guarded = [];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actor_film', 'film_id', 'actor_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'film_type', 'film_id', 'type_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'film_user', 'film_id', 'user_id');
    }

    public function usersWhoLiked()
    {
        return $this->hasMany(User::class, 'favorite_film_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function verifiedReviews()
    {
        return $this->hasMany(Review::class)->where('is_verified', true)->latest();
    }
}
