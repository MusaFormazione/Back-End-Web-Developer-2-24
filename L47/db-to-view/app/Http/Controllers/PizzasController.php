<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzasController extends Controller
{

    /**
     * Restituisce tutte le pizze presenti nel database
     *
     */
    public function index(){
        //Recuperiamo tutte le pizze del database.
        $pizzas = Pizza::all();//La classe pizza non è altro che il nostro model che si trova in App/Models/Pizza.php
        //all() È il metodo statico di eloquente che ci restituisce tutte le pizze nel database

        //Ora che abbiamo i dati restituiamo una vista che potrà gestirli
        return view('v1.pages.tabella-pizze',compact('pizzas'));
    }

    private function getPizzasByActiveStatus(int $status){
        //Seleziono tutte le pizze che hanno active uguale a 1
        //SELECT * from pizzas WHERE active = 1
        $pizzas = Pizza::where('active',$status)->get();

        return $pizzas;
    }

    public function availablePizzas(){
        $pizzas = $this->getPizzasByActiveStatus(1);

        return view('v1.pages.tabella-pizze',compact('pizzas'));
    }

    public function unavailablePizzas(){
        $pizzas = $this->getPizzasByActiveStatus(0);

        return view('v1.pages.tabella-pizze',compact('pizzas'));
    }

    public function pizzaJson(){
        $pizzas = Pizza::all();
        //In questo caso non restituisco una vista
        //Restituendo direttamente una variabile, Se è compatibile, questa verrà convertita in Json
        return $pizzas;
    }

}
