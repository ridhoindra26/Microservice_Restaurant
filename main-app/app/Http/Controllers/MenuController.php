<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function menuByResto(string $id) {
        $data = Restaurant::getRestaurant($id);
        $resto = $data['resto'];
        $media = $data['media'];

        $menu = Menu::getMenu($id);
        
        return view('restaurant.show-menu', [
            'resto' => $resto,
            'restoMedia' => $media,
            'menus' => $menu
        ]);
    }
}
