<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!--Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <input type="text" style="display: none" id="endereco_servidor_api" value="http://localhost:8888"/>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <a class="navbar-brand" href="{{ \Illuminate\Support\Facades\Auth::check()?url('#') :url('/') }}">
                    <!--{{ config('app.name', 'Laravel') }}-->
                    <img src="{{ asset('dist/img/logo-santa.png') }}"  width="120px" height="67px">                         
                </a>
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fa fa-user-circle" aria-hidden="true"></i><span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!--  MENU NAO FICOU LEGAL ARRUMAR DEPOIS PLEASE  -->

            @if(\Illuminate\Support\Facades\Auth::check())
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1f3366;">
                <a class="navbar-brand" href="{{asset('home')}}">
                    <i class="fa fa-hospital-o" aria-hidden="true" style="color: white;font-size: x-large;"></i>
                </a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{asset('home')}}" style="color: white;font-size: initial"><i class="fa fa-user-md" aria-hidden="true" style="color: white;font-size: 16px;"></i> Médico <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('exame')}}" style="color: white;font-size: initial"><i class="fa fa-stethoscope" aria-hidden="true" style="color: white;font-size: 16px;"></i> Exames Disponíveis</a>
                        </li>   
                    </ul>
                </div>
            </nav>
            @endif
            <!--  MENU FECHOU AQUI  -->


            <main class="py-4">
                @yield('content')
            </main>

        </div>
    </body>
</html>
