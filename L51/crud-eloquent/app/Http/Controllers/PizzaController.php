<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pages.home',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     * NON USATO, stiamo usando una view per il form di creazione
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'gusto' => 'required|max:255',
            'prezzo' => 'required|numeric|min:0',
            'active' => 'required|numeric|min:0|max:1'
        ]);//Se la validazione non va a buon fine il resto della funzione non viene eseguita, e veniamo reindirizzati alla posizione da cui è partita la richiesta

        //Posso recuperare i dati dalla request utilizzando il metodo only, essendo sicuro di ottenere dati puliti, in questo caso solo gusto, prezzo, active
        //$request->only(['gusto','prezzo','active'])
        // Pizza::create($request->only(['gusto','prezzo','active']));

        //In alternativa è sempre possibile utilizzare la variabile $validated che contiene i dati sanificati
        // Pizza::create($validated);

        //altro sistema per creare
        $pizza = new Pizza();//Crea un'istanza di Pizza basandomi sul rispettivo Model (class Pizza)
        $pizza->gusto = $validated['gusto'];
        $pizza->prezzo = $validated['prezzo'];
        $pizza->active = $validated['active'];

        $pizza->save();

        return redirect()->route('home')->with('success',"Pizza \"{$pizza->gusto}\" creata con successo");

    }

    /**
     * Display the specified resource.
     * NON USATO, non abbiamo pagine dettaglio pizza
     */
    // public function show(Pizza $pizza)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     * //rotta pizza/{id}/edit
     */
    public function edit(int $id)
    {
        $pizza = Pizza::find($id);
        return view('pages.edit',compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'gusto' => 'required|max:255',
            'prezzo' => 'required|numeric|min:0',
            'active' => 'required|numeric|min:0|max:1'
        ]);

        Pizza::find($id)
        ->update($validated);

        //usando direttamente un'istanza di Pizza
        // $pizza = Pizza::find($id);
        // $pizza->gusto = $request->gusto;
        // $pizza->prezzo = $request->prezzo;
        // $pizza->active = $request->active;
        // $pizza->save();
        return redirect()->route('home')->with('success',"Pizza \"{$validated['gusto']}\" aggiornata con successo");
    }


    public function patch(Request $request, int $id){
        //Questa funzione è una bozza di Aggiornamento patch al database
        //Potrebbe essere così una funzione adoperata per fare aggiornamenti parziali ad un oggetto
        $pizza = [];

        if($request->gusto) $pizza['gusto'] = $request->gusto;
        if($request->prezzo) $pizza['prezzo'] = $request->prezzo;
        if($request->active) $pizza['active'] = $request->active;

        Pizza::find($id)->update($pizza);
        return redirect()->route('home')->with('success',"Pizza aggiornata con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Pizza::destroy($id);
        return redirect()->route('home')->with('success','Pizza Eliminata con successo');
    }
}
