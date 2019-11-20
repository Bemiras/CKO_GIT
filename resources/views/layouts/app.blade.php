<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.Cyfrowa karta obiegowa', 'Cyfrowa karta obiegowa') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else


                        @if (Auth::check() && Auth::user()->role == 'student')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Moje dane <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('about') }}">
                                        Moje dane
                                    </a></li>
                                <li><a href="{{ URL::to('dataChangeRequests') }}">
                                        Edycja danych
                                    </a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('card') }}">Karta obiegowa</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Korespondencje <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="{{ URL::to('message') }}">Odebrane</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ URL::to('messageSend') }}">Wysłane</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if (Auth::check() && Auth::user()->role == 'pracownik')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Moje dane <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="{{ URL::to('about') }}">
                                        Moje dane
                                    </a></li>
                                <li><a href="{{ URL::to('dataChangeRequests') }}">
                                        Edycja danych
                                    </a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('pendingapplication') }}">Oczekujące podania</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('consideredapplication') }}">Rozpatrzone podania</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Korespondencje <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="{{ URL::to('message') }}">Odebrane</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ URL::to('messageSend') }}">Wysłane</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if (Auth::check() && Auth::user()->role == 'administrator')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('about') }}">Moje dane</a>
                        </li>
                        </li>
                         <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Oferta edukacyjna <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('departmentoffer') }}">
                                            Lista wydziałów
                                        </a></li>
                                    <li><a href="{{ URL::to('directionoffer') }}">
                                            Lista kierunków
                                        </a></li>
                                </ul>
                            </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Pracownicy <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="{{ URL::to('userrole') }}">Lista Pracowników</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ URL::to('userrole/registrations') }}">Dodaj Pracownika</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('applicationToAccept') }}">Podania o zmianę danych</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('userlist') }}">Lista studentów</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                Komisje <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="nav-link" href="{{ URL::to('commissions') }}">Lista Komisji</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ URL::to('commissions/create') }}">Dodaj Komisje</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('news') }}">Aktualności</a>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
