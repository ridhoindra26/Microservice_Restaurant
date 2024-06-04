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

            $cek = FavMenu::getById($value['id']);
            
            foreach ($cek as $x) {
                if ($x->id_menu == $id) {
                    return redirect()->back()->with('warning', 'Menu Sudah Ada di Favorit Anda');
                }
            }

            $menu = FavMenu::store_favorite($value['id'],$id);
            
            return redirect()->back()->with('success', 'Menu Berhasil Ditambahkan Ke Favorit');
        } else {
            return redirect()->back()->with('error', 'Silahkan Login Terlebih Dahulu');
        }
    }

    public function deleteFavorite(string $id) {
        if (Session::has('user')) {
            $value = Session::get('user');
            // dd($value['id']);
            $menu = FavMenu::delete_favorite($value['id'],$id);
            
            return redirect()->back()->with('message', 'Favorit Berhasil Dihapus');
        } else {
            return redirect()->back()->with('message', 'Silahkan Login Terlebih Dahulu');
        }
    }
}
