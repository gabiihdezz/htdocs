<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{

   

    public function getIndex(){
        return view('catalog.index', array('arrayPeliculas'=>$this -> arrayPeliculas));
    }

    public function getShow($id){
        return view('catalog.show', array('id' => $id), array('arrayPeliculas'=> $this->arrayPeliculas));  
		$peliculas = Peliculas::all();
		return view ('catalog.show', compact('peliculas') );
      }

    public function getCreate(){
        return view('catalog.create');
    }

    public function getEdit($id){
        return view('catalog.edit', array('id' => $id));    
    }
}


