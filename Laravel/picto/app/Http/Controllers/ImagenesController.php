<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;
use App\Models\Imagenes;
use App\Models\Agenda;

class ImagenesController extends Controller
{

    public function index()
    {
        $personas = Personas::all(); // Obtener todas las personas
        $agendas = Agenda::all(); 
        $imagenes = Imagenes::all(); 

        // Verificar si hay datos
        if ($personas->isEmpty()) {
            dd('No hay datos en la base de datos.');
        }
        return view('catalog.imagen', [
            'agendas' => $agendas,
            'imagenes' => $imagenes,
            'personas' => $personas
        ]);
    
    }
}
