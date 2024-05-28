<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestaurantController extends Controller
{
    protected $getAllRestoURL = 'https://tubeseai-restaurant.hasura.app/api/rest/get-all-restaurant';

    public function index()
    {
        $data = Restaurant::getAllRestaurant();
        $carouselData = $data->sortByDesc('id')->take(3);
        $topRatedData = $data->take(3);

        // return dd($data->first());

        // return dd($data->select('id', 'name')->sortBy('id'));

        return view('restaurant.index', [
            'restaurantData' => $data,
            'carouselResto' => $carouselData,
            'topRatedResto' => $topRatedData
        ]);
    }

    public function show(string $id)
    {
        $data = Restaurant::getRestaurant($id);

        $resto = $data['resto'];
        $media = $data['media'];

        return view('restaurant.show', [
            'resto' => $resto,
            'restoMedia' => $media
        ]);
    }
}
