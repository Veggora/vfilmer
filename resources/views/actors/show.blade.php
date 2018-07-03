@extends('layouts.app')

@section('content')
    <h1>Aktor: {{$actor->first_name}} {{$actor->last_name}}</h1>

    <hr>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Wiek</th>
                        <th colspan="2">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$actor->id}}</td>
                        <td>{{$actor->first_name}}</td>
                        <td>{{$actor->last_name}}</td>
                        <td>{{$actor->age}}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary mr-2"
                               href="{{route('actors.edit', ['actor' => $actor])}}">Edytuj</a>
                        </td>
                        <td>
                            <form action="{{ route('actors.destroy', ['actor' => $actor]) }}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1>Filmy, w których brał udział aktor:</h1>
                <hr>
                <ul class="list-group">
                    @foreach ($actor->films as $film)
                        <li class="list-group-item">{{$film->name}} ({{$film->premiere_date}})</li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
