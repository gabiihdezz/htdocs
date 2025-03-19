<?php
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AgendaController;

Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
Route::get('/imagenes', [ImagenController::class, 'index'])->name('imagenes.index');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::get('/', function () {
    return view('index');
})->name('home');
