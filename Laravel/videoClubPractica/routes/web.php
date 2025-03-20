<?php
use Illuminate\Support\Facades\Route; // 👈 Agrega esta línea
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AgendaController;

Route::get('/personas', [PersonaController::class, 'index'])->name('catalog.persona');
Route::get('/imagenes', [ImagenController::class, 'index'])->name('catalog.imagen');
Route::get('/agenda', [AgendaController::class, 'index'])->name('catalog.agenda');
Route::get('/', function () {
    return view('index');
})->name('home');
