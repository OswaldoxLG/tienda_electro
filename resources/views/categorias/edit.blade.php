@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
    <div class="container">
        <h1>EDITAR CATEGORÍA</h1>
        
        <form action="{{ route('categoria.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $categoria->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
