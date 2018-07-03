@extends('layouts.app')

@section('content')
    <h1>Edytuj użytkownika: {{$user->first_name}} {{$user->last_name}}</h1>
    <hr>
    <form action="{{route('users.update', ['user' => $user])}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="username">Login:</label>
            <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}"/>
        </div>

        <div class="form-group">
            <label for="first_name">Imię:</label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user->first_name}}"/>
        </div>

        <div class="form-group">
            <label for="last_name">Nazwisko:</label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user->last_name}}"/>
        </div>

        <div class="form-group">
            <label for="email">Adres e-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}"/>
        </div>

        <div class="form-group">
            <label for="role">Rola:</label>
            <select class="form-control" name="role" id="role">
                @foreach($roles as $role)
                    <option value="{{$role}}">
                        {{$role}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="is_banned">Czy zbanowany?</label>
            <input name="is_banned" id="is_banned" type="checkbox"
                   value="{{$user->is_banned}}" @if ($user->is_banned) checked @endif>
        </div>

        <div class="form-group">
            <p class="text-center">
                {{method_field('PATCH')}}
                <button class="btn btn-primary btn-lg" type="submit">Zapisz</button>
            </p>
        </div>
    </form>
@endsection
