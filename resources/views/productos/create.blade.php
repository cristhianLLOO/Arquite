@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="fade-in">Agregar Producto</h2>
            <form action="{{ route('productos.store') }}" method="POST" class="fade-in">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
