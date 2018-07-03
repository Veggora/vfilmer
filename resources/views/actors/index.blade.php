@extends('layouts.app')

@section('content')
    <h1>Aktorzy</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <a href="{{route('actors.create')}}" class="btn btn-primary">Dodaj aktora</a>
            <hr>
            {{ $actors->links() }}
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Wiek</th>
                        <th colspan="3">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($actors as $actor)
                        <tr>
                            <td>{{$actor->id}}</td>
                            <td>{{$actor->first_name}}</td>
                            <td>{{$actor->last_name}}</td>
                            <td>{{$actor->age}}</td>
                            <td>
                                <a class="btn btn-sm btn-success mr-2"
                                   href="{{route('actors.show', ['actor' => $actor])}}">Pokaż</a>
                            </td>
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
                    @empty
                        <p>Nie ma żadnych aktorów.</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $actors->links() }}
        </div>
    </div>
@endsection