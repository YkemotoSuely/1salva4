<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\HemocentroController;
use App\Http\Controllers\DoacaoController;

// Página inicial
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rotas protegidas
Route::middleware('auth')->group(function () {

    Route::get('/doadores', [DoadorController::class, 'index']);

    Route::get('/hemocentros', [HemocentroController::class, 'index']);

    Route::get('/doacoes', [DoacaoController::class, 'index']);

});

// Rotas de autenticação do Breeze
require __DIR__.'/auth.php';

// Cadastro de novos usuários
Route::view('/escolher-perfil', 'auth.escolher-perfil')
    ->name('escolher-perfil');

Route::view('/register/doador', 'auth.register-doador')
    ->name('register.doador');

Route::view('/register/hemocentro', 'auth.register-hemocentro')
    ->name('register.hemocentro');