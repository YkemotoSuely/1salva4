<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoadorController extends Controller
{
    public function index()
    {
        return view('doador.index');
    }
}
