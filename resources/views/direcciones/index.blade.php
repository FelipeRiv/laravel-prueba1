@extends('layout.base-template')

@section('contenido')
<h1 class="bg-success text-white rounded p-1 rounded-2">Direcciones</h1>

@if (count($direcciones) === 1)

    <h2>Cliente: {{$direcciones[0]->nombre}}</h2>

    @else
    <h2>Cliente no tiene direciones asociadas </h2>

@endif

<div class="table-responsive">
    <table class="table table-dark table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Direccion</th>
                <th scope="col">ID</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
    
            @foreach ($direcciones as $direccion)
            <tr>
                <td> {{ $direccion->direccion }}  
                <td> {{ $direccion->id }} </td>
    
                <td> 
    
                    <form action="{{route ('direcciones.destroy', $direccion->id) }}" method="POST" class="">
                        @csrf
                        @method('DELETE')
                        
                        <div class="col">
                            <a href="/direcciones/{{$direccion->id}}/edit" class="btn btn-outline-warning col px-4 my-1 ">Editar</a>
                            <button type="submit" class="btn btn-outline-danger px-3 col">Eliminar</button>

                        </div>
                    </form>
    
                </td>
            </tr>
                
            @endforeach
            
        </tbody>
        <tfoot>
        </tfoot>
    </table>

</div>

@endsection()