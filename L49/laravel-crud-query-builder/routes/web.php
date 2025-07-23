<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PizzaController::class,'index'])->name('pizza.index');

Route::get('/new-pizza', [PizzaController::class,'create'])->name('pizza.create.form');

Route::post('pizza/insert',[PizzaController::class,'store']);

Route::get('/pizza/{id}/edit/', [PizzaController::class,'edit']);

Route::put('pizza/{id}/update/',[PizzaController::class,'update']);

Route::delete('/pizza/{id}/delete/', [PizzaController::class,'destroy']);
