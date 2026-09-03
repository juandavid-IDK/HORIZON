<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaludoController extends Controller
{
    public function index()
    {
        $nombre = 'Estudiante Laravel';
        $libros = ['Cien Años de Soledad', 'El Aleph', 'Ficciones'];

        return view('saludo',[
            'nombre' => $nombre,
            'libros' => $libros
        ]);
    }
}
