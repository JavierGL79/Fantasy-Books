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
    <link rel="stylesheet" href="{{ asset('css/userList.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    
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
                            <a class="flag-link" id="es" href="{{ LaravelLocalization::getURLFromRouteNameTranslated('es', 'routes.about') }}">
                                <img class="flag-img" src="{{ asset('img/spainFlag.png') }}" alt="Flag of Spain" class="flag-img">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="flag-link" id="uk" href="{{ LaravelLocalization::getURLFromRouteNameTranslated('en', 'routes.about') }}">
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
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href="{{ route('profile.show', ['id' => auth()->user()->id]) }}">{{__('Profile Management')}}</a>
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href="{{ route('userloans.show') }}" id="UserLoans">{{__('Loans')}}</a>
                                    <a class="dropdown-item dropdown-item:focus dropdown-item-custom" href=#>{{__('Notifications')}}</a>
                                    
                                     <!-- Gestionar Catálogo de Libros -->
                                     @if(Auth::user()->es_bibliotecario)
                                    <div class="dropdown-divider"></div>
 
                                    <span class="menu-span-tittle margin-span-dropdown-item" id="catalogDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{__('Gestionar Catálogo')}}
                                    </span>
                                    
                                    <a class="dropdown-item text-end bibliotecario margin-span-dropdown-item" href="{{ route('libros.nuevo') }}" id="newBook">{{__('Add new book')}}</a>
                                    
                                    <a class="dropdown-item bibliotecario" href="{{ route('books.AllLoans') }}" id="Loans">Préstamos y Devoluciones</a>
                                    <a class="dropdown-item bibliotecario" href="{{ route('users.UserList') }}" id="userList">{{__('Users List')}}</a>
                                    @endif
                                    
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
        @if(Auth::check() && Session::get('show_welcome_message', true))
            <div class="card text-center totalSuccess" id="success-panel" class="alert alert-success mb-0">            
                {{__('Welcome')}} {{ Auth::user()->username }}. {{ __('You are logged in!') }}
            </div>
         @endif
        <main class="py-4">
            <div class="card bg-light" style="--bs-bg-opacity: .5;">
                <div class="card-header text-black bg-dark-subtle">
                    <h2 class="text-center">@yield('card-header')</h2>
                </div>
                <div class="card-body text-black">
                    @yield('card-body')
                </div>
            </div>
            @yield('content')
        </main>
    </div>
    <footer>
        Javier Girón López. Curso PHP - Laravez 2023-2024
    </footer>
</body>
</html>
