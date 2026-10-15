<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Hemocentro;

//Rota protegida: retorna o usuário autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Rota pública: retorna os hemocentros cadastrados
Route::get('/hemocentros', function(){
    return response()->json(Hemocentro::all());
});
