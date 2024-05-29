<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    protected $users = [
        [
            'id' => 1,
            'email' => 'admin@admin.com',
            'password' => 'admin',
            'name' => 'Admin User'
        ],
        [
            'id' => 2,
            'email' => 'user@user.com',
            'password' => 'password',
            'name' => 'Test User'
        ],
    ];

    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        foreach ($this->users as $user) {
            if ($user['email'] === $request->email && $user['password'] === $request->password) {
                session(['user' => $user]);
                return redirect()->intended('restaurants')->with('success', 'Login sukses!!!!');
            }
        }

        return back()->withErrors([
            'message' => 'Email dan Password Tidak Sesuai!!!',
        ]);
    }
}
