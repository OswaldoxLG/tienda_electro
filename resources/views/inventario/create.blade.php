@extends('layouts.app')

@section('title', 'Registrar Movimiento de Inventario')

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

    <h1>REGISTRAR MOVIMIENTO DE INVENTARIO</h1>

    <form action="{{ route('inventario.store') }}" method="POST">
        @csrf   
        <div class="mb-3">
            <label for="producto" class="form-label">Producto</label>
            <select class="form-control" id="producto" name="producto_id" required>
                <option value="" disabled selected>Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
                @endforeach
            </select>
            @error('producto_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value="{{ old('cantidad') }}">
            @error('cantidad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label for="tipo_movimiento" class="form-label">Tipo de Movimiento</label>
            <select class="form-control" id="tipo_movimiento" name="tipo_movimiento" required>
                <option value="" disabled selected>Seleccione el tipo de movimiento</option>
                <option value="entrada" {{ old('tipo_movimiento') == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="salida" {{ old('tipo_movimiento') == 'salida' ? 'selected' : '' }}>Salida</option>
            </select>
            @error('tipo_movimiento')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Registrar Movimiento</button>
        <a href="{{ route('inventario.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
