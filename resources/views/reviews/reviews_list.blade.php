<h3>Recenzje użytkowników</h3>

<hr>

@foreach($film->verifiedReviews()->paginate(10) as $review)
    <div class="list-group">
        <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
            <div class="d-flex w-100 justify-content-between mb-2">
                <h5>{{$review->author->username}}</h5>
                <small>{{$review->created_at->diffForHumans()}}</small>
            </div>
            <hr>
            <p class="mb-1">{{$review->content}}</p>
        </div>
    </div>
@endforeach

{{ $film->verifiedReviews()->paginate(10)->links() }}