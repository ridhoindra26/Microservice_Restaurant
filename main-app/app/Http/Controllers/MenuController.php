<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Restaurant;

class MenuController extends Controller
{
    public function menuByResto(string $id) {
        $resto = Restaurant::getRestaurant($id);
        $menu = Menu::getMenu($id);
        
        return view('restaurant.show-menu', [
            'resto' => $resto,
            'menus' => $menu
        ]);
    }
}
