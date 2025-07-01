<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('v1.welcome');
});

Route::get('/pagina2', function () {
    return view('v1.pagina2');
});


Route::get('/pagina3', function () {
    return view('v1.pagina3');
});
