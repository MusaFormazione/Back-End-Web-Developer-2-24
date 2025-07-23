<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    private $table = 'pizzas';
    //Recupera tutte le pizze dal database e le passa alla vista
    public function index(){
        $pizzas = DB::table('pizzas')->get();
        return view('index',compact('pizzas'));
    }

    //Se vuoi utilizzarlo questo metodo restituisce la vista contenente il Form di creazione delle pizze
    //Non confonderlo con il metodo che crea le pizze
    public function create(){
        return view('create');
    }

    //Salva una nuova pizza nel database
    public function store(Request $request){

        $validated = $request->validate([
            'gusto' => 'required|unique:pizzas,gusto|max:255',
            'prezzo' => 'required|numeric|min:0'
        ]);


        //versione usando direttamente la request(non sanificato: pericoloso)
        // DB::table($this->table)
        // ->insert([
        //     'gusto' => $request->gusto,
        //     'prezzo' => $request->prezzo,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        //puoi usare i dati validati e sanificati dal metodo validate()
        $validated['created_at'] = now();
        $validated['updated_at'] = now();
        DB::table($this->table)
        ->insert($validated);

        return redirect()->route('pizza.index')->with('success','Pizza creata con successo');
    }

    //Mostra la pizza specificata
    public function show(int $id){
        $pizza = DB::table($this->table)->find($id);

        return view('show', compact('pizza'));
    }

    //Mostra il Form per modificare la pizza specificata
    public function edit(int $id){
        $pizza = DB::table($this->table)->find($id);

        return view('edit', compact('pizza'));
    }

    //Aggiorna la pizza specificata a livello del database
    public function update(Request $request, int $id){
        $validated = $request->validate([
            // 'gusto' => 'required|unique:pizzas,gusto|max:255',
            'prezzo' => 'required|numeric|min:0'
        ]);

        $validated['updated_at'] = now();

        DB::table($this->table)
        ->where('id',$id)
        ->update($validated);

        return redirect()->route('pizza.index')->with('success','Pizza aggiornata con successo');
    }

    //Elimina la pizza specificata dal database
    public function destroy(int $id){
        DB::table($this->table)->where('id',$id)->delete();
        return redirect()->route('pizza.index')->with('success','Pizza eliminata con successo');
    }

}
