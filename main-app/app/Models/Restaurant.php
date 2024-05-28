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

            return $data;

        } catch (\Exception $e) {
            // Handle Error
            return dd($e);
        }
    }

    public static function getRestaurant($id)
    {
        try {

            $response = Http::withHeaders([
                'x-hasura-admin-secret' => 'OYD5qBvKTzW6C3UH1luLce5kwwSxnknMntTBh1zY2oRrbvXhhvnuSlKQJe7DUzMT'
            ])->get("https://tubeseai-restaurant.hasura.app/api/rest/get-restaurant-id/{$id}");

            $data = $response->json('restaurant_db_restaurant');
            $data = Restaurant::hydrate($data)->flatten()->first();

            return $data;

        } catch (\Exception $e) {
            // Handle Error
            return dd($e);
        }
    }
}
