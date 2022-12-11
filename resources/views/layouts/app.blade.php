<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    @inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

    @section('adminlte_css')
        @stack('css')
        @yield('css')
    @stop


    @section('classes_body', $layoutHelper->makeBodyClasses())

    @section('body_data', $layoutHelper->makeBodyData())

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fashion dog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="/js/custom.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c322e598d8.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light barraNav shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('login') }}">
                    <img src="{{URL::asset('img/logo.PNG')}}" style="max-width:60px; margin-top: -7px;">
                    {{ "Fashion Dog" }}
                </a>




                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión' ) }} </a>
                                </li>





                            @endif



                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                                </li>



                            @endif


                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu barraNav dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>


                                    <a class="dropdown-item" href="{{ route('edit') }}" onclick="event.preventDefault();
                                                          document.getElementById('edit-form').submit();">
                                        {{ __('Datos') }}
                                    </a>

                                    <form id="edit-form" action="{{ route('edit') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('solicitud') }}" onclick="event.preventDefault();
                                                          document.getElementById('solicitud-form').submit();">
                                        {{ __('Solicitar servicio') }}
                                    </a>

                                    <form id="solicitud-form" action="{{ route('solicitud') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('password') }}" onclick="event.preventDefault();
                                                             document.getElementById('password-form').submit();">
                                        {{ __('Cambiar contraseña') }}
                                    </a>

                                    <form id="password-form" action="{{ route('password') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>




                                </div>
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
