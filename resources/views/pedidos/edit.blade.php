@extends('layouts.app')

@section('title', 'Actualizar Pedido')

@section('content')
<div class="container">
    <h3>ACTUALIZAR PEDIDO</h3>

    <form action="{{ route('pedido.update.data', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $pedido->id }}">

        <div class="form-group">
            <label for="estado">Estado del Pedido</label>
            <select name="estado" class="form-control" id="estado" required>
                <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completado" {{ $pedido->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" value="{{ $pedido->total }}" class="form-control" id="total" step="0.01" required>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
@endsection
