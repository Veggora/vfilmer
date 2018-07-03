@extends('layouts.app')

@section('content')
    <h1>Zarządzaj filmami</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <a href="{{route('films.create')}}" class="btn btn-primary">Dodaj film</a>
            <hr>
            {{ $films->links() }}
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tytuł</th>
                        <th>Reżyser</th>
                        <th>Opis</th>
                        <th>Rok premiery</th>
                        <th>Długość (w minutach)</th>
                        <th colspan="3" class="text-center">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td>{{$film->id}}</td>
                            <td>{{$film->name}}</td>
                            <td>{{$film->director}}</td>
                            <td>{{$film->description}}</td>
                            <td>{{$film->premiere_date}}</td>
                            <td>{{$film->length}}</td>
                            <td class="text-center"><a class="btn btn-sm btn-success"
                                                           href="{{route('films.show', ['film' => $film])}}">Pokaż</a></td>
                            <td class="text-center"><a class="btn btn-sm btn-secondary"
                                                       href="{{route('films.edit', ['film' => $film])}}">Edytuj</a></td>
                            <td class="text-center">
                                <form action="{{ route('films.destroy', ['film' => $film]) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <strong>Obsada:</strong>
                                @foreach ($film->actors as $actor)
                                    {{$actor->first_name}} {{$actor->last_name}}@if(!$loop->last),@endif
                                @endforeach
                            </td>
                            <td colspan="7">
                                <strong>Gatunki:</strong>
                                @foreach ($film->types as $type)
                                    {{$type->name}}@if(!$loop->last),@endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $films->links() }}
        </div>
    </div>
@endsection
