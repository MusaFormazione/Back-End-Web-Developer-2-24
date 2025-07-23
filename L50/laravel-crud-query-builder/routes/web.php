<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PizzaController::class,'index'])->name('pizza.index');

Route::get('/new-pizza', [PizzaController::class,'create'])->name('pizza.create.form');
//Se il metodo create restituisce semplicemente la view allora considera di semplificare utilizzado il metodo Route::view() come vedi qui sotto:
// Route::view('/new-pizza','create')->name('pizza.create.form');


Route::get('/pizza/{id}/edit/', [PizzaController::class,'edit']);

//rotta per il salvataggio della nuova pizza
Route::post('/pizza/insert',[PizzaController::class,'store']);

//rotta per l'aggiornamento di una pizza esistente
Route::put('/pizza/{id}/update/',[PizzaController::class,'update']);

//rotta per l'eliminazione di una pizza esistente
Route::delete('/pizza/{id}/delete/', [PizzaController::class,'destroy']);
