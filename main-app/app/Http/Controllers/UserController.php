<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Tambahkan metode index() di sini jika belum ada
    public function index()
    {   
        // Logika untuk menampilkan halaman profil
        return view('user.show', [
            'user' => session()->get('user')
        ]);
    }

    // Metode lain yang mungkin ada
}
