<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    // Indicar que la clave primaria es 'idimagen' en lugar de 'id'
    protected $primaryKey = 'idimagen';

    // Si no estás usando 'timestamps', puedes desactivar la gestión automática de created_at y updated_at
    public $timestamps = false; // O dejar en true si deseas que Laravel gestione created_at y updated_at
}
