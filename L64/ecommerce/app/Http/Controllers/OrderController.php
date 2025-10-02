<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    /**
     * Crea un nuovo ordine con prodotti associati
     *
     * Questo metodo permette a un customer autenticato di creare un ordine contenente uno o più prodotti con le relative quantità.
     */
    public function createOrder(Request $request){

        //Verifichiamo che la richiesta contenga un arredi prodotti validi.
        $validated = $request->validate([
            'products' => 'required|array|min:1', //Deve essere un array con almeno un elemento.
            'product.*.product_id' => 'required|exists:products,id',//Ogni prodotto deve esistere nel database.
        ]);

        try{

            //Inizio una transazione
            //Usiamo una transazione per garantire che tutte le operazioni vengano eseguite o che nessuna venga eseguita in caso di errore.
            DB::beginTransaction();

            // Creazione dell'ordine(Creiamo il record ordine nella tabella orders. )
            $order = Order::create([
                'user_id' => auth()->user()->id, //ID dell'utente autenticato (Usando auth())
            ]);

            //Per ogni prodotto nella richiesta, creiamo una relazione many-to-many nella tabella pivot 'order_products'.
            foreach($validated['product'] as $productData){
                $order->products()->attach($productData['product_id'], [
                    'quantity' => $productData['quantity']
                ]);
            }

            //Se tutto è andato bene, confermiamo le modifiche al database.
            DB::commit();

            //Carichiamo i dati correlati prodotti e utente per la risposta completa
            $order->load(['products','user']);

            return response()->json([
                'order' => $order
            ], 201);

        }catch(\Exception $e){
            //In caso di errore annulliamo tutte le modifiche al database
            DB::rollBack();
            return response()->json(['error' => 'Errore durante la creazione dell\'ordine', 'message' => $e->getMessage()], 500);
        }

    }
    public function getUserOrders(){

    }

    public function getAllOrdersAdmin(){

    }

    public function getOrderByIdAdmin(int $id){

    }


    public function getUserOrderById(int $id){

    }

}
