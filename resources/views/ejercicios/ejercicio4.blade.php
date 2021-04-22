@extends('layout.base-template')

@section('contenido')

<div class="container pt-3">

    <div class="row">
        <div class="col-12">

            <h1>Ejercicio 4</h1>

            <h2>Descripción</h2>
            <section>
                <article>
                    <p>
                        Realizar una página HTML (puede ser dentro del mismo laravel o separada queda a discreción
                        del desarrollador) donde muestre dos botones, la dinámica es: si presiono el botón #1 cambia
                        el texto y color del botón #2, y presiono el botón #2, cambia el texto y color del botón #1.
                        Queda a discreción del desarrollador el uso de JQUERY o JAVASCRIPT
                    </p>
                </article>
            </section>

            <h3 class="text-center mt-5 mb-5">Botones</h3>

            <section class=" d-flex justify-content-around">

                <button id="btn-1" data-name="Cyber" class="btn p-3 w-25 btn-primary">Botón #1</button>
                <button id="btn-2" data-name="Fuel" class="btn p-3 w-25 btn-dark">Botón #2</button>

            </section>

        </div>
    </div>

</div> 

@endsection

@section('ejercicio4')
<script src="{{ asset('js/ejercicios/ejercicio4-botones.js')}}"></script>

@endsection