<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class RelationshipController extends Controller
{


        /**
         * metodo per la relazione one-to-one (User -> Profile)
         * dato l'id di un utente restituisce il profilo
         */
        public function userProfile(int $id){
            $user = User::with('profile')->find($id);//traduzione in italiano: Recupera i dati di uno User con il suo profile; lo user a cui mi riferisco è quello con questo specifico ID

            if (!$user) {
                return response()->json([
                    "error" => "Utente non trovato"
                ], 404);
            }

            return response()->json([
                "user" => $user,
                "profile" => $user->profile
            ]);
        }

        /**
         * Metodo per la relazione One to many (User -> Order)
         * restituisce gli ordini di un dato utente
         */
        public function userOrders(int $id){
            $user = User::with('orders')->find($id);

            if (!$user) {
                return response()->json([
                    "error" => "Utente non trovato"
                ], 404);
            }

            return response()->json($user->orders);
        }

        /**
         * Metodo per la relazione many to many
         * restituisce ordini comprensivi di prodotti
         */

        public function orderProducts(int $id){

            $order = Order::with('products')->find($id);

            if (!$order) {
                return response()->json([
                    "error" => "Ordine non trovato"
                ], 404);
            }


            return response()->json([
                "order" => $order,
                "products" => $order->products
            ]);
        }

}
