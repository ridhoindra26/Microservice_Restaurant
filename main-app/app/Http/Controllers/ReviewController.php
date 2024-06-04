<?php

namespace App\Http\Controllers;


use App\Models\Review;

use App\Models\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ReviewController extends Controller
{

    protected $baseUri = 'https://more-bass-15.hasura.app/api/rest/';
    protected $adminSecret = 'nUVV6HD7baTXE6wenoA6sbVbqNBZShpx0GaGBHUl7yktxvvH83L9p6d4zJiE2Z1z';

    public function reviewByResto($id)
    {   
        $user = session('user');
        $data = Restaurant::getRestaurant($id);
        $resto = $data['resto'];
        $restoMedia = $data['media'];
        $reviews = Review::getByRestaurantId($id);
        $countReviews = $reviews->count();

        return view('restaurant.show-review', compact('user','data', 'resto', 'restoMedia', 'reviews', 'countReviews'));
    }

    // public function getReviewByUserId()
    // {
    //     $userId = Auth::user() ?? 1;
    //     $username = $userId->name ?? 'Reyhan Faqih Ashuri';

    //     $reviews = Review::getByUserId($userId);

    //     return view('user.show' , compact('userId', 'reviews', 'username'));
    // }

    public function storeReview(Request $request)
    {
        if(!session('user')) {
            return redirect()->back()->with('message', 'Silakan login terlebih dahulu');
        }

        $request->validate([
            'user_id' => 'required',
            'review' => 'required|string',
            'rating' => 'required|integer',
            'restaurant_id' => 'required'
        ]);

        $insertReview = Review::createReview($request->user_id, $request->restaurant_id, $request->review, $request->rating);
        return redirect()->back();
    }

    public function updateReview($idReview, Request $request)
    {
        $request->validate([
            'newReview' => 'required|string',
            'newRating' => 'required|integer',
        ]);

        $updateReview = Review::updateReview($idReview, $request->newReview, $request->newRating);
        return redirect()->back();
    }

    public function deleteReview(Request $request, $reviewId)
    {
        $restaurantId = $request->input('restaurant_id');

        $deleteReview = Review::deleteReview($reviewId);

        return redirect()->back();
    }
}
