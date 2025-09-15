<?php

use App\Http\Middleware\CheckUnavailablePizza;
use App\Http\Middleware\MaintenanceMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PizzaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/pizza',PizzaController::class)->except('show');

// Route::post('/pizza',[PizzaController::class, 'store'])->middleware(MaintenanceMode::class);
Route::get('/pizza/{id}',[PizzaController::class, 'show'])->middleware('check.unavailable');



