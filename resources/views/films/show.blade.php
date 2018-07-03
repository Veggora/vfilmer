@extends('layouts.app')

@section('content')
    <div class="list-group">
        <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
            <div class="d-flex w-100 justify-content-between mb-2">
                <h5 class="display-4">{{$film->name}}</h5>
                @auth
                    @if (auth()->user()->films->contains($film))
                        <a href="{{route('films.remove_from_list', compact('film'))}}"
                           class="btn btn-sm btn-danger text-light"
                           style="height: fit-content;">Usuń ze swojej listy</a>
                    @else
                        <a href="{{route('films.add_to_list', compact('film'))}}"
                           class="btn btn-sm btn-success text-light"
                           style="height: fit-content;">Dodaj do swojej listy</a>
                    @endif
                @endauth
            </div>
            <hr>
            <div class="d-flex w-100 justify-content-between mb-2">
                <p>Reżyser: {{$film->director}}</p>
                <p>Długość (w minutach): {{$film->length}}</p>
                <p>Rok: {{$film->premiere_date}}</p>
            </div>

            <p>
                Obsada:
                @foreach ($film->actors as $actor)
                    {{$actor->first_name}} {{$actor->last_name}}@if(!$loop->last),@endif
                @endforeach
            </p>
            <hr>
            <p>
                Gatunki:
                @foreach ($film->types as $type)
                    {{$type->name}}@if(!$loop->last),@endif
                @endforeach
            </p>
            <hr>
            <p class="mb-1">Opis: {{$film->description}}</p>
            <hr>
            <p>
                Osób, które uznały ten film za ulubiony: <span class="badge badge-pill badge-success display-4">{{$film->usersWhoLiked()->count()}}</span>
            </p>
            <p>
                Osób, które dodały ten film do swojej biblioteki: <span class="badge badge-pill badge-success">{{$film->users()->count()}}</span>
            </p>
        </div>
    </div>
    @auth
        @if (!auth()->user()->reviews->contains('film_id', $film->id))
            @include('reviews.review_form', compact('film'))
        @else
            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                    <div class="d-flex w-100 justify-content-between mb-2">
                        <h5>Twoja recenzja</h5>
                    </div>
                    <hr>
                    @php $rev = auth()->user()->reviews()->where('film_id', $film->id)->first() @endphp
                    <p class="mb-1">
                        @if ($rev->is_verified)
                            {{$rev->content}}
                        @else
                            Twoja recenzja czeka na weryfikację.
                        @endif
                    </p>
                </div>
            </div>
        @endif
    @endauth
    @include('reviews.reviews_list')
@endsection