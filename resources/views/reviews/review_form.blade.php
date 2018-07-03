<h3>Napisz recenzję</h3>

<hr>

<form action="{{route('reviews.store', ['film_id' => $film->id])}}" method="POST">
    @csrf

    <div class="form-group">
        <label for="content">Treść:</label>
        <textarea class="form-control" name="content" id="content"></textarea>
    </div>

    <div class="form-group">
        <p class="text-center">
            <button class="btn btn-primary btn-lg" type="submit">Dodaj recenzję</button>
        </p>
    </div>
</form>