<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->api_token = $user->createToken('api_token')->plainTextToken;
            $user->save();

            return response()->json([
                'message' => 'Successfully logged in',
                'user' => $user,
            ]);
        }

        return response()->json([
            'message' => 'Invalid login credentials',
        ], 401);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required|string',
        ]);

        $user =
            \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => \Illuminate\Support\Facades\Hash::make($request->password),
                'api_token' => \Illuminate\Support\Str::random(60),
            ]);

        return response()->json([
            'message' => 'Successfully registered',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
