<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $tokenName = 'access_token';
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at' => now(),
            'role' => 'customer'
        ]);

        //token non utilizzato, per ottenerlo il FE dovrà fare una richiesta di login
        // $token = $user->createToken($this->tokenName)->plainTextToken;

        return response()->json([
            'user' => $user
        ]);

    }

    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if(!auth()->attempt($validated)){
             return response()->json(['error' => 'Credenziali non valide']);
        }

        $user = auth()->user();

        $token = $user->createToken($this->tokenName)->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout eseguito']);
    }
}
