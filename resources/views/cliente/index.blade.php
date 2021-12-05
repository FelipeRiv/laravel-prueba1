@extends('layout.base-template')

@section('contenido')
<h1 class="bg-danger text-center text-white p-2 rounded">Clientes</h1>

<a href="clientes/create" class="btn btn-success">Crear Cliente</a>
<div class="table-responsive">
    <table class="table table-dark table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dirección de Correo</th>
                <th scope="col">Contácto</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Direcciones</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
    
            @foreach ($clientes as $cliente)
            <tr>
                <td> {{ $cliente->id }} </td>
                <td> {{ $cliente->nombre }} </td>
                <td> {{ $cliente->correo }} </td>
                <td> {{ $cliente->contacto }} </td>
                <td> {{ $cliente->telefono }} </td>
                <td> 
                    <a href="/direcciones/{{$cliente->id}}" class="btn btn-success col my-1">Ver</a>
                </td>
                
                <td> 
    
                    <form action="{{route ('clientes.destroy', $cliente->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <a href="/clientes/{{$cliente->id}}/edit" class="btn btn-outline-warning col-12 col-xl-4 my-1 ">Editar
                        </a>
                        
                        <button type="submit" class="btn btn-outline-danger col-12 col-xl-5">Eliminar</button>
                    </form>
    
                </td>
            </tr>
                
            @endforeach

        </tbody>
    </table>

</div>
@endsection