@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2>LOGIN</h2>
                        <form action="{{route('logear')}}" method="post">
                            @csrf
                            @method('post')
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="">
                            <label for="passwor">Contraseña</label>
                            <input type="password" name="password" id="">
                            <button class="btn btn-primary mt-4">Entrar</button>
                            <a href="{{route('registro')}}" class="btn btn-info mt-4">Registrarse</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection