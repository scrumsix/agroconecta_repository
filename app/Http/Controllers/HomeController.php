<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ahora el controlador solo se encarga de mostrar la vista de bienvenida.
        return view('welcome');
    }
}