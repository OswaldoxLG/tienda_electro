@extends('layouts.app')

@section('title', 'DASHBOARD')

@section('content')
    <div class="container">
        <h1>Bienvenido</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Menú de Administración</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('producto.index') }}" class="btn btn-primary btn-block">Productos</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-block">Usuarios</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('pedido.index') }}" class="btn btn-primary btn-block">Pedido</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
