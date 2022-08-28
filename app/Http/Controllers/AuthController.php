<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     //Fonction d'enregistrement d'un nouvel utilisateur
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if(User::create($validatedData)) {
            return response()->json(null, 201);
        }

        return response()->json(null, 404);
    }
    
    //Connexion d'un utilisateur déjà enregistrer
    public function login(Request $request)
    {
        //Valisation des champs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Identifiant incorrect'],
            ]);
        }
    
        return $user->createToken($request->device_name)->plainTextToken;
    }
    public function getAuthenticatedUser(Request $request) {
        return $request->user();
    }

    //Deconnexion de l'utilisateur
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(null, 200);

    }
}
