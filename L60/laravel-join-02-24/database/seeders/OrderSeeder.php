<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Questo seeder inserisce 2 ordini per ogni utente presente a db
        //Agli ordini vengono assegnati dei prodotti in quantità variabile(randomica)
        //la quantità di ogni prodotto per gli ordini è anch'essa impostata randomicamente

        //Per prima cosa devo prelevare tutti gli users e products grazie all'utilizzo di Eloquent
        $users = User::all();
        $products = Product::all();

        //ciclo gli utenti
        foreach($users as $user){

            //ciclo per assegnare ad ogni utente 2 ordini
            for($i = 0; $i < 2; $i++){

                //per ogni iterazione genero un ordine
                $order = Order::create([
                    'user_id' => $user->id,//il singolo user della collection ottenuta alla riga 24, è di fatto un oggetto contenente i valori delle colonne sotto forma di attributo
                    'status' => 'Completato'//imposto tutti gli status a completato solo per brevità
                ]);

                //ora che ho inserito l'ordine, devo assegnare ad esso un certo numero di prodotti, data la natura "di test" di questi dati, seleziono randomicamente anche questi
                //per farlo adopero il metodo random degli oggetti di Eloquent
                //$products è ottenuto da una query Eloquent, quindi dispone di numerosi metodi utili
                //Il metodo random() richiede un numero come argomento (il numero di prodotti che si vuole ottenere)
                //in questo caso usiamo come argomento rand() che è una funzione base di php che genererà il numero per noi
                //rand(1,3) genererà un risultato randomico numerico con valore da 1 a 3 compresi
                $orderProducts = $products->random(rand(1,3));

                //ora che ho i prodotti vado a ciclarli, perchè è necessario inserire la relazione nella tabella pivot order_products
                foreach($orderProducts as $selectedProduct){
                    //attach() Identifica la tabella pivot in automatico in base alle regole di naming e genera al suo interno un nuovo entry
                    //attach offre anche la possibilità di utilizzare l'argomento "attributes" (il secondo argomento), qualora volessimo quindi valorizzare colonne aggiuntive che non sono chiavi esterne e che quindi non sono prese in causa automaticamente con la join, allora è possibile passare un array di ulteriori colonne (Nell'esempio sotto, di fatto stiamo passando una re aggiuntivo contenente la chiave quantity, che corrisponde alla colonna omonima della tabella pivot)

                    //products() => Metodo che definisce la relazione tra prodotti e ordini, lo abbiamo definito all'interno della classe(modello) Order(app/Models/Order.php)
                    //Ricordati quindi di andare a definire prima i metodi di relazione per poter terminare il Seeder se questo sfrutta una tabella pivot o ha altre relazioni

                    $order->products()->attach($selectedProduct->id, [
                        'quantity' => rand(1,5)//definitamo randomicamente una quantità da 1 a 5 per ogni prodotto dell'ordine
                    ]);

                }

            }


        }


    }
}
