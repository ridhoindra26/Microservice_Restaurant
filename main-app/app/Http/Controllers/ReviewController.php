<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewByResto(string $id)
    {   
        $data = Restaurant::getRestaurant($id);
        
        return view('restaurant.show-review', [
            'resto' => $data,
        ]);
    }
}
