<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Imc extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $data = $request->validate([
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:1',
        ]);

        $peso =$data['peso'];
        $altura =$data['altura'];


        $alturaMetros = $altura / 100;
        $imc = $peso / ($alturaMetros * $alturaMetros);

        if ($imc < 18.5) {
            $classificacaoImc = 'Abaixo do peso';
        } elseif ($imc < 25) {
            $classificacaoImc = 'Peso normal';
        } elseif ($imc < 30) {
            $classificacaoImc = 'Sobrepeso';
        } else {
            $classificacaoImc = 'Obesidade';
        }

        return response()->json([
            'imc' => round($imc, 1),
            'classificacao_imc' => $classificacaoImc
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
