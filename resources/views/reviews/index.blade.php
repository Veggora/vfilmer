@extends('layouts.app')

@section('content')
    <h1>Zarządzaj recenzjami</h1>
    <hr>
    <div class="card">
        <div class="card-body">
            {{ $reviews->links() }}
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Autor</th>
                        <th>Treść</th>
                        <th>Czy zweryfikowano?</th>
                        <th colspan="2" class="text-center">Akcje</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{$review->id}}</td>
                            <td>{{$review->author->username}}</td>
                            <td>{{$review->content}}</td>
                            <td>@if($review->is_verified) <strong>Tak</strong> @else Nie @endif</td>
                            <td class="text-center">
                                <form action="{{ route('reviews.verify', ['review' => $review]) }}" method="POST">
                                    @csrf
                                    {{method_field('PATCH')}}
                                    <button class="btn btn-sm btn-success" type="submit" @if($review->is_verified) disabled @endif>Zatwierdź</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('reviews.destroy', ['review' => $review]) }}" method="POST">
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
            {{ $reviews->links() }}
        </div>
    </div>
@endsection
