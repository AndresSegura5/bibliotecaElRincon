<?php
use Carbon\Carbon;

?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BibliotecaElRincon</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style>
    *{
        font-family: Verdana;
    }
    .info{

        text-align: center;
        margin: 1rem;
        padding: .5rem;
    }

    .info p{
        display: inline;
    }
</style>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a href="/home" class="navbar-brand">
                    <img src="https://i1.wp.com/www3.gobiernodecanarias.org/medusa/edublog/ieselrincon/wp-content/uploads/sites/137/2019/10/cropped-sin-titulo-4.png?fit=512%2C512&ssl=1" width="80" height="80">
                    {{'BibliotecaElRincón'}}
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
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('INICIAR SESIÓN') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRAR') }}</a>
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
                                        {{ __('CERRAR SESIÓN') }}
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
        <div class="info">
            <b>
                <p style="color: darkred" class="location"></p>
                <p style="color: darkred" class="date"></p>
                <p style="color: darkred" class="temp"></p>
            </b>
        </div>
        <main class="py-4">
            @yield('content')
        </main>

    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        navigator.geolocation.getCurrentPosition(success, error);

        function success(pos) {
            var lat = pos.coords.latitude;
            var long = pos.coords.longitude;
            weather(lat, long);
        }

        function error() {
            console.log("Hubo un error");
        }

        function weather(lat, long) {
            var URL = `https://fcc-weather-api.glitch.me/api/current?lat=${lat}&lon=${long}`;
            $.getJSON(URL, function(data) {
                display(data);
            });
        }

        function display(data) {
            var city = data.name.toUpperCase() + " | ";
            var temp =
                Math.round(data.main.temp_max) +
                "&deg; C";
            var desc = data.weather[0].description;
            var date = new Date();

            var months = [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ];

            var weekday = new Array(7);
            weekday[0] = "Domingo";
            weekday[1] = "Lunes";
            weekday[2] = "Martes";
            weekday[3] = "Miércoles";
            weekday[4] = "Jueves";
            weekday[5] = "Viernes";
            weekday[6] = "Sábado";




            var minutes =
                date.getMinutes() < 11 ? "0" + date.getMinutes() : date.getMinutes();
            var date =
                weekday[date.getDay()].toUpperCase() +
                " " +
                date.getDate() +
                " DE " +
                months[date.getMonth()].toUpperCase()+
                " | " +
                date.getHours() +
                ":" +
                minutes +  " | ";
            $(".location").html(city);
            $(".temp").html(temp);
            $(".date").html(date);
        }
    });
</script>
</html>
<script src="{{ asset('/prestamos/create')}}"></script>
