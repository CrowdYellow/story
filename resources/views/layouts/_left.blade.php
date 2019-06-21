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
                    <li><a href="">Home</a></li>
                    <li><a href="">Home Shop</a></li>
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
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        <li><a href="login.html"><i class="fa fa-sign-in"></i>Login</a></li>
        <li><a href="register.html"><i class="fa fa-user-plus"></i>Register</a></li>
    </ul>
</div>
<!-- end side nav left-->