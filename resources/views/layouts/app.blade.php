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
        <nav>
            <ul>
                <li class="left">
                    <p class="logo-title"><a href="/">uni-slip-box</a></p>
                </li>
                <li class="right">
                    @auth
                    <p>{{ Auth::user()->name }}</p>
                    <p>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </p>
                    @else
                    <p><a href="{{ route('login') }}">Login</a></p>
                    <p><a href="{{ route('register') }}">Register</a></p>
                    @endauth
                </li>
            </ul>
        </nav>
        @if (session('status'))
            <div style="color:red">
                {{ session('status') }}
            </div>
        @endif
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
