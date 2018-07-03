@extends('layouts.app')

@section('content')
    <h1>Zarządzaj użytkownikami</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            {{ $users->links() }}
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię i nazwisko</th>
                        <th>Adres e-mail</th>
                        <th>Rola</th>
                        <th>Czy zbanowany?</th>
                        <th colspan="2" class="text-center">Akcje</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>@if($user->is_banned) <strong>Tak</strong> @else Nie @endif</td>
                            <td class="text-center"><a class="btn btn-sm btn-secondary"
                                                       href="{{route('users.edit', ['user' => $user])}}">Edytuj</a></td>
                            <td class="text-center">
                                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-sm btn-danger" type="submit">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
