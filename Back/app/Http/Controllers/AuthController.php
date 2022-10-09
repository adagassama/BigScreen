<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Règle de validation des identifiants
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        // Récuperation du champs email de la table user
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => 'Les informations d\'identification fournies sont incorrectes'
            ]);
        }
        // Si les identifiants sont correct un token est crée pour la connexion
        return $user->createToken($request->device_name)->plainTextToken;
    }

    public function logout(Request $request)
    {
        // Méthode de déconnexion de l'administrateur
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg' => 'Vous êtes bien déconnecté']);
    }
}
