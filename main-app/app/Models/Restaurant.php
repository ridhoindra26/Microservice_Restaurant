<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Restaurant extends Model
{
    use HasFactory;

    public static function getAllRestaurant()
    {
        try {

            $response = Http::withHeaders([
                'x-hasura-admin-secret' => 'OYD5qBvKTzW6C3UH1luLce5kwwSxnknMntTBh1zY2oRrbvXhhvnuSlKQJe7DUzMT'
            ])->get('https://tubeseai-restaurant.hasura.app/api/rest/get-all-restaurant');

            $data = $response->json('restaurant_db_restaurant');
            $data = Restaurant::hydrate($data)->flatten();
            // return dd($data);


            $data = $data->map(function($restaurant) {
                $rating = Review::getByRestaurantId($restaurant->id)->avg('rating');
                $restaurant['rating'] = $rating;
                return $restaurant;
            });

            return $data;

        } catch (\Exception $e) {
            // Handle Error
            return dd($e);
        }
    }

    public static function getRestaurant(string $id)
    {
        try {

            $response = Http::withHeaders([
                'x-hasura-admin-secret' => 'OYD5qBvKTzW6C3UH1luLce5kwwSxnknMntTBh1zY2oRrbvXhhvnuSlKQJe7DUzMT'
            ])->get("https://tubeseai-restaurant.hasura.app/api/rest/get-restaurant-id/{$id}");

            $resto = $response->json('restaurant_db_restaurant');
            $resto = Restaurant::hydrate($resto)->first();
            $media = $response->json('restaurant_db_restaurant_media');
            $media = Restaurant::hydrate($media);

            $rating = Review::getByRestaurantId($resto->id)->avg('rating');
            $resto['rating'] = $rating;

            return array("resto" => $resto, "media" => $media);

        } catch (\Exception $e) {
            // Handle Error
            return dd($e);
        }
    }

    // public static function getMediaRestaurant(string $id)
    // {
    //     try {

    //         $response = Http::withHeaders([
    //             'x-hasura-admin-secret' => 'OYD5qBvKTzW6C3UH1luLce5kwwSxnknMntTBh1zY2oRrbvXhhvnuSlKQJe7DUzMT'
    //         ])->get("https://tubeseai-restaurant.hasura.app/api/rest/get-resto-media/{$id}");

    //         $data = $response->json('restaurant_db_restaurant_media');
    //         $data = Restaurant::hydrate($data)->flatten();

    //         return $data;

    //     } catch (\Exception $e) {
    //         // Handle Error
    //         return dd($e);
    //     }
    // }
}
