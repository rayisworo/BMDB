<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-warning" href="{{ url('/') }}">
                   BMDB
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">HOME</a>
                        </li>
                        @auth
                            @if (Auth::user()->role == 'member')
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Saved Movies</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Inbox</a>
                                </li>
                            @elseif (Auth::user()->role = 'admin')
                                <li class="nav-item dropdown">
                                    <a  class="nav-link dropdown-toggle" id="navbardrop"
                                        data-toggle="dropdown">Manage</a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('manageUsers') }}" class="dropdown-item">User</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('manageMovies') }}" class="dropdown-item">Movie</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('manageGenres')}}" class="dropdown-item">Genre</a>
                                    </div>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class = "nav-item">
                            <span class="nav-link">{{Carbon\carbon::now()}}</span>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profile')}}" role="button">
                                    {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
