<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PizzaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');


/**
 * Creare le rotte CRUD per le pizze
 */
// Route::get('/pizza',[PizzaController::class, 'index']);
// Route::get('/pizza/{id}',[PizzaController::class, 'show']);
// Route::post('/pizza',[PizzaController::class, 'store']);
// Route::put('/pizza/{id}',[PizzaController::class, 'update']);
// Route::delete('/pizza/{id}',[PizzaController::class, 'destroy']);

//Se il tuo controller è RESTful, ed i metodi hanno i nomi prestabiliti da questo tipo di controller, allora scrivere questa riga di codice è come scrivere tutte quelle precedenti, Puoi verificare lanciando il comando php artisan route:list
// Route::apiResource('/pizza',PizzaController::class);
// Dato che apiResouce() crea tutti gli endpoint sopra citati, può essere necessario escluderne qualcuno talvolta, e questa cosa puoi farla con il metodo except() che puoi concatenare direttamente ad apiResource()
// ->except(['index']);

//La protezione delle rotte Richiede l'utilizzo di un middleware per ogni rotta(auth:sanctum), Se ti accorgi di avere numerose rotte che adoperano lo stesso middleware, allora puoi usare il formato che vedi qui sotto.
Route::middleware('auth:sanctum')->group(function(){

    // Tutte le rotte che vengono create all'interno di questa funzione devono passare al vaglio del middleware auth:sanctum O di qualunque altro middleware tu abbia attivato
    // Route::get('/pizza',[PizzaController::class, 'index']);
    // Route::get('/pizza/{id}',[PizzaController::class, 'show']);
    // Route::post('/pizza',[PizzaController::class, 'store']);
    // Route::put('/pizza/{id}',[PizzaController::class, 'update']);
    // Route::delete('/pizza/{id}',[PizzaController::class, 'destroy']);

    Route::apiResource('/pizza',PizzaController::class);
    Route::post('logout', [AuthController::class, 'logout']);

});


//Poniamoci nella situazione in cui si voglia permettere di mostrare le pizze anche al pubblico non registrato.
//Ad esempio, se c'è bisogno di creare una pagina menù per il ristorante, le pizze dovranno essere visibili anche al pubblico
