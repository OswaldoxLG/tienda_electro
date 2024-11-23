@extends('layouts.app')

@section('title', 'Crear Producto')

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

    <h1>CREAR PRODUCTO</h1>

    <form action="{{ route('producto.store') }}" method="POST" id="form_crear_produ">
        @csrf   
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" value="{{ old('nombre') }}">
        </div>
        <br>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del producto">{{ old('descripcion') }}</textarea>
        </div>
        <br>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" value="{{ old('precio') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('producto.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
<script>
    $(document).ready(function(){ 

        $('#form_crear_produ').on('submit', function(event){ 
            event.preventDefault() 

            if ($('#nombre').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un nombre.", "error"); 
                    return; 
                }

            if ($('#precio').val() === '') {
                swal.fire("¡Error!", "Por favor, ingresa una precio", "error");
                return;
            }

            var data = $(this).serialize(); 
            console.log(data)

            var url = $(this).attr('action')
            console.log(url) 

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                
                success: function(response){
                    Swal.fire("¡Éxito!", "Producto creado exitosamente.", "success").then(() => {
                            $('#form_crear_produ')[0].reset(); 
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
