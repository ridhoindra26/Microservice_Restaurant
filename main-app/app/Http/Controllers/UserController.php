<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
        return view('user.show', compact('user','userId', 'reviews'));

    }

    // Metode lain yang mungkin ada
}
