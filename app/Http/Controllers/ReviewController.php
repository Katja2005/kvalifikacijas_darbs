<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{

    public function reviews(){
        $reviews= Review::with('user')->latest()->get();
        return view('main.review.index',compact('reviews'));
    }

public function createReview(Request $request){
$request->validate([
    'rating' => 'required|integer|min:1|max:5',
    'comment' => 'required|string|max:500',
]);

Review::create([
    'user_id' => Auth::id(),
    'rating' => $request->rating,
    'comment' => $request->comment,
]);

return redirect()->route('reviews');

}

}
