@extends('v1.layout.layout')

@section('seo-title', 'Home - Lista pizze')

@section('content')

    <h1>Lista Pizze</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Gusto</th>
                <th>Prezzo</th>
                <th>Attiva?</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pizzas as $pizza)
                <tr>
                    <td>{{ $pizza['id'] }}</td>
                    <td>{{ $pizza['gusto'] }}</td>
                    <td>{{ $pizza['prezzo'] }}</td>
                    <td>{{ $pizza['active'] ? 'Si' : 'No'}}</td>
                    <td>
                        <a href="/pizza-detail/{{ $pizza['id'] }}" class="btn btn-info">Mostra</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
