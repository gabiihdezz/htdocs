<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;

class PersonasController extends Controller
{
    public function index()
    {
        $personas = Personas::all(); // Obtener todas las personas

        // Verificar si hay datos
        if ($personas->isEmpty()) {
            dd('No hay datos en la base de datos.');
        }

        return view('catalog.persona', compact('personas'));
    }
}
