<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Login API
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Check if the uses exists
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json([
                'success' => 'error',
                'message' => 'User does not exist'
            ], 404);
        }

        //Check if the password is correct
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'success' => 'error',
                'message' => 'Wrong password'
            ], 401);
        }

        //Generate token
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'success' => 'success',
            'token' => $token,
            'user' => $user
        ], 200);
    }
}
