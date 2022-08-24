<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title> config('app.name', 'Laravel') </title> -->

    <title>RRK Network</title>

    <link rel="shortcut icon" href="{{ asset('img/logo-RRK.png') }}" type="image/png" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #tabledesign {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tabledesign td, #tabledesign th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tabledesign tr:nth-child(even){background-color: #f2f2f2;}

        #tabledesign tr:hover {background-color: #ddd;}

        #tabledesign th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #0b5ed7;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-RRK.png') }}"  alt="" width="25" height="25" class="d-inline-block align-text-top">
                    RRK Network
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @role('admin')
                            <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
                            <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
                            @endrole
                            @role('user')
                            <li><p>U are User</p></li>
                            @endrole
                            <li><a href="{{ route('posts.index') }}" class="nav-link px-2 text-white">Posts</a></li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth
                            <li><a class="nav-link" href="/">Hi, {{ Auth::user()->name }} </a></li>
                            <li>
                                <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        @section("scripts")

        @show

    </div>


</body>
</html>
