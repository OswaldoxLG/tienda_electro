@extends('layouts.app')
@section('title', 'Actualizar')
@section('content')
    <div class="container">
        <h3>ACTUALIZAR USUARIO</h3>

        <form action="{{route('user.update.data', $user->id)}}" method="POST" id="form_edit_user">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" value="{{$user->name}}" id="name" class="form-control" >
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="text" name="email" value="{{$user->email}}" id="email" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Editar" class="btn btn-primary" id="enviar_edit_user">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Volver</a>
            </div>

        </form>
    </div>
    <script>
    $(document).ready(function(){
        $('#form_edit_user').on('submit', function(event){
            event.preventDefault()
            //alert("Envio de formulario")

            if ($('#name').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); 
                    return; 
                }

            if ($('#email').val() === '') {
                swal.fire("¡Error!", "Por favor, ingresa una correo", "error");
                return;
            }

            var data = $(this).serialize();
            console.log(data)
            
            var url = $(this).attr('action')
            console.log(url)

            $.ajax({
                type: 'PUT',
                url: url,
                data: data,

                success: function(response){
                    Swal.fire("¡Éxito!", "Usuario editado exitosamente.", "success").then(() => {
                            $('#form_edit_user')[0].reset(); 
                            console.log(response)
                    });
                },
                error: function(xhr){
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function(key, value) {
                    Swal.fire("¡Error!", value[0], "error"); 
                    });
                }
            });
        });
    });
    </script>
@endsection