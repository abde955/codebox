<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script  src ="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="new-nav" id="nav">
            <div class="container__nav nav-space-between"@auth style="flex-direction: column;" @endauth>
                {{-- logos y iconos de usuario --}}
                <div class="nav__logo nav-space-between">
                    <a href="{{ url('/') }}"><div id="nav__logo"></div></a>
                    @auth
                        <a href="#" id="icon" class="nav__btn-auth">
                            {{-- nombre de usuario y icono --}}
                            <span class="auth__container auth__text">{{ Auth::user()->name }}</span>
                            <i class="fas fa-user-circle auth__container"></i>
                            
                        </a>
                    @else
                        <a href="#" id="icon" class="nav__btn"><i class="icon fas fa-bars"></i></a>
                    @endauth
                </div>
                
                {{-- listas de opciones --}}
                <ul id="links" class="nav__list @auth nav__list-auth @endauth">
                @guest
                    {{-- opciones para usuarios no autenticado --}}
                    @if (Route::has('login'))
                    <li class="nav__button">
                        <a href="{{ route('login') }}" class="nav__link">
                            <span class="nav__text">Iniciar Sesion</span>
                        </a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav__button">
                        <a href="{{ route('register') }}" class="nav__link">
                            <span class="nav__text">Registrarse</span>
                        </a>
                    </li>
                    @endif
                @else
                    {{-- opciones para usuarios autenticado --}}
                    <li class="nav__button-auth">
                        <a href="{{ route('logout') }}" class="nav__link nav__link-auth" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="nav__text">{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                </ul>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
