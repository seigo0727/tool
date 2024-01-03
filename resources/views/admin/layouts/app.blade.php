<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body class="h-100">
    <div class="d-flex flex-row w-100 h-100">
        @include('admin.layouts.sidebar')
        <!— メインコンテンツ -->
        <main class="w-100 bg-light">
            @include('admin.layouts.header')
            <!— タイトルバー -->
            <div class="container-fluid">
                <div class="fs-4 fw-bold mt-3">Dashboard</div>
            </div>
            <!— コンテンツ -->
            <div class="p-3">
                <div class="d-flex flex-row">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>    
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {

    var sidemenuToggle = document.getElementById('toggle');
    // メインコンテンツを囲むmain要素
    var page = document.getElementsByTagName('main')[0];
    // 表示状態 trueで表示中 falseで非表示
    var sidemenuStatus = true;
    // ボタンクリック時のイベント
    sidemenuToggle.addEventListener('click', () => {
        // 表示状態を判定
        if(sidemenuStatus){
            page.style.cssText = 'margin-left: -230px'
            sidemenuStatus = false;
        }else{
            page.style.cssText = 'margin-left: 0px'
            sidemenuStatus = true;
        }
    });

    // デバッグバーの高さ取得
    var debugbarHeight = getDebugbarHeight();

    // 初期設定でコンテンツ要素の上の余白を設定
    adjustContentMargin(debugbarHeight);

    // ウィンドウサイズが変更されたときにデバッグバーの高さを再取得し、コンテンツの高さを調整
    window.addEventListener('resize', function () {
        debugbarHeight = getDebugbarHeight();
        adjustContentMargin(debugbarHeight);
    });
});

// デバッグバーの高さを取得する関数
function getDebugbarHeight() {
        var debugbar = document.querySelector('.phpdebugbar');
        return debugbar ? debugbar.offsetHeight : 0;
    }

// コンテンツの上の余白を調整する関数
function adjustContentMargin(debugbarHeight) {
    var contentElement = document.querySelector('.content');
    if (contentElement) {
        contentElement.style.marginTop = debugbarHeight + 'px';
    }
}
</script>
@yield('after_script')
</html>
