<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menuByResto(string $id)
    {   
        $data = Restaurant::getRestaurant($id);
        
        return view('restaurant.show-menu', [
            'resto' => $data,
        ]);
    }
}
