<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
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
                    <ul class="navbar-nav me-auto">
                        <!-- Left Side Menu - Empty -->
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Right Side Menu - Authentication Links -->
                        @auth
                            @if (Auth::user()->hasRole('admin1'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.adminlevel1.index') }}">
                                        Arahan RUPS (Admin Level 1)
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('admin2'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.adminlevel2.index') }}">
                                        Arahan RUPS (Admin Level 2)
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('admin3'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.adminlevel3.index') }}">
                                        Arahan RUPS (Admin Level 3)
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('admin4'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.adminlevel4.index') }}">
                                        Arahan RUPS (Admin Level 4)
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('admin5'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.adminlevel5.index') }}">
                                        Arahan RUPS (Admin Level 5)
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('user1'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.userlevel1.index') }}">
                                        Arahan RUPS (User Level 1)
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('super_admin'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users.index') }}">Approve Users</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
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
