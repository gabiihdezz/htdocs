<?php
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;



Route::get('/', function (): View {
    return view('welcome');
});

// Ruta para pagina1
Route::get('/login', function ():string  {
    return ('Pantalla principal');
});

Route::get('/logout', function (): string {
    return('Logout del usuario ');
});

Route::get('/catalog', function (): string {
    return( 'Listado de peliculas');
});

Route::get('/catalog/show/{id?}', function (): string {
    return( 'Listado de peliculas');
});

// Ruta para user con parámetro opcional
Route::get('/catalog/create', function (): string {
    return( '   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catalog</title>
        <style>
            header{
                padding:40px;
                color:white;    
            }
            *{
                text-align:center;
                color:white;
                font-size:20px;
                background-color: black;
                font-family: \'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif
            };
        </style>
    </head>
    <body>
        <header>
            <div>Menu</div>
            <a href="../catalog">Catalog</a>
            <a href="../login">Login</a>
            <a href="../logout">Logout</a>
        </header>
        <div>
            Bienvenido al apartado de añadir películas: 
        </div>
        <div>
            Hola <?php echo $nombre; ?>!
        </div>
    </body>
    </html>');
});

Route::get('/catalog/edit/{id?}', function (): string {
    return( 'Modificar peliculas');
});
