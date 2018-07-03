<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Http\Requests\ActorRequest;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::latest()->paginate(20);

        return view('actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actor = new Actor();

        return view('actors.create', compact('actor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ActorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActorRequest $request)
    {
        Actor::create($request->all());

        return redirect()->back()->with('message', 'Pomyślnie dodano aktora.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ActorRequest $request
     * @param  \App\Actor $actor
     * @return \Illuminate\Http\Response
     */
    public function update(ActorRequest $request, Actor $actor)
    {
        $actor->update($request->all());

        return redirect()->back()->with('message', 'Pomyślnie zaktualizowano aktora.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor $actor
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();

        return redirect()->route('actors.index')->with('message', 'Pomyślnie usunięto aktora.');
    }
}
