<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    private $table = 'pizzas';
    //Recupera tutte le pizze dal database e le passa alla vista
    public function index(){
        $pizzas = DB::table($this->table)->get();
        return view('welcome',compact('pizzas'));
    }

    //Se vuoi utilizzarlo questo metodo restituisce la vista contenente il Form di creazione delle pizze
    //Non confonderlo con il metodo che crea le pizze
    public function create(){
        return view('welcome');
    }

    //Salva una nuova pizza nel database
    public function store(Request $request){

        $validated = $request->validate([
            'gusto' => 'required|unique:pizzas,gusto|max:255',
            'prezzo' => 'required|numeric|min:0'
        ]);

        DB::table($this->table)
        ->insert([
            'gusto' => $request->gusto,
            'prezzo' => $request->prezzo,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //puoi anche usare i dati validati da validate()
        // DB::table($this->table)
        // ->insert($validated);

    }

    //Mostra la pizza specificata
    public function show(int $id){

    }
    //Mostra il Form per modificare la pizza specificata
    public function edit(int $id){}
    //Aggiorna la pizza specificata a livello del database
    public function update(Request $request, int $id){}

    //Elimina la pizza specificata dal database
    public function destroy(int $id){}

}
