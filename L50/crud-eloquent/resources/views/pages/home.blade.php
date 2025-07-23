@extends('layouts.layout1')

@section('title','Lista pizze - Home')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>Gusto</td>
                <td>Prezzo</td>
                <td>Stato</td>
                <td>Azioni</td>
            </tr>
        </thead>
        <tbody>
            @foreach($pizzas as $pizza)
                <tr>
                    <td> {{$pizza->id}} </td>
                    <td> {{$pizza->gusto}} </td>
                    <td> {{$pizza->prezzo}} </td>
                    <td> {{$pizza->active ? 'Attivo' : 'Non attivo'}} </td>
                    <td>
                        <a href="" class="btn btn-info">Modifica</a>
                        <a href="" class="btn btn-danger">Elimina</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endSection;
