<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
    * Login User and issue JWT
    */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
    * Logout User
    */
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
    * Refresh JWT Token
    */
    public function refresh()
    {
        $token = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(['token' => $token]);
    }

    /**
    * Get User Info
    */
    public function user()
    {
        return response()->json(Auth::user());
    }
}