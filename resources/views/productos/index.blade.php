@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
@include('partials.menu')
<h1>LISTA DE PRODUCTOS</h1>
<div class="text-end">
    <a href="{{ route('producto.create') }}" class="btn btn-primary">Crear Producto</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Precio</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>${{ number_format($producto->precio, 2) }}</td>
            <td>
                <a href="{{ route('producto.update', $producto->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <a href="{{ route('producto.destroy', $producto->id)}}" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $productos->links('pagination::bootstrap-4') }}

@endsection
