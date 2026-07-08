<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        if ($usuario->tipo_usuario == 'doador') {
            return redirect('/doadores');
        }

        if ($usuario->tipo_usuario == 'hemocentro') {
            return redirect('/hemocentros');
        }

        if ($usuario->tipo_usuario == 'admin') {
            return redirect('/dashboard-admin');
        }

        return "Usuário não identificado";
    }    
}
