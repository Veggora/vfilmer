<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::latest()->paginate(20);

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = new Type();

        return view('types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TypeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        Type::create($request->all());

        return redirect()->back()->with('message', 'Pomyślnie dodano gatunek filmowy.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TypeRequest $request
     * @param  \App\Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, Type $type)
    {
        $type->update($request->all());

        return redirect()->back()->with('message', 'Pomyślnie zaktualizowano gatunek filmowy.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type $type
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('types.index')->with('message', 'Pomyślnie usunięto gatunek filmowy.');
    }
}
