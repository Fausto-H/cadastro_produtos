<?php

namespace App\Http\Controllers;

class PaginaController extends Controller
{
    public function index()
    {
        // Retorna a view da página inicial
        return view('welcome');
    }
}
