@extends('layouts.app')

@section('title', 'Listado de Categorías')

@section('content')
    <h1>LISTA DE CATEGORÍAS</h1>

    <div class="text-end">
        <a href="{{ route('categoria.create') }}" class="btn btn-primary">Crear</a>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categorias->links('pagination::bootstrap-4') }}
@endsection
