@extends('layout.base-template')

@section('contenido')


<h1 class="bg-info p-2 rounded text-white">Editar Direccion{{$direccion->nombre}}</h1>

<form action="/direcciones/{{$direccion->id}}" method="POST" class="">

    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="direccion">Dirección</label>
        <input id="direccion" name="direccion" type="text" class="form-control" value="{{$direccion->direccion}}" tabindex="4">
    </div>

    <div class="mt-2">
        <a href="/clientes" class="btn btn-secondary" tabindex="">Cancelar</a>
        <button type="submit" class="btn btn-info text-white" tabindex="">Editar</button>

    </div>

</form>

@endsection()