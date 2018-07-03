<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('author')->latest()->paginate(20);

        return view('reviews.index', compact('reviews'));
    }

    public function toVerification()
    {
        $reviews = Review::with('author')->where('is_verified', false)->latest()->paginate(20);

        return view('reviews.to_verification', compact('reviews'));
    }

    public function verify(Review $review)
    {
        $review->update(['is_verified' => true]);

        return redirect()->back()->with('message', 'Recenzja została zatwierdzona.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReviewRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReviewRequest $request)
    {
        Review::create([
            'author_id' => auth()->id(),
            'film_id' => $request->get('film_id'),
            'content' => $request->get('content'),
        ]);

        return redirect()->back()->with('message', 'Twoja recenzja została przekazana do weryfikacji. Dziękujemy za opinię.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->back()->with('message', 'Pomyślnie usunięto recenzję.');
    }
}
