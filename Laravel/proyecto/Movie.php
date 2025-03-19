<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $agenda = ['id','fecha', 'hora', 'idpersona','idimagen', 'created_at', 'created_at', 'updated_at'];
    protected $imagenes = ['idimagen','categoria', 'imagen', 'descripcion','created_at', 'created_at', 'updated_at'];

    protected $personas = ['idpersona','nombre', 'apellidos', 'edad','created_at', 'created_at', 'updated_at'];
}
