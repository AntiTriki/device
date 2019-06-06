<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HP Medical</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-kit.min.css?v=2.0.5') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <style>
        .contenido {
            width:100%;



            display: inline-block;
            overflow:hidden;
            white-space:nowrap;
            text-overflow: ellipsis;
        }
        table{
            table-layout: fixed;
            width: 200px;
        }

        th, td {

            width: 100px;
            word-wrap: break-word;
        }
        .logo-image {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            overflow: hidden;
            margin-top: -6px;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    {{--<!-- Fonts -->--}}
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}
    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body class="@yield('body-class')">
<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand">

                {{------------------------imagen como logo----------------------}}
                {{--<div class="logo-image">--}}
                {{--<img src="img/hp_logo.png" class="img-fluid">--}}
                {{--</div>--}}
                {{------------------------imagen como logo----------------------}}

                <i class="material-icons">add_comment</i>
                {{  'HP Medical' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                    </li>
                    <li class="nav-item ">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        @if (Auth::check())
                            @if(Auth::user()->permiso == 1)

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ url('/home') }}">Pagina principal</a>
                                </div>


                                {{--<a id="navba" class="nav-link " href="{{ url('/homeAdm') }}" role="button">--}}
                                {{--{{ Auth::user()->name }}--}}
                                {{--</a>--}}
                            @else
                                <a id="navba" class="nav-link " href="{{ url('/home') }}" role="button">
                                    {{ Auth::user()->name }}
                                </a>
                            @endif
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">exit_to_app</i> {{ __('SALIR') }}
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
<main class=" wrapper">
    @yield('content')
</main>
    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
            {{--<div class="container">--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('app.name', 'Laravel') }}--}}
                {{--</a>--}}
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
                    {{--<span class="navbar-toggler-icon"></span>--}}
                {{--</button>--}}

                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav mr-auto">--}}

                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav ml-auto">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                            {{--</li>--}}
                            {{--@if (Route::has('register'))--}}
                                {{--<li class="nav-item">--}}
                                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--@else--}}
                            {{--<li class="nav-item dropdown">--}}
                                {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                                    {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                        {{--{{ __('Logout') }}--}}
                                    {{--</a>--}}

                                    {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                        {{--@csrf--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--<main class="py-4">--}}
            {{--@yield('content')--}}
        {{--</main>--}}
    {{--</div>--}}
</body>
    <!-- Scripts -->
    <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>


    <script src="{{ asset('js/plugins/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>

</html>
