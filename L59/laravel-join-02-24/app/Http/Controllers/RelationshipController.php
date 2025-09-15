<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class RelationshipController extends Controller
{


        /**
         * metodo per la relazione one-to-one (User -> Profile)
         */
        public function userProfile(int $id){
            $user = User::with('profile')->find($id);//traduzione in italiano: Recupera i dati di uno User con il suo profile; lo user a cui mi riferisco è quello con questo specifico ID

            return response()->json([
                "user" => $user,
                "profile" => $user->profile
            ]);
        }

        /**
         * Metodo per la relazione One to many (User -> Order)
         */
        public function userOrders(int $id){
            $user = User::with('orders')->find($id);
            return response()->json([
                "user" => $user,
                "orders" => $user->orders
            ]);
        }

        /**
         * Metodo per la relazione many to many
         */

        public function orderProducts(int $id){

            $order = Order::with('product')->find($id);

            return response()->json([
                "order" => $order,
                "products" => $order->products
            ]);
        }

}
