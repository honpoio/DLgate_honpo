<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <title>simple_DLgate</title>
=======
    <title>ログイン</title>
>>>>>>> test
=======
    <title>simple_DLgate</title>
>>>>>>> DB_redesign
=======
    <title>simple_DLgate</title>
>>>>>>> frontend

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
=======
</head>

>>>>>>> test
=======
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
>>>>>>> DB_redesign
=======
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
>>>>>>> frontend
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                <a class="navbar-brand" href="{{ url('/') }}">
                    simple_DLgate
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
=======
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    ホーム画面に戻る
=======
                <a class="navbar-brand" href="{{ url('/') }}">
                    simple_DLgate
>>>>>>> DB_redesign
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
<<<<<<< HEAD
                </button> -->
>>>>>>> test
=======
                </button>
>>>>>>> DB_redesign
=======
                <a class="navbar-brand" href="{{ url('/') }}">
                    simple_DLgate
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
>>>>>>> frontend

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
<<<<<<< HEAD
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('privacy') }}">プライバシーポリシー</a>
                            </li>
=======
>>>>>>> test
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
<<<<<<< HEAD

=======
>>>>>>> test
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> DB_redesign
=======
>>>>>>> frontend
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/DLgate') }}">my DL GATE</a>
                                    <a class="dropdown-item" href="{{ url('/user') }}">ユーザー設定</a>

<<<<<<< HEAD
<<<<<<< HEAD
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
=======
                                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
=======
>>>>>>> DB_redesign
=======
>>>>>>> frontend
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>



                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
<<<<<<< HEAD
<<<<<<< HEAD
                                </div> -->
>>>>>>> test
=======
                                </div>
>>>>>>> DB_redesign
=======
                                </div>
>>>>>>> frontend
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
