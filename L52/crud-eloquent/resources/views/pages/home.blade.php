@extends('layouts.layout1')

@section('title','Lista pizze - Home')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Gusto</th>
                <th>Prezzo</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pizzas as $pizza)
                <tr>
                    <td> {{$pizza->id}} </td>
                    <td> {{$pizza->gusto}} </td>
                    <td> {{$pizza->prezzo}} € </td>
                    <td> {{$pizza->active ? 'Attivo' : 'Non attivo'}} </td>
                    <td>
                        <a href="{{ route('edit.pizza.form',$pizza->id) }}" class="btn btn-info">Modifica</a>
                        {{-- <form class="delete-form" action="{{ route('delete.pizza',$pizza->id) }}" method="POST">
                            Durante il Live Coding abbiamo disabilitato questo Form con Javascript. Questo per mostrare come è possibile introdurre javascript all'interno di queste applicazioni monolitiche(dove il template è costruito con Blade), ottenendo quindi la velocità di sviluppo del template di Blade pur godendo della dinamicità di javascript.

                            Quindi se vuoi testare questo Form senza Javascript decommenta questo form, e commenta il bottone sotto
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form> --}}
                        <button data-csrf="{{ csrf_token() }}" data-url="{{ route('delete.pizza',$pizza->id) }}" class="delete-button btn btn-danger">Elimina</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        //Cerco tutti i Form di eliminazione della pagina.
        const deleteButtons = document.querySelectorAll('.delete-button');

        //Ciclo tutti i bottoni
        deleteButtons.forEach(button => {
            //Ad ogni bottone aggiungo l'evento click che invierà che invierà la richiesta di eliminazione .
            button.addEventListener('click', (e) => {
                //Chiedo all'utente conferma utilizzando confirm (Ma è meglio utilizzare soluzioni più moderne, come ad esempio popup fatti a mano o SweetAlert )
                if(!confirm("Sei sicuro/a di voler eliminare la pizza?")) return;

                const url = button.getAttribute('data-url');//Recupero l'url che è scritto direttamente sul tag da PHP
                const csrfToken = button.getAttribute('data-csrf')//Recupero il CSF anch'esso scritto direttamente sul tag di PHP come attributo personalizzato

                //Eseguo la patch all'url recuperato poc'anzi.
                fetch(url, {
                    method:'POST',//Imposto come mithod, post perché stiamo facendo un'APP monolitica basata su csrf token
                    headers: {//Questi sono gli headers necessari perché la richiesta vada a buon fine in laravel
                        "Content-type":"application/json",
                        "X-CSRF-TOKEN":csrfToken,//La variabile CSRF Token l'abbiamo recuperata poco più in alto.
                        "accept":'application/json'
                    },
                    body: JSON.stringify({
                        _method: 'DELETE'//Invio manualmente il method sotto forma di body, come avremmo fatto con il Form
                    })
                })
                .then(res => {
                    if(!res.ok){
                        console.error('Errore durante l\'eliminazione');
                        return;
                    }

                    //Se la richiesta va a buon fine, cerco la <tr></tr> più vicina al Button, che sarà per forza di cose la <tr></tr> in cui si trova e poi la elimino così che scompaia dal markup
                    button.closest('tr').remove();

                    return res.text();//Dato che questo progetto Laravel non è preparato a dare risposte json, io qua riceverò una pagina HTML, quindi la decodifico con il metodo text() (che è asincrono) e quindi la restituisco in modo che il prossimo then() possa attendere che la promise si sia risolta prima di continuare.
                })
                .then(htmlResponse => {

                    //In questa funzione cerchiamo di recuperare il messaggio di successo stampato direttamente da Laravel all'interno della pagina HTML che riceviamo come risposta
                    //La risposta HTML è elaborata come testo grezzo, noi sappiamo che all'interno c'è dell'HTML, ma per javascript è una semplice stringa, quindi dobbiamo procedere a convertirla in oggetti DOM con questo trucchetto.

                    //Prima di tutto crea un elemento qualsiasi del dom al volo con create element.
                    const tempDiv = document.createElement('div');
                    //Assegna la stringa come contenuto HTML di questo elemento appena creato.
                    tempDiv.innerHTML = htmlResponse;

                    //Ora abbiamo convertito quello che era del semplice testo in oggetto DOM.
                    //Quindi il contenuto della risposta di questa chiamata ora è il è all'interno del tempo e poi cercare al suo interno utilizzando querySelector.
                    const messaggio = tempDiv.querySelector('#notifica').innerText;

                    //Hai ottenuto il messaggio e puoi mostrarlo all'utente
                    alert(messaggio.trim());

                })
                .catch(error => {
                    console.error('Errore:',error);
                    alert('Si è verificato un errore durante l\'eliminazione della pizza');
                })

            })
        })
    </script>
@endSection;
