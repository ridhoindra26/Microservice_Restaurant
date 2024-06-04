<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'review',
        'rating',
        'restaurant_id',
        'user_id',
    ];

    protected $baseUri = 'https://more-bass-15.hasura.app/api/rest/';
    protected $adminSecret = 'nUVV6HD7baTXE6wenoA6sbVbqNBZShpx0GaGBHUl7yktxvvH83L9p6d4zJiE2Z1z';

    public static function getByRestaurantId($id)
    {

        try {
            $response = Http::withHeaders([
                'x-hasura-admin-secret' => (new static)->adminSecret,
            ])->get((new static)->baseUri . "getReviewByRestaurantId/{$id}");
            // $response = Http::get($this->baseUri . "getReviewByRestaurantId/{$restaurantId}");
            $data = $response->json('restoranReview');
            // return dd($data);
            $data = Review::hydrate($data);
            $data = $data->flatten();

            // return response()->json($response->json(), $response->status());
            return $data;
        } catch (\Exception $e) {
            return dd($e);
        }
        // return collect($response->json('restoranReview'))->mapInto(static::class);
    }

    public static function getByUserId($userId)
    {

        try {
            $response = Http::withHeaders([
                'x-hasura-admin-secret' => (new static)->adminSecret,
            ])->get((new static)->baseUri . "getReviewByUserId/{$userId}");
            // $response = Http::get($this->baseUri . "getReviewByUserId/{$userId}");
            // return dd($response);
            $data = $response->json('restoranReview');
            // return dd($data);
            $data = Review::hydrate($data);
            $data = $data->flatten();
            return $data;
        } catch (\Exception $e) {
            return dd($e);;
        }
    }

    public static function createReview($userId, $restaurantId, $review, $rating)
    {
        try {
            $response = Http::withHeaders([
                'x-hasura-admin-secret' => (new static)->adminSecret,
            ])->post((new static)->baseUri . "InsertReview/{$userId}/{$restaurantId}/{$review}/{$rating}");
            // $response = Http::post($this->baseUri . "InsertReview/{$userId}/{$restaurantId}/{$request->review}");

            return $response->successful();
            // return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            return dd($e);
        }
    }

    public static function updateReview($idReview, $newReview, $newRating)
    {
        try {
            $response = Http::withHeaders([
                'x-hasura-admin-secret' => (new static)->adminSecret,
            ])->put((new static)->baseUri . "UpdateReview/{$idReview}/{$newReview}/{$newRating}");
            // $response = Http::patch($this->baseUri . "UpdateReview/{$idReview}/{$request->newReview}");

            return $response->successful();
        } catch (\Exception $e) {
            return dd($e);
        }
        
    }

    public static function deleteReview($reviewId)
    {
        try {
            $response = Http::withHeaders([
                'x-hasura-admin-secret' => (new static)->adminSecret,
            ])->delete((new static)->baseUri . "DeleteReview/{$reviewId}");
            // $response = Http::delete($this->baseUri . "DeleteReview/{$reviewId}");

            return $response->successful();
        } catch (\Exception $e) {
            return dd($e);
        }
        
    }
}
