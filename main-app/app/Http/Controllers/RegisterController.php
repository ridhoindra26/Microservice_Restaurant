<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index() 
    {
        if(session('user')) {
            return redirect()->intended('/restaurants');
        }

        return view('auth.register');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => ''
        ]);


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,

            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/login')->with('success', 'User registered successfully');
    }
}
