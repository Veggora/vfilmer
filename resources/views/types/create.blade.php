@extends('layouts.app')

@section('content')
    <h1>Dodaj gatunek filmowy</h1>

    <hr>

    <form action="{{route('types.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nazwa:</label>
            <input type="text" class="form-control" name="name" id="name"/>
        </div>

        <div class="form-group d-flex justify-content-around">
            <p class="text-center">
                <button class="btn btn-primary btn-lg" type="submit">Zapisz</button>
            </p>
            <p class="text-center">
                <a href="{{route('types.index')}}" class="btn btn-secondary btn-lg">Wróć</a>
            </p>
        </div>
    </form>
@endsection
