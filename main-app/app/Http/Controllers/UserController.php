<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Tambahkan metode index() di sini jika belum ada
    public function index()
    {
        // Logika untuk menampilkan halaman profil
        return view('user.show');
    }

    // Metode lain yang mungkin ada
}
