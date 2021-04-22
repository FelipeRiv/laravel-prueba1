<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reboot.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iconmoon.css') }}" rel="stylesheet">

    <title>Clientes</title>
  </head>
  <body>
    <header class="mb-2">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
        <div class="container">

          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                
                <a class="nav-link active icon-home" aria-current="page" href="/clientes">Inicio</a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link icon-user" href="/clientes/create">Crear Clientes</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link icon-lab" href="/ejercicio4">Ejercicio 4</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link icon-cart" href="/ejercicio5">Ejercicio 5</a>
              </li>

            </ul>
            
          </div>
        </div>
      </nav>
    </header>


    <div class="container">

        @yield('contenido')

    </div>

    <footer class="container-fluid bg-dark p-1 text-white text-center fixed-bottom lead">
      &#169;2021
    </footer>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> --}}

    {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

    @yield('ejercicio4')
    @yield('ejercicio5')

   
  </body>
</html>
