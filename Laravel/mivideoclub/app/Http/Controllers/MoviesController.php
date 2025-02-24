<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function getShow($id)
    {
        // Cambia la vista a welcome.blade.php temporalmente
        return view('welcome', array('id'=>$id));
    }
}