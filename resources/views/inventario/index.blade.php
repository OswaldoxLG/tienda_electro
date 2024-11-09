@extends('layouts.app')

@section('title', 'Listado de Inventario')

@section('content')
<h1>LISTA DE MOVIMIENTOS DE INVENTARIO</h1>
<div class="text-end">
    <a href="{{ route('inventario.create') }}" class="btn btn-primary">Registrar Movimiento</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Tipo de Movimiento</th>
            <th scope="col">Fecha</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inventarios as $inventario)
        <tr>
            <td>{{ $inventario->id }}</td>
            <td>{{ $inventario->producto->nombre }}</td>
            <td>{{ $inventario->cantidad }}</td>
            <td>{{ ucfirst($inventario->tipo_movimiento) }}</td>
            <td>{{ $inventario->created_at->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $inventarios->links('pagination::bootstrap-4') }}

@endsection
