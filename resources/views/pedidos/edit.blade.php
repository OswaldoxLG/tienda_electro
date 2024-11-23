@extends('layouts.app')

@section('title', 'Actualizar Pedido')

@section('content')
<div class="container">
    <h3>ACTUALIZAR PEDIDO</h3>

    <form action="{{ route('pedido.update.data', $pedido->id) }}" method="POST" id="form_edit_pedido">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $pedido->id }}">

        <div class="form-group">
            <label for="estado">Estado del Pedido</label>
            <select name="estado" class="form-control" id="estado" required>
                <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completado" {{ $pedido->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" value="{{ $pedido->total }}" class="form-control" id="total" step="0.01" required>
        </div>

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('pedido.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#form_edit_pedido').on('submit', function(event){
            event.preventDefault()

            if ($('#estado').val() === '') {
                    Swal.fire("¡Error!", "Por favor, ingresa un estado.", "error"); 
                    return; 
                }

            if ($('#total').val() === '') {
                swal.fire("¡Error!", "Por favor, ingresa una total", "error");
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
                            $('#form_edit_pedido')[0].reset(); 
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
