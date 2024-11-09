@extends('layouts.app')
@section('title', 'Actualizar')
@section('content')
    <div class="container">
        <h3>ACTUALIZAR USUARIO</h3>

        <form action="{{route('user.update.data', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" value="{{$user->name}}" id="">
                <br>
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" value="{{$user->email}}" id="">
            </div>
            <div>
                <input type="submit" value="Editar" class="btn btn-primary">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Volver</a>
            </div>

        </form>
    </div>
@endsection