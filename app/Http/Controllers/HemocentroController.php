<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HemocentroController extends Controller
{
    public function index()
    {
    return view('hemocentro.index');
    }
}
