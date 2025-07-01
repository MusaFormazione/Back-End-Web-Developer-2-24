<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('/each-pizze', 'each');


Route::get('/pizze',function(){

    return [
        [
            "gusto"=>"margherita",
            "prezzo"=>5
        ],
        [
            "gusto"=>"Diavola",
            "prezzo"=> 1
        ],
        [
            "gusto"=>"marinara",
            "prezzo"=>4
        ]
    ];
});

Route::get('/pizze/{index}',function($index){

    $pizze = [
        [
            "gusto"=>"margherita",
            "prezzo"=>5
        ],
        [
            "gusto"=>"Diavola",
            "prezzo"=> 1
        ],
        [
            "gusto"=>"marinara",
            "prezzo"=>4
        ]
    ];

    return $pizze[$index];
});
