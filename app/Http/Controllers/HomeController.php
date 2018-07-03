<?php

namespace App\Http\Controllers;

use App\Film;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view('home', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();

        $types = Type::all();
        $films = Film::all();

        return view('edit_profile', compact('user', 'types', 'films'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = auth()->user();

        $user->fill($request->all());
        $user->favoriteType()->associate($request->get('favorite_type_id'));
        $user->favoriteFilm()->associate($request->get('favorite_film_id'));
        $user->save();

        return redirect()->back()->with('message', 'Pomyślnie zaktualizowano profil.');
    }
}
