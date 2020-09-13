<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/scroll-polyfill.js') }}"></script>
    <script src="{{ asset('js/scroll.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-reboot.css') }}">
    {{--
    <link href=" {{ asset('css/styels/home.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/styles/styles.css') }}">
    <title>HOME</title>
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
                            <li class="header__li">
                                <form id="header__nav-logout" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </header>
        <div id="content">
            <main>
                <section class="title">
                    <div class="title__inner">
                        <div class="title__photo">
                            <div class="cover-slide hover-darken">
                                <img class="title__img" src="{{ asset('img/sports-731506_1280.jpg') }}" alt="ランニング">
                            </div>
                        </div>
                        <h2 class="title__main-title">One Step</h2>
                        <p class="title__sub-title">【One Step】は毎日の運動の記録をつけて習慣化出来るアプリです。<br>
                            記録はカレンダーに登録していき、毎日継続できているか確認出来るようにしておきます。</p>
                        <p>習慣化する事で自然と健康的な身体を手に入れることが出来ますよ。<br>
                            初めは少ない時間から始めて、慣れてきたら項目を増やして色々な運動を試していきましょう！</p>
                    </div>
                    <div class="title__guest-login-button">
                        <a class="btn btn-success btn-lg" href="{{ route('guest.login') }}">ゲストログイン</a>
                    </div>
                </section>
                <section class="information">
                    <div class="information__inner">
                        <div class="information__discription">
                            <h2 class="information__step">Step1</h2>
                            <h3 class="information__step-sub">：項目の設定</h3>
                            <p class="information__sub-title">習慣にしたい項目を決めましょう！<br>
                                項目を作成するとカレンダーに記録を付けることが出来ます。<br></p>
                            <p class="information__ex">例）毎朝6時に起きる・筋トレ・朝食を作るなど</p>
                        </div>
                        <div class="information__discription">
                            <h2 class="information__step">Step2</h2>
                            <h3 class="information__step-sub">：目標の設定</h3>
                            <p class="information__sub-title">その項目に対して何を行うのか目標を設定してください！<br>
                                最初は小さな目標を決めておくと継続しやすいです。<br></p>
                            <p class="information__ex">例）ランニングを習慣にする場合「毎日5分だけ走る」など</p>
                        </div>
                        <div class="information__discription">
                            <h2 class="information__step">Step3</h2>
                            <h3 class="information__step-sub">：記録を付けて継続を見える化する</h3>
                            <p class="information__sub-title">目標が決まったら達成をした日に記録を付けていきます。<br>
                                達成したか、しなかったのかを記録していくだけなので、簡単に管理することが出来ますよ！<br>
                                毎日継続をしてモチベーションに繋げていきましょう！
                            </p>
                        </div>
                    </div>
                    <div class="information__guest-login-button">
                        <a class="btn btn-success btn-lg" href="{{ route('guest.login') }}">ゲストログイン</a>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>

</html>
