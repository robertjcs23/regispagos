<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'RegisPagos') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="{{asset('assets/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="C:\xampp\htdocs\regispagos\node_modules\bootstrap-icons\icons" rel="stylesheet">

    <!-- Scripts -->
    <!-- @vite(['resources/js/app.js']) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <img SRC="{{ asset('images/facebook_cover_photo_1.png') }}" alt="">
        <img src="{{ asset('images/icono.jpg') }}" alt="">
        <link rel="shortcut icon" type="image/png" href="{{ asset('/images/facebook_cover_photo_1.png') }}">
</head>
<body>
    <!-- Desde Aqui -->
        <header class="fixed-top" >
        <!-- Etiqueta de cabecera, nueva usada en HTML5-->

    </header>
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <nav class="nav justify-content-center navbar-dark bg-dark fixed-top">




<div class="position-relative position-absolute top-0 start-0">

<!-- Desde aqui Prueba de menu lateral -->

<!-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Link with href
</a> -->

<button class="btn btn-outline-secondary bg-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg>
    Menú
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title" id="offcanvasExampleLabel">RegisPagos</h1>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
    </div>
    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle gap-2 col-6 mx-aut" type="button" data-bs-toggle="dropdown">
        Cargos
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Home de Cargos</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>

    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle gap-2 col-6 mx-aut" type="button" data-bs-toggle="dropdown">
        Clientes
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Home de Clientes</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>

    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle gap-2 col-6 mx-aut" type="button" data-bs-toggle="dropdown">
        Empleados
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Home de Empleados</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>

    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle gap-2 col-6 mx-aut" type="button" data-bs-toggle="dropdown">
        Tpagos
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Home de Tpagos</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>

    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle gap-2 col-6 mx-aut" type="button" data-bs-toggle="dropdown">
        Pagos
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Home de Pagos</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>

    <div class="dropdown mt-3">
      <button class="btn btn-secondary dropdown-toggle gap-2 col-6 mx-aut" type="button" data-bs-toggle="dropdown">
        Roles
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Home de Roles</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>

  </div>
</div>
</div>

<!-- Hasta aqui Prueba de menu lateral -->



        <!-- Etiqueta de navegación-->
        <a class="navbar-brand">RegisPagos</a>
        <a class="nav-link active" aria-current="page" href="{{url('dashboard')}}">Panel</a> <!-- hipervínculos href, es la ubicación de los archivos-->
        <a class="nav-link active" aria-current="page" href="{{url('cargos')}}">Cargos</a>
        <a class="nav-link active" aria-current="page" href="{{url('clientes')}}">Clientes</a>
        <a class="nav-link active" aria-current="page" href="{{url('empleados')}}">Empleados</a>
        <a class="nav-link active" aria-current="page" href="{{url('tpagos')}}">TPagos</a>
        <a class="nav-link active" aria-current="page" href="{{url('pagos')}}">Pagos</a>
        <a class="nav-link active" aria-current="page" href="{{url('roles')}}">Roles</a>
        <a class="nav-link active" aria-current="page" href="">Inscríbete</a>
    </nav>
    <!-- Hasta Aqui -->





    <div id="app">
        <!-- Cabecera de todo el aplicativo -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                </div>
            </div>
        </nav>
        <!-- Cabecera de todo el aplicativo -->

        <main class="py-4">

                <!-- Titulo Principal -->
                <div class="page-title">
		            <h1>{{ $page_title ?? 'No tiene titulo todavia, colocar la variable en el controlador / Route '}}</h1>
                    <hr>


























                </div>

                <!-- Contenedor Principal con el BODY de la app -->
                <div class="row">
                    <div class="col-8 offset-2">
                    @yield('content')
                    </div>
                </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
