<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\FavMenu;

class FavoriteMenuController extends Controller
{
    public function storeFavorite(string $id) {
        if (Session::has('user')) {
            $value = Session::get('user');
            // dd($value['id']);
            $menu = FavMenu::store_favorite($value['id'],$id);
            
            return redirect()->back()->with('message', 'Favorit Berhasil Ditambahkan');
        } else {
            return redirect()->back()->with('message', 'Silahkan Login Terlebih Dahulu');
        }
    }
}
