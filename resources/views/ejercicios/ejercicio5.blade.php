@extends('layout.base-template')

@section('contenido')


<div class="row">
    <div class="col-12">

        <h1>Ejercicio 5</h1>

        <h2>Descripción</h2>
        <section>
            <article>
                <p>
                Realizar en javascript una función llamada  “juego de letras”, dicha función recibe una cadena de caracteres como parámetro;  procesa dicha string para mostrar en consola del navegador cada letra intercalada en minúsculas y mayúsculas.
                “EsTa Es Mi PrUeBa En CyBeRfUeL” e indicar cuanto caracteres la conforman, es decir la longitud de la cadena recibida.

                </p>
            </article>
        </section>

        <h3 class="text-center mt-5 mb-5">Imprimir en consola del navegador</h3>

        <section class=" text-center">
            <h4>juegoDeLetras()</h4>
        </section>

    </div>
</div>

@endsection

     
@section('ejercicio4')
<script src="{{ asset('js/ejercicios/ejercicio5-juego-letras.js')}}"></script>

@endsection