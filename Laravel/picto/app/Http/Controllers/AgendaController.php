<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Imagenes;
use App\Models\Personas;

class AgendaController extends Controller
{
    public function index()
    {        
        $personas = Personas::all(); // Obtener todas las personas

        // Verificar si hay datos
        if ($personas->isEmpty()) {
            dd('No hay datos en la base de datos.');
        }


        return view('catalog.agenda');
    }
}
