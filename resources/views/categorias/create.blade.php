@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
    <div class="container">
        <h1>CREAR CATEGORÍA</h1>
        
        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoría" value="{{ old('nombre') }}">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la categoría">{{ old('descripcion') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    </div>
@endsection
