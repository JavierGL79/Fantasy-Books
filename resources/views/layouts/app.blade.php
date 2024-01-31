<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fantasy Books') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
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
                        <li class="nav-item">
                            <a class="flag-link">
                                <img class="flag-img" src="{{ asset('img/spainFlag.png') }}" alt="Flag of Spain" class="flag-img">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="flag-link">
                                <img class="flag-img" src="{{ asset('img/UKFlag.png') }}" alt="Flag of UK" >
                            </a>
                        </li>
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
                                    {{__('User')}}: {{ Auth::user()->username }}
                                </a>
                               
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href="{{ route('profile.show') }}">{{__('Profile Management')}}</a>
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href=#>{{__('Préstamos')}}</a>
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href=#>{{__('Notifications')}}</a>
                                    
                                     <!-- Gestionar Catálogo de Libros (con submenú) -->
                                    <div class="dropdown-divider"></div>
 
                                    <span class="menu-span-tittle margin-span-dropdown-item" id="catalogDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('Gestionar Catálogo')}}
                                    </span>
                                    <a class="dropdown-item text-end bibliotecario margin-span-dropdown-item" href="#">Crear</a>
                                        <a class="dropdown-item text-end bibliotecario margin-span-dropdown-item" href="#">Editar</a>

                                    <a class="dropdown-item bibliotecario" href=#>Préstamos y Devoluciones</a>
                                    <a class="dropdown-item bibliotecario" href=#>Usuarios</a>
    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href="{{ route('logout') }}"
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
        @if(Session::has('success'))
        <div class="card-body" id="success-panel" class="alert alert-success mb-0">
            {{ Session::get('success') }}
            {{ __('You are logged in!') }}
        </div>
         @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
