<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas'; // Confirma que la tabla en la BD se llama 'personas'

    protected $primaryKey = 'idpersona'; // SOLO si la clave primaria no se llama 'id'

    protected $fillable = ['nombre', 'apellidos'];
}
