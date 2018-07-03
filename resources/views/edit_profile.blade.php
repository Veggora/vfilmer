@extends('layouts.app')

@section('content')
    <h1>Edytuj profil</h1>
    <hr>
    <form action="{{route('update_profile')}}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">Imię:</label>
                <input type="text" class="form-control" name="first_name" id="first_name"
                       value="{{$user->first_name}}"/>
            </div>

            <div class="form-group col-md-6">
                <label for="last_name">Nazwisko:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}"/>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Adres e-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}"/>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="favorite_type_id">Ulubiony gatunek filmowy:</label>
                <select class="form-control" name="favorite_type_id" id="favorite_type_id">
                    @foreach($types as $type)
                        <option value="{{$type->id}}" @if($type->id === $user->favorite_type_id) selected @endif>
                            {{$type->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="favorite_film_id">Ulubiony film:</label>
                <select class="form-control" name="favorite_film_id" id="favorite_film_id">
                    @foreach($films as $film)
                        <option value="{{$film->id}}" @if($film->id === $user->favorite_film_id) selected @endif>
                            {{$film->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <p class="text-center">
                {{method_field('PATCH')}}
                <button class="btn btn-primary btn-lg" type="submit">Zapisz</button>
            </p>
        </div>
    </form>
@endsection
