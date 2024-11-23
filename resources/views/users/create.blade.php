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

    <form action="{{ route('user.store') }}" method="POST" id="form_crear_user">
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
        <button type="submit" class="btn btn-primary" id="envio_user">Enviar</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
<script>
    $(document).ready(function(){ //Se asegura que el DOM esté cargado antes de ejecutar el código jquery

        $('#form_crear_user').on('submit', function(event){ //manejador de eventos para el evento submit
            event.preventDefault() //evita que la página se recargue 
            //alert("Envio de formulario")

            if ($('#name').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); 
                    return; // Detener la ejecución si el nombre está vacío
                }

            if ($('#password').val() === '') {
                swal.fire("¡Error!", "Por favor, ingresa una contraseña", "error");
                return;
            }

            if ($('#email').val() === '') {
                swal.fire("¡Error!", "Por favor, ingresa una correo", "error");
                return;
            }

            var data = $(this).serialize(); //recolecta todos los campos del form en un url
            console.log(data)

            var url = $(this).attr('action') //extrae la ruta de envío de los datos.
            console.log(url) 

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                
                success: function(response){
                    Swal.fire("¡Éxito!", "Usuario creado exitosamente.", "success").then(() => {
                            $('#form_crear_user')[0].reset(); //limpia los campos del formulario
                            console.log(response)
                    });
                },
                error: function(xhr){
                    var errors = xhr.responseJSON.errors; //los errores que devuelve el servidor enviados en JSON
                    $.each(errors, function(key, value) { //itera sobre cada error en el objeto error
                    Swal.fire("¡Error!", value[0], "error"); 
                    });
                }
            });
        });
    });
</script>
@endsection