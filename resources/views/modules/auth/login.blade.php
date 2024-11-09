@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">LOGIN</h2>
                        <form action="{{ route('logear') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Entrar</button>
                            <a href="{{ route('registro') }}" class="btn btn-info btn-block mt-2">Registrarse</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection