<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    // Asegurarse de que los campos son asignables masivamente
    protected $fillable = ['idpersona', 'idimagen', 'fecha', 'hora'];

    // Relación con el modelo Personas
    public function persona()
    {
        return $this->belongsTo(Personas::class, 'idpersona');
    }

    // Relación con el modelo Imagenes
    public function imagen()
    {
        return $this->belongsTo(Imagenes::class, 'idimagen');
    }

public function up()
{
    Schema::create('agenda', function (Blueprint $table) {
        $table->id();  // Clave primaria
        $table->foreignId('idpersona')->constrained('personas');  // Relación con la tabla personas
        $table->foreignId('idimagen')->constrained('imagenes');  // Relación con la tabla imagenes
        $table->date('fecha');  // Columna de fecha
        $table->time('hora');   // Columna de hora
        $table->timestamps();  // Campos de fecha de creación y actualización
    });
}

}

