@extends('layouts.layout1')

@section('title','Create new pizza')

@section('content')
    <h1>Crea una nuova pizza</h1>

    <form action="{{ route('insert.pizza') }}" method="POST">
        @csrf

        <div class="col-md-4">
            <label for="gusto" class="form-label">Gusto</label>
            <input type="text" class="form-control" value="{{ old('gusto') }}" id="gusto" name="gusto" required>
            @error('gusto')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="prezzo" class="form-label">Prezzo</label>
            <input type="number" class="form-control" value="{{ old('prezzo') }}" id="prezzo" name="prezzo" required>
            @error('prezzo')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="active" class="form-label">Active</label>
            <select class="form-select" id="active" name="active" required>
                <option selected value="1">Si</option>
                <option value="0">No</option>
            </select>
            @error('active')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary mt-3">Crea</button>
    </form>

@endSection;
