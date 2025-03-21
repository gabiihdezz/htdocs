<?php
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\AgendaController;

Route::get('/persona', [PersonasController::class, 'index'])->name('catalog.persona');
Route::get('/imagen', [ImagenesController::class, 'index'])->name('catalog.imagen');
Route::get('/agenda', [AgendaController::class, 'index'])->name('catalog.agenda');
Route::get('/', function () {
    return view('index');
})->name('home');

