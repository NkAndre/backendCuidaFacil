<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HydrationController;
use App\Http\Controllers\Imc;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::post('/cadastro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/hidratacao', [HydrationController::class, 'calcular']);
Route::post('/imc', [Imc::class, 'store']); 



Route::middleware('auth:sanctum')->group(function () {
    
    
    Route::get('/perfil', function (Request $request) {
        return $request->user();
    });


    Route::get('/imc', [Imc::class, 'index']); 
    
   
    Route::get('/hidratacao/perfil', [HydrationController::class, 'calcularPerfil']);
    
});