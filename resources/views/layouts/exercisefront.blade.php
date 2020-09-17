<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles/exercisestyles.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/scroll-polyfill.js') }}"></script>
    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body>
    <div class="global-container">
        <div class="nav-trigger"></div>
        <header class="header">
            <div class="header__inner">
                <div class="header__title">
                    <h1 class="header__home-title">
                        <a class="header__home-link" href="{{ url('/') }}">
                            One Step
                        </a>
                    </h1>
                </div>
                <nav class="header__nav">
                    <ul class="header__ul">
                        @guest
                            <li class="header__li">
                                <a class="header__btn" href="{{ route('login') }}">ログイン</a>
                            </li>
                            <li class=" header__li">
                                <a class="header__btn" href="{{ route('register') }}">新規登録</a>
                            </li>
                        @else
                            <li class="header__li">
                                <a class="header__nav-username">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <form class="header__nav-logout" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li class="header__li">
                                    <input class="submit-btn" type="submit" value="ログアウト">
                                </li>
                            </form>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>
        <div id="content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
