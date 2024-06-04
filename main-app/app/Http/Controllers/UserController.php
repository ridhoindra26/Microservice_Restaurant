<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\FavMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Tambahkan metode index() di sini jika belum ada
    public function index()
    {   
        $user = session()->get('user');
        // Logika untuk menampilkan halaman profil

        $userId = Auth::user();
        $reviews = Review::getByUserId($user->id);
        $fav_menu = FavMenu::getById($user->id);
        return view('user.show', compact('user','userId', 'reviews','fav_menu'));

    }

    // Metode lain yang mungkin ada
}
