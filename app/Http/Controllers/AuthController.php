<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createAccount(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        auth()->login($user);

        return response()->json(['token' => $user->createToken('Tokens')->plainTextToken,
        "user" => $user], 201);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json(['message'=>'invalid credentials']);
        }
        $user = auth()->user();
        return response()->json(['token' => $user->createToken('Tokens')->plainTextToken,
        "user" => $user], 201);
    }

}
