<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>手机读故事网 - 每天读点故事在线阅读</title>
    <meta name="keywords" content="手机读故事网，每天读点故事在线阅读">
    <meta name="description" content="手机读故事网,最适宜手机阅读的精品原创故事。作家作品集页面可以让你免费看完你喜欢的作家故事全文。电脑在线每天读点故事，让生活充满故事色彩。">
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
</head>
<body>

<!-- navbar top -->
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
<!-- end navbar top -->

<!-- side nav left-->
<div class="side-nav-panel-left">
    <ul id="slide-out-left" class="side-nav side-nav-panel collapsible">
        <li class="profil">
            <img src="{{ asset('static/img/profile.jpg') }}" alt="">
            <h2>John Doe</h2>
            <h6>Mobile Developer</h6>
        </li>
        <li class="li-top">
            <div class="collapsible-header"><i class="fa fa-home"></i>Home <span><i class="fa fa-caret-down"></i></span></div>
            <div class="collapsible-body">
                <ul class="side-nav-panel">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="home-shop.html">Home Shop</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="fa fa-shopping-cart"></i>Shop <span><i class="fa fa-caret-down"></i></span></div>
            <div class="collapsible-body">
                <ul class="side-nav-panel">
                    <li><a href="home-shop.html">Shop</a></li>
                    <li><a href="shop-single.html">Shop Single</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="fa fa-file-o"></i>Pages <span><i class="fa fa-caret-down"></i></span></div>
            <div class="collapsible-body">
                <ul class="side-nav-panel">
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="error404.html">404</a></li>
                    <li><a href="team.html">Team</a></li>
                    <li><a href="testimonial.html">Testimonial</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="collapsible-header"><i class="fa fa-bold"></i>Blog <span><i class="fa fa-caret-down"></i></span></div>
            <div class="collapsible-body">
                <ul class="side-nav-panel">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                </ul>
            </div>
        </li>
        <li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
        <li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
        <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
        <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
    </ul>
</div>
<!-- end side nav left-->

@yield('content')

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="about-us-foot">
            <h6>MAUDE</h6>
            <p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
        </div>
        <div class="social-media">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-google"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
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

</body>
</html>
