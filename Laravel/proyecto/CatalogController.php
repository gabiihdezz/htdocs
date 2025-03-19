<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Persona;
use App\Models\Imagen;
use App\Models\Agenda;

class CatalogController extends Controller
{
    public function getIndex()
    {
        $peliculas = Movie::all();
        return view('catalog.index', compact('peliculas'));
    }
    
    public function getShow($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.show', compact('pelicula')); 
    }
    
    public function getCreate()
    {
        return view('catalog.create');
    }

    public function postStore(Request $request)
    {
        // Validación de personas
        $personasData = $request->validate([
            'idpersona' => 'required|string|max:255',
            'nombre' => 'required|string|max:64',
            'apellidos' => 'required|string|max:64',
            'edad' => 'required|integer',
        ]);

        // Crear registro de persona
        $persona = Persona::create($personasData);

        // Validación de imágenes
        $imagenesData = $request->validate([
            'idimagen' => 'required|string|max:255',
            'categoria' => 'required|string|max:64',
            'imagen' => 'required|string|max:8',
            'descripcion' => 'required|string',
        ]);

        // Crear registro de imagen
        $imagen = Imagen::create($imagenesData);

        // Validación de agenda
        $agendaData = $request->validate([
            'id' => 'required|string|max:255',
            'fecha' => 'required|string|max:64',
            'hora' => 'required|string|max:64',
            'idpersona' => 'required|string|max:8',
            'idimagen' => 'required|string',
        ]);

        // Crear registro de agenda
        $agenda = Agenda::create($agendaData);

        // Retornar una vista con el estado
        return view('catalog.show', [
            'personas' => $persona,
            'imagenes' => $imagen,
            'agenda' => $agenda,
            'status' => 'Los registros se han actualizado correctamente.'
        ]);
    }

    public function getEdit($id)
    {
        $pelicula = Movie::findOrFail($id);
        return view('catalog.edit', compact('pelicula'));
    }
    
    public function postEdit(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'year' => 'required|integer',
            'synopsis' => 'required|string',
            'poster' => 'required|string',
            'rented' => 'required|boolean'
        ]);

        $pelicula = Movie::updateOrCreate(['id' => $request->id], $validateData);
        
        return redirect()->route('index')->with('status', 'Película editada correctamente');
    }
}
