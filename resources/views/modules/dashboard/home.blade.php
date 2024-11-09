@extends('layouts.app')

@section('tittle', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Bienvenido</h1>
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('logout')}}" class="btn btn-danger">Salir</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection