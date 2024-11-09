@extends('layouts.app')

@section('title', 'Listado de Pedidos')

@section('content')
@include('partials.menu')
<h1>LISTA DE PEDIDOS</h1>
<div class="text-end">
    <a href="{{ route('pedido.create') }}" class="btn btn-primary">Crear Pedido</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Estado</th>
        <th scope="col">Total</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{{ $pedido->id }}</td>
            <td>{{ ucfirst($pedido->estado) }}</td>
            <td>${{ number_format($pedido->total, 2) }}</td>
            <td>
                <a href="{{ route('pedido.update', $pedido->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <a href="{{ route('pedido.destroy', $pedido->id)}}" class="btn btn-danger">Eliminar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $pedidos->links('pagination::bootstrap-4') }}

@endsection
