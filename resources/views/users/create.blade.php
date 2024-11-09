@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')

<div class="container">
    @if($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>CREAR USUARIO</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf   
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="nombre" value="{{ old('name') }}">
        </div>
        <br>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
        </div>
        <br>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="{{ old('password') }}">
        </div>
        <br>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select class="form-control" id="role" name="role" required>
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="cliente" {{ old('role', $user->role ?? '') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="administrador" {{ old('role', $user->role ?? '') == 'administrador' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('role')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection