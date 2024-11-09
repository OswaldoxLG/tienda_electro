@extends('layouts.app')
@section('title', 'Actualizar')
@section('content')
    <div class="container">
        <h3>UPDATE USER</h3>

        <form action="{{route('user.update.data')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" value="{{$user->name}}" id="">
            </div>
            <div>
                <input type="submit" value="Editar">
            </div>
        </form>
    </div>
@endsection