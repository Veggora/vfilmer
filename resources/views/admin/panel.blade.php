@extends('layouts.app')

@section('content')
    <h1 class="display-4">Panel administratora</h1>
    <hr>
    <ul class="list-group">
        <a href="{{route('users.index')}}" class="list-group-item">Zarządzaj użytkownikami</a>
    </ul>
    @include('moderator._moderator_options')
@endsection