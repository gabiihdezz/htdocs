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
    public function getIndex($id)
    {
        // Cambia la vista a welcome.blade.php temporalmente
        return view('welcome', array('id'=>$id));
    }
    public function getCreate($id)
    {
        // Cambia la vista a welcome.blade.php temporalmente
        return view('welcome', array('id'=>$id));
    }
    public function getEdit($id){
    return view('welcome', array('id'=>$id));
}
}