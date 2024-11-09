@extends('layouts.app')

@section('title', 'Registro de usuario')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2>REGISTRO DE USUARIO</h2>
                    <form action="{{route('registrar')}}" method="post">
                        @csrf
                        @method('POST')
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                        <button class="btn btn-primary mt-4">Registrarse</button>
                        <a href="{{route('login')}}" class="btn btn-info mt-4">Logearse</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
