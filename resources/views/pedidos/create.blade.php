@extends('layouts.app')

@section('title', 'Crear Pedido')

@section('content')

<div class="container">
    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>CREAR PEDIDO</h1>

    <form action="{{ route('pedido.store') }}" method="POST">
        @csrf   

        <br>
        <div class="mb-3">
            <label for="estado">Estado del Pedido</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="">Seleccione un estado</option>
                <option value="pendiente">Pendiente</option>
                <option value="completado">Completado</option>
                <option value="cancelado">Cancelado</option>
            </select>
            @error('estado')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" placeholder="Total" value="{{ old('total') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>

@endsection
