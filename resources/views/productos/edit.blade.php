@extends('layouts.app')

@section('title', 'Actualizar Producto')

@section('content')
<div class="container">
    <h3>ACTUALIZAR PRODUCTO</h3>

    <form action="{{ route('producto.update.data', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $producto->id }}">

        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" id="descripcion" required>{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" id="precio" step="0.01" required>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('producto.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
