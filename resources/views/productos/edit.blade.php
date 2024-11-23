@extends('layouts.app')

@section('title', 'Actualizar Producto')

@section('content')
<div class="container">
    <h3>ACTUALIZAR PRODUCTO</h3>

    <form action="{{ route('producto.update.data', $producto->id) }}" method="POST" id="form_edit_produ">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $producto->id }}">

        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" id="descripcion" required>{{ $producto->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" id="precio" step="0.01" required>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('producto.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#form_edit_produ').on('submit', function(event){
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
                type: 'PUT',
                url: url,
                data: data,

                success: function(response){
                    Swal.fire("¡Éxito!", "Producto editado exitosamente.", "success").then(() => {
                            $('#form_edit_produ')[0].reset(); 
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
