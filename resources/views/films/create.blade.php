@extends('layouts.app')

@section('content')
    <h1>Dodaj film</h1>

    <hr>

    <form action="{{route('films.store')}}" method="POST">
        @csrf

        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nazwa:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>

                <div class="form-group">
                    <label for="director">Reżyser:</label>
                    <input type="text" class="form-control" name="director" id="director"/>
                </div>

                <div class="form-group">
                    <label for="premiere_date">Rok premiery:</label>
                    <input type="number" class="form-control" name="premiere_date" id="premiere_date"/>
                </div>

                <div class="form-group">
                    <label for="length">Długość (w minutach):</label>
                    <input type="number" class="form-control" name="length" id="length"/>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group" style="height: 86%;">
                    <label for="description">Opis:</label>
                    <textarea class="form-control h-100" name="description" id="description"></textarea>
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="actors">Aktorzy:</label>
                    <select class="form-control" multiple="multiple" name="actors[]" id="actors"
                            style="height: 300px;">
                        @foreach($actors as $actor)
                            <option value="{{$actor->id}}"
                                    @if(in_array($actor->id, $actors->pluck('id')->toArray())) @endif
                                    @if(in_array($actor->id, $film->actors->pluck('id')->toArray())) selected @endif>
                                {{$actor->first_name}} {{$actor->last_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="types">Gatunki filmowe:</label>
                    <select class="form-control" multiple="multiple" name="types[]" id="types"
                            style="height: 300px;">
                        @foreach($types as $type)
                            <option value="{{$type->id}}"
                                    @if(in_array($type->id, $types->pluck('id')->toArray())) @endif
                                    @if(in_array($type->id, $film->types->pluck('id')->toArray())) selected @endif>
                                {{$type->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group d-flex justify-content-around">
            <p class="text-center">
                <button class="btn btn-primary btn-lg" type="submit">Zapisz</button>
            </p>
            <p class="text-center">
                <a href="{{route('films.index')}}" class="btn btn-secondary btn-lg">Wróć</a>
            </p>
        </div>
    </form>
@endsection
