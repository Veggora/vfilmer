<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Film;
use App\Http\Requests\FilmRequest;
use App\Type;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::latest()->paginate(20);

        return view('films.index', compact('films'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $films = Film::paginate(20);
        $title = 'Lista filmów';

        return view('films.list', compact('films', 'title'));
    }

    public function myList()
    {
        $films = auth()->user()->films()->paginate(20);
        $title = 'Moje filmy';

        return view('films.index', compact('films', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $film = new Film();

        $actors = Actor::all();
        $types = Type::all();

        return view('films.create', compact('film', 'actors', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FilmRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $film = Film::create($request->only(['name', 'description', 'premiere_date', 'length', 'director']));

        $film->actors()->sync($request->get('actors'));
        $film->types()->sync($request->get('types'));

        return redirect()->back()->with('message', 'Pomyślnie utworzono film.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $actors = Actor::all();
        $types = Type::all();

        return view('films.edit', compact('film', 'actors', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FilmRequest $request
     * @param  \App\Film $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
    {
        $film->update($request->only(['name', 'description', 'premiere_date', 'length', 'director']));

        $film->actors()->sync($request->get('actors'));
        $film->types()->sync($request->get('types'));

        return redirect()->back()->with('message', 'Pomyślnie zaktualizowano film.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film $film
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index')->with('message', 'Pomyślnie usunięto film.');
    }

    public function addToList(Film $film)
    {
        auth()->user()->films()->attach($film->id);

        return redirect()->back()->with('message', 'Film został pomyślnie dodany do Twojej listy.');
    }

    public function removeFromList(Film $film)
    {
        auth()->user()->films()->detach($film->id);

        return redirect()->back()->with('message', 'Film został pomyślnie usunięty z Twojej listy.');
    }
}
