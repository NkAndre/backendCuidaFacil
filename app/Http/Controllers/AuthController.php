<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    public function register(Request $request) 
    {
        // Validação básica
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'altura' => 'nullable',
            'peso' => 'nullable'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Hash::make é o padrão moderno do Laravel
            'altura' => $data['altura'],
            'peso' => $data['peso'],
        ]);

        return response()->json([
            'message' => 'Cadastrado com sucesso!', 
            'user' => $user
        ], 201);
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required', 
    ]);

    if (Auth::attempt($credentials)) {
        /** @var \App\Models\User $user */ // add iss pois o vs code da etec nao reconhece
        $user = Auth::user();

        
        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json([
            'message' => 'Login realizado!',
            'token' => $token, 
            'user' => [
                'nome' => $user->name,
                'email' => $user->email
            ]
        ], 200);
    }

    return response()->json(['error' => 'E-mail ou senha inválidos.'], 401);
}
}