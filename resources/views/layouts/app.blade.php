<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '')</title>
    <meta name="keywords" content="{{ getWebTitle()->web_keywords }}">
    <meta name="description" content="{{ getWebTitle()->web_description }}">
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <link rel="stylesheet" href="{{ asset('static/css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('static/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/fakeLoader.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('static/img/favicon.png') }}">
    @yield('css')
</head>
<style>
    .pagination li a {
        font-size: .5rem;
    }
</style>
<body>

<!-- navbar top -->
<div class="myHeaderWrap">
    <div class="searBox">
        <div class="search">
            <form id="searchForm" method="get" target="_blank" action="/">
                <input type="text" name="search" placeholder="输入关键字搜索故事..." value="" class="search_input"  id="bdcsMain">
                <span class="search_sub"  type="submit">
                    <i class="fa fa-search"></i>
                </span>
            </form>
        </div>
    </div>
    <div class="navbar-top">
        <div class="side-nav-panel-left">
            <a href="#" data-activates="slide-out-left" class="side-nav-left"><i class="fa fa-bars"></i></a>
        </div>
        <!-- site brand	 -->
        <div class="site-brand">
            <a href="index.html"><h1>手机读故事</h1></a>
        </div>
        <!-- end site brand	 -->
        <div class="side-nav-panel-right">
            <a href="" class="side-nav-right"><i class="fa fa-search"></i></a>
        </div>
    </div>
</div>

<!-- end navbar top -->

@include('layouts._left')

@yield('content')

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="about-us-foot">
            <h6>手机阅读</h6>
            <p>手机读故事网,最适宜手机阅读的精品原创故事。作家作品集页面可以让你免费看完你喜欢的作家故事全文。电脑在线每天读点故事，让生活充满故事色彩。</p>
        </div>
        <div class="copyright">
            <span>© 2018 All Right Reserved</span>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- scripts -->
<script src="{{ asset('static/js/jquery.min.js') }}"></script>
<script src="{{ asset('static/js/materialize.min.js') }}"></script>
<script src="{{ asset('static/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('static/js/fakeLoader.min.js') }}"></script>
<script src="{{ asset('static/js/main.js') }}"></script>
@yield('js')
</body>
</html>
