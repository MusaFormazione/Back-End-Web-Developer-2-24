<?php

use App\Http\Controllers\PizzasController;
use Illuminate\Support\Facades\Route;

//Il metodo name() Permette di dare un nome a tua scelta alla rotta a cui è assegnato, tale nome potrà poi essere utilizzato all'interno delle viste Come riferimento diretto.
//Utilizzando la funzione route() All'interno delle tue viste le dinamicizzerai e ti assicurerai che al cambiare dell'uri della rotta, i link che hai inserito nelle viste continuino a funzionare, e a puntare verso l'indirizzo giusto

Route::get('/', [PizzasController::class, 'index'])->name('home');

Route::get('/pizze-disponibili', [PizzasController::class,'availablePizzas'])->name('pizze-disponibili');

Route::get('/pizze-non-disponibili', [PizzasController::class,'unavailablePizzas'])->name('pizze-non-disponibili');

Route::get('/pizze-json', [PizzasController::class, 'pizzaJson'])->name('json');
