@extends('layouts.app')

@section('content')
    <h1>Gatunki filmowe</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            <a href="{{route('types.create')}}" class="btn btn-primary">Dodaj gatunek filmowy</a>
            <hr>
            {{ $types->links() }}
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th colspan="3">Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($types as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td>{{$type->name}}</td>
                            <td>
                                <a class="btn btn-sm btn-success mr-2"
                                   href="{{route('types.show', ['type' => $type])}}">Pokaż</a>
                            </td>
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
                    @empty
                        <p>Nie ma żadnych gatunków filmowych.</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $types->links() }}
        </div>
    </div>
@endsection