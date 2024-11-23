@extends('layouts.app')

@section('title', 'Listado de Usuarios')

@section('content')
@include('partials.menu')
<h1>LISTA DE USUARIOS</h1>
<div class="text-end">
    <a href="{{ route('user.create') }}" class="btn btn-primary" id="crear_user">Crear</a>
</div>
<br>
<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">Usuario</th>
        <th scope="col">Correo</th>
        <th scope="col">Rol</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <a href="{{ route('user.update', $user->id)}}" class="btn btn-primary"> Editar </a>
            </td>
            <td>
                <a href="{{ route('user.destroy', $user->id)}}" class="btn btn-danger"> Borrar </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $users->links('pagination::bootstrap-4') }}

@endsection
