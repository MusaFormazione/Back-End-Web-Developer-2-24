@extends('v1.layouts.layout2')

@section('title','Pagina 3')


@section('content')

    <h1>Pagina 3</h1>

    @for ($i = 0; $i < 10; $i++)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Card {{ $i }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @endfor

@endsection


@section('sidebar')

    <h2>Sidebar Pagina 3</h2>
    <p>This is the sidebar content for pagina 3.</p>

    <ul>
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
    </ul>

@endsection
