@extends('layouts.app')

@section('content')
    <h1>Gatunek filmowy: {{$type->name}}</h1>

    <hr>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th colspan="2">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$type->id}}</td>
                        <td>{{$type->name}}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary mr-2"
                               href="{{route('types.edit', ['type' => $type])}}">Edytuj</a>
                        </td>
                        <td>
                            <form action="{{ route('types.destroy', ['type' => $type]) }}" method="POST">
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
                <h1>Filmy z tego gatunku:</h1>
                <hr>
                <ul class="list-group">
                    @foreach ($type->films as $film)
                        <li class="list-group-item">{{$film->name}} ({{$film->premiere_date}})</li>
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
