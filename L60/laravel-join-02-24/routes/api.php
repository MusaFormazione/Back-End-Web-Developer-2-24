<?php

use App\Http\Controllers\RelationshipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/user/{id}/profile/', [RelationshipController::class, 'userProfile']);

//Talvolta è necessario creare rotte contenenti numerosi indici, sopratutto se sono coinvolte relazioni (come la uno a molti sottostante)
//Occorre sapere lo userId e l'id della fattura per poter accedere a quest'ultima
// Route::get('/user/{userId}/invoice/{invoiceId}', [RelationshipController::class, 'userInvoice']);


Route::get('/user/{id}/orders', [RelationshipController::class,'userOrders']);
Route::get('/order/{orderId}',[RelationshipController::class, 'orderProducts']);
