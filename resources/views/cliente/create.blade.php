@extends('layout.base-template')

@section('contenido')

<h1 class="bg-success p-2 rounded text-white">Crear Clientes</h1>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/clientes" method="POST">

    @csrf

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" required tabindex="1">
    </div>

    <div class="form-group">
        <label for="correo">Dirección de correo</label>
        <input id="correo" name="correo" type="email" class="form-control" required tabindex="2">
    </div>

    <div class="form-group">
        <label for="contacto">Contácto</label>
        <input id="contacto" name="contacto" type="text" class="form-control" required tabindex="3">
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" required tabindex="4">
    </div>

    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" required tabindex="4">
    </div>

    <div class="form-group">
        <label for="direccionAlternativa">Dirección Alternativa</label>
        <input id="direccionAlternativa" name="direccionAlternativa" placeholder="opcional" type="text" class="form-control"  tabindex="5">
    </div>

    <div class="mt-3">
        <a href="/clientes" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <input type="submit" class="btn btn-success" tabindex="6" value="Guardar">
        
    </div>


</form>

@endsection

