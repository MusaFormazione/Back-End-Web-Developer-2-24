@extends('layouts.layout1')

@section('title','Edit Pizza')

@section('content')
     <h1>Modifica la pizza "{{$pizza->gusto}}"</h1>

    <form action="{{ route('update.pizza', $pizza->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-md-4">
            <label for="gusto" class="form-label">Gusto</label>
            <input type="text" class="form-control" value="{{ $pizza->gusto }}" id="gusto" name="gusto" required>
            @error('gusto')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" value="{{ $pizza->prezzo }}" id="prezzo" name="prezzo" required>
            @error('prezzo')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="active" class="form-label">Active</label>
            <select class="form-select" id="active" name="active" required>
                <option {{ $pizza->active === 1 ? 'selected' : '' }} value="1">Si</option>
                <option {{ $pizza->active === 0 ? 'selected' : '' }} value="0">No</option>
            </select>
            @error('active')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary mt-3">Salva</button>
    </form>
    <hr>
    <a href="{{ route('home') }}" class="btn btn-warning">Torna alla home</a>
@endSection;
