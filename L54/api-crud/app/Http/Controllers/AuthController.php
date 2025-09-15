<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $tokenName = 'Access_token';
    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // auth()->attempt($validated);
        //Prova ad utilizzare le credenziali fornite per vedere se l'accesso è possibile per questo utente
        //Con questo metodo stai già verificando se email e password corrispondono a quelli di un utente effettivamente esistente, In caso l'utente esista restituisce true, nel caso opposto restituisce false
        if(!auth()->attempt($validated)){
            return response()->json(['error' => 'Credenziali non valide'], 401);//401: unauthorized
        }

        //Se sono arrivato fin qui significa che è stato trovato un utente con le credenziali fornite, quindi posso ottenere i  suoi dati richiedendoli direttamente con la funzione auth() e il consecutivo metodo user()
        $user = auth()->user();

        $token = $user->createToken($this->tokenName)->plainTextToken;

        return  response()->json([
            'user' => $user,
            'access_token' => $token
        ]);
    }

    public function register(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        //Qualora fosse necessario, posso effettuare già il login dell'utente che si è appena registrato
        //Considera che noi riteniamo attivo un login nel momento in cui generiamo un token
        //Dato che i token sono legati ad uno user tutte le volte che hai un user(come in questo caso) puoi generare un token ed inviarelo al front-end da utilizzare per il log in
        $token = $user->createToken($this->tokenName)->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token
        ], 201);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout eseguito']);
    }
}
