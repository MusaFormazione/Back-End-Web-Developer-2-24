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
                        <form class="delete-form" action="{{ route('delete.pizza',$pizza->id) }}" method="POST">
                            {{-- provare a farlo con js --}}
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const deleteForms = document.querySelectorAll('delete-form');

        deleteForms.forEach(form => {
            form.addEventListener('submit', (e) => {
                e.preventDefault();//blocco invio del form
                const action = e.target.action;
                //
                fetch(action, {
                    method:'DELETE',
                    body: JSON.stringify()
                })
                .then(res => res.json())

            })
        })
    </script>
@endSection;
