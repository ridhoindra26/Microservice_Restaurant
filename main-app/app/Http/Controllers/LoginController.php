<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Tymon\JWTAuth\JWTManager;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function generateShortToken($user)
    {
        $token = JWTAuth::fromUser($user);
        Session::put('user', $user);

        // Shorten the token to 10 characters
        $shortToken = substr($token, 0, 10);

        return $shortToken;
    }

    public function index() 
        {   
            return view('auth.login');
    }


    public function authenticate (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $validator->validated();
    
        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        // dd(Auth::user());
        $shortToken = $this->generateShortToken(Auth::user());
    
        return redirect()->intended('/restaurants');
    }
    
    public function logout()
    {
        $token = JWTAuth::getToken();
        if ($token) {
            JWTAuth::invalidate($token);

            // Add the token to the blacklist for 1 minute
            Cache::put('jwt_blacklist_' . $token, true, 1);

            return response()->json(['message' => 'Successfully logged out']);
        }

        return response()->json(['error' => 'Unable to logout'], 400);
    }
    
    
}
