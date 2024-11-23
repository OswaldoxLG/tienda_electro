@extends('layouts.app')

@section('title', 'Crear Pedido')

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

    <h1>CREAR PEDIDO</h1>

    <form action="{{ route('pedido.store') }}" method="POST" id="form_crear_pedido">
        @csrf   

        <br>
        <div class="mb-3">
            <label for="estado">Estado del Pedido</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="">Seleccione un estado</option>
                <option value="pendiente">Pendiente</option>
                <option value="completado">Completado</option>
                <option value="cancelado">Cancelado</option>
            </select>
            @error('estado')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" placeholder="Total" value="{{ old('total') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
<script>
    $(document).ready(function(){ 

        $('#form_crear_pedido').on('submit', function(event){ 
            event.preventDefault() 

            if ($('#estado').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un estado.", "error"); 
                    return; 
                }

            if ($('#total').val() === '') {
                swal.fire("¡Error!", "Por favor, ingresa un total", "error");
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
                    Swal.fire("¡Éxito!", "Pedido creado exitosamente.", "success").then(() => {
                            $('#form_crear_pedido')[0].reset();
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
