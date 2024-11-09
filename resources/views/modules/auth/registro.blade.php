@extends('layouts.app')

@section('title', 'Registro de usuario')

@section('content')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">REGISTRO DE USUARIO</h2>
                        <form action="{{ route('registrar') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Registrarse</button>
                            <a href="{{ route('login') }}" class="btn btn-info btn-block mt-2">Logearse</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection