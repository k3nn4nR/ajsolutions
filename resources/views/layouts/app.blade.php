<!doctype html>
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
        <v-app id="inspire">
            <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar ->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar ->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links ->
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
            </nav> -->
            <template>
                <div>
                    <v-system-bar app>
                        <v-spacer></v-spacer>
                        <v-icon>mdi-square</v-icon>
                        <v-icon>mdi-circle</v-icon>
                        <v-icon>mdi-triangle</v-icon>
                    </v-system-bar>
                    <v-navigation-drawer app >
                        <v-sheet color="grey lighten-4" class="pa-4" >
                            <v-avatar class="mb-4" color="grey darken-1" size="64" ></v-avatar>
                            <div>{{ Auth::user()->email }}</div>
                        </v-sheet>
                        <v-divider></v-divider>
                        <sidebar-list :user="{{json_encode(Auth::user())}}" :permissions="{{json_encode(Auth::user()->permissions)}}" :roles="{{json_encode(Auth::user()->roles)}}"/>
                    </v-navigation-drawer>
                    <v-main>
                        <v-container class="py-8 px-6" fluid >
                            <v-responsive :aspect-ratio="16/9">
                                @yield('content')
                            </v-responsive>
                        </v-container>
                    </v-main>
                </div>
            </template>
        </v-app>
    </div>
</body>
</html>
