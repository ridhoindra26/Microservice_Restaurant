<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Tambahkan metode index() di sini jika belum ada
    public function index()
    {   
        if (Session::has('user')) {
            $user = session()->get('user');
            $reviews = Review::getByUserId($user->id);
            
            return view('user.show', compact('user', 'reviews'));
        } else {
            return redirect('/login')->with('message', 'Silahkan Login Terlebih Dahulu');
        }

    }

    // Metode lain yang mungkin ada
}
