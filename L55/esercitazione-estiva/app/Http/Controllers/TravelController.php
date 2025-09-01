<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{

    private $notFoundTravelError = ['error' => 'Not found'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $travels = Travel::all();

        return response()->json($travels);
    }

    public function uploadImage(Request $request){
        $file = $request->file('immagine');
        $ext = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();

        $imagePath = $file->storeAs('travels', $fileName, 'public');

        return $imagePath;
    }

    /**
     * creazione nuovo viaggio e upload dell'immagine
     */
    public function store(Request $request)
    {
        // ricorda una validazione come questa
        //  $data = $request->validate([
        //     ...gli altri campi
        //     'immagine'       => ['image','max:1920','mimes:jpeg,png,jpg,webp,avif'],
        // ]);
        //gestione dell'upload


        $imagePath = $this->uploadImage($request);


        $travel = Travel::create([
            'titolo' => $request['titolo'],
            'destinazione' => $request['destinazione'],
            'data_partenza' => $request['data_partenza'],
            'data_ritorno' => $request['data_ritorno'],
            'prezzo' => $request['prezzo'],
            'descrizione' => $request['descrizione'],
            'immagine' => $imagePath
        ]);

        return response()->json($travel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $travel = Travel::find($id);

        if(!$travel) return response()->json($this->notFoundTravelError,404);

        return response()->json($travel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $travel = Travel::find($id);

        if(!$travel) return response()->json($this->notFoundTravelError, 404);

        // $validated = $request->validate([
        //     'titolo' => 'required|string',
        //     'prezzo' => 'required|numeric|min:0'
        // ]);
        /**
         *
         * In fase di aggiornamento è ragionevole pensare che gli utenti vogliano anche poter cambiargli l'immagine caricata in fase di creazione del viaggio, quindi in quel caso qui, nella richiesta di Update, bisogna anche verificare se c'è un'immagine e se questa c'è ripetere le operazioni di caricamento.
         * Consiglio: Se ti ritrovi a scrivere lo stesso codice per l'upload, allora ti conviene creare un metodo che si occupi di fare l'upload immagine e riutilizzarlo in fase di creazione e in fase di aggiornamento del viaggio.
         *
         */
        if($request->hasFile('immagine')){
            $imagePath = $this->uploadImage($request);
            $travel->immagine = $imagePath;
        }

        $travel->update($request->only(['titolo','destinazione','prezzo','data_partenza','data_ritorno','descrizione']));

        return response()->json($travel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $travel = Travel::find($id);

        if(!$travel) return response()->json($this->notFoundTravelError,404);

        $travel->delete();

        return response()->json(['message'=>'Viaggio eliminato']);
    }
}
