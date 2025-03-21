<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Personas;
use App\Models\Imagenes;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        // Obtener los datos de la base de datos
        $personas = Personas::all();
        $imagenes = Imagenes::all();
        $agendas = Agenda::all();

        // Pasar los datos a la vista
        return view('catalog.agenda', compact('personas', 'imagenes', 'agendas'));
    }

    public function store(Request $request)
    {
        // Validar los datos que llegan del formulario
        $request->validate([
            'idpersona' => 'required|exists:personas,id',  // Asegura que el ID de persona exista
            'idimagen' => 'required|exists:imagenes,id',    // Asegura que el ID de imagen exista
            'fecha' => 'required|date',                      // Asegura que la fecha sea válida
            'hora' => 'required|date_format:H:i',            // Asegura que la hora esté en formato válido (ej. 14:30)
        ]);

        // Crear una nueva agenda en la base de datos
        Agenda::create([
            'idpersona' => $request->idpersona,
            'idimagen' => $request->idimagen,
            'fecha' => $request->fecha,
            'hora' => $request->hora,  // Guardamos la hora también
        ]);

        // Redirigir después de la creación
        return redirect()->route('catalog.agenda')->with('success', 'Agenda creada con éxito!');
    }
}
