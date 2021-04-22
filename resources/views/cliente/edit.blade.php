@extends('layout.base-template')

@section('contenido')

<h1 class="p-2 rounded text-white bg-info">Editar Cliente</h1>

<form action="/clientes/{{$cliente->id}}" method="POST">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" class="form-control" value="{{$cliente->nombre}}" tabindex="1">
    </div>

    <div class="form-group">
        <label for="correo">Dirección de correo</label>
        <input id="correo" name="correo" type="text" class="form-control" value="{{$cliente->correo}}" tabindex="2">
    </div>

    <div class="form-group">
        <label for="contacto">Contácto</label>
        <input id="contacto" name="contacto" type="text" class="form-control" value="{{$cliente->contacto}}" tabindex="3">
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input id="telefono" name="telefono" type="text" class="form-control" value="{{$cliente->telefono}}" tabindex="4">
    </div>

    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$cliente->direccion}}" tabindex="4">
    </div>

    <div class="mt-2">
        <a href="/clientes" class="btn btn-secondary" tabindex="">Cancelar</a>
        <button type="submit" class="btn btn-info text-white" tabindex="">Editar</button>

    </div>

</form>


@endsection()