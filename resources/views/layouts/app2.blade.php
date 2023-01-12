<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Informasi Pegawai | Yayasan Prima Insani</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="icon" href="{{asset('storage/ypig.png')}}" type="image/png">
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body style="background-image: url('bg.jpg');background-attachment: fixed;background-size: 100% 100%;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sistem Informasi Pegawai 
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
        <div class="text-center">
            <img width="10%" src="{{asset('storage/ypig.png')}}" alt="">
        </div>
        <main class="py-4">
            @yield('content')
        </main>
            <div class="text-center" style="color:white;">
                <strong>&copy;2021 <a style="color:white;" href="http://primainsani.sch.id" target="_blank">Yayasan Prima Insani</a>&nbsp;</strong>
                All rights reserved.
            </div>
    </div>
</body>
</html>
