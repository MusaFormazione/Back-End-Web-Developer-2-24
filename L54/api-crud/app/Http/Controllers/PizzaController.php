<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

    protected $notFoundMessage = ['error' => 'Pizza non trovata'];

    /**
     * Get All -> restituisce tutte le pizze
     */
    public function index()
    {
        $pizze = Pizza::all();
        return response()->json($pizze);
    }


    /**
     * POST -> crea una pizza
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'gusto' => 'required|max:255',
            'prezzo' => 'required|numeric|min:0'
        ]);

        $pizza = Pizza::create($validated);
        return response()->json($pizza, 201);
    }

    /**
     * Get singola -> mostra la pizza specificata
     */
    public function show(int $id)
    {
        $pizza = Pizza::find($id);

        if(!$pizza) return response()->json($this->notFoundMessage, 404);

        return response()->json($pizza);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $pizza = Pizza::find($id);

        if(!$pizza) return response()->json($this->notFoundMessage, 404);

        $validated = $request->validate([
            'gusto' => 'required|max:255',
            'prezzo' => 'required|numeric|min:0'
        ]);

        //Se stai creando una richiesta di tipo patch, allora dovresti togliere required dalle validazioni.
        // $validated = $request->validate([
        //     'gusto' => 'required|max:255',
        //     'prezzo' => 'required|numeric|min:0'
        // ]);

        $pizza->update($validated);

        return response()->json($pizza);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pizza = Pizza::find($id);

        if(!$pizza) return response()->json($this->notFoundMessage, 404);

        $pizza->delete();

        return response()->json(['success' => 'Pizza Eliminata']);
    }
}
