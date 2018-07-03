@extends('layouts.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <hr>
    <div class="list-group">
        @forelse ($films as $film)
            <a href="{{route('films.show', compact('film'))}}"
               class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$film->name}}</h5>
                </div>
                <div class="d-flex w-100 justify-content-between">
                    <small>Reżyser: {{$film->director}}</small>
                    <small>Długość (w minutach): {{$film->length}}</small>
                    <small>Rok: {{$film->premiere_date}}</small>
                </div>
                <p class="mb-1">{{$film->description}}</p>
            </a>
        @empty
            <p>Brak filmów.</p>
        @endforelse
    </div>

    {{ $films->links() }}
@endsection