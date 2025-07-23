<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;

//La pagina contenente la lista delle pizze
Route::get('/', [PizzaController::class,'index'])->name('home');
//La pagina contenente il form per aggiungere una pizza
Route::view('/new-pizza','pages.create')->name('create.pizza.form');
//La pagina contenente il form per modificare una pizza
Route::get('/pizza/{id}/edit', [PizzaController::class,'edit'])->name('edit.pizza.form');

//Richiesta di inserimento nuova pizza
Route::post('/insert-pizza',[PizzaController::class,'store'])->name('insert.pizza');
//Richiesta di mofifica di una pizza esistente
Route::put('/pizza/{id}',[PizzaController::class,'update'])->name('update.pizza');
//Richiesta di eliminazione di una pizza
Route::delete('/pizza/{id}',[PizzaController::class,'destroy'])->name('delete.pizza');


