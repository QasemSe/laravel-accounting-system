<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $login_data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login_data)) {
            $manager = Auth::user();
            $token = $manager->createToken('Api Token')->accessToken;

            return response()->json([
                'status' => 'success',
                'token' => $token
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid Authentication'
        ]);
    }
}
