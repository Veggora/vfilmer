@extends('layouts.app')

@section('content')
    <h1>Dodaj aktora</h1>

    <hr>

    <form action="{{route('actors.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="first_name">Imię:</label>
            <input type="text" class="form-control" name="first_name" id="first_name"/>
        </div>

        <div class="form-group">
            <label for="last_name">Nazwisko:</label>
            <input type="text" class="form-control" name="last_name" id="last_name"/>
        </div>

        <div class="form-group">
            <label for="age">Wiek</label>
            <input type="number" class="form-control" name="age" id="age"/>
        </div>

        <div class="form-group d-flex justify-content-around">
            <p class="text-center">
                <button class="btn btn-primary btn-lg" type="submit">Zapisz</button>
            </p>
            <p class="text-center">
                <a href="{{route('actors.index')}}" class="btn btn-secondary btn-lg">Wróć</a>
            </p>
        </div>
    </form>
@endsection
