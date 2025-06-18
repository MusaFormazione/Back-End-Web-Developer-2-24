<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/pagina-2', function () {
    $pizze = [
        'Margherita',
        'Capricciosa',
        'Diavola',
        'Quattro Stagioni',
    ];
    return view('cartella-esempio.pagina-annidata', $pizze);
});

//Potevo anche scrivere così:
// Route::view('/pagina-2', 'cartella-esempio.pagina-annidata');
//Il metodo statico View della classe Route è comodo da utilizzare se effettivamente la rotta deve restituire una vista statica senza alcun funzionamento preliminare
