@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{$user->first_name}} {{$user->last_name}}</h1>
            <h2>{{$user->username}}</h2>
            <h3>{{$user->email}}</h3>
            <hr>
            <h3>Ulubiony gatunek filmowy:
                @if(isset($user->favoriteType->name))
                    {{$user->favoriteType->name}}
                @else
                    brak
                @endif
            </h3>
            <h3>Ulubiony film:
                @if(isset($user->favoriteFilm->name))
                    {{$user->favoriteFilm->name}}
                @else
                    brak
                @endif
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h1>Moje filmy</h1>
                    <hr>
                    @if ($user->films()->count() !== 0)
                        <ul class="list-group">
                            @foreach ($user->films as $film)
                                <a href="{{route('films.show', compact('film'))}}" class="list-group-item">{{$film->name}}</a>
                            @endforeach
                        </ul>
                    @else
                        <p>Brak filmów.</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h1>Moje recenzje</h1>
                    <hr>
                    @if ($user->reviews()->count() !== 0)
                        <ul class="list-group">
                            @foreach ($user->reviews as $review)
                                <li class="list-group-item">
                                    <strong>{{$review->film->name}}</strong>:&nbsp;{{$review->content}}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Brak recenzji.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
