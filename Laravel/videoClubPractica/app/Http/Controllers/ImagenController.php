<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
        return view('imagenes.index');
    }
}
