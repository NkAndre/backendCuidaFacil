<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HydrationController extends Controller
{
    public function calcular(Request $request)
    {
        $data = $request->validate([
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:1',
        ]);

        $peso = $data['peso'];   // kg
        $altura = $data['altura']; // cm

        $alturaMetros = $altura / 100;
        $imc = $peso / ($alturaMetros * $alturaMetros);

        $aguaBase = $peso * 35;

        if ($imc < 18.5) {

            $aguaFinal = $aguaBase * 0.95;
            $classificacaoImc = 'Abaixo do peso';
        } elseif ($imc < 25) {
            $aguaFinal = $aguaBase;
            $classificacaoImc = 'Peso normal';
        } elseif ($imc < 30) {

            $aguaFinal = $aguaBase * 1.10;
            $classificacaoImc = 'Sobrepeso';
        } else {
      
            $aguaFinal = $aguaBase * 1.20;
            $classificacaoImc = 'Obesidade';
        }

       
        $aguaLitros = round($aguaFinal / 1000, 2);

    
        $copos = round($aguaFinal / 250);

        return response()->json([
            'agua_ml' => round($aguaFinal),
            'agua_litros' => $aguaLitros,
            'copos_250ml' => $copos,
            'imc' => round($imc, 1),
            'classificacao_imc' => $classificacaoImc,
        ]);
    }

    // Opcional: calcula usando os dados já salvos do usuário logado
    public function calcularPerfil()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->peso || !$user->altura) {
            return response()->json([
                'error' => 'Peso e altura não cadastrados no perfil.'
            ], 422);
        }

        // Reutiliza a lógica criando um Request fake
        $fakeRequest = new Request([
            'peso' => $user->peso,
            'altura' => $user->altura,
        ]);

        return $this->calcular($fakeRequest);
    }
}