<?php
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\CatalogController;



Route::get('/', [HomeController::class, 'getHome']);
Route::get('login', function($username){
    return view ('auth.login', array('username'=>$username));
});

Route::get('logout', function($username){
    return 'Logout';
});

Route::get('/', [CatalogController::class, 'getIndex']);
Route::get('/catalog/show/{id}', [CatalogController::class, 'getShow']);
Route::get('/catalog/create', [CatalogController::class, 'getCreate']);
Route::get('/catalog/edit/{id}', [CatalogController::class, 'getEdit']);
Route::get('/catalog/edit', [CatalogController::class, 'postEdit'])-> name('edit.movie');

