<!-- side nav left-->
<div class="side-nav-panel-left">
    <ul id="slide-out-left" class="side-nav side-nav-panel collapsible">
        @guest
            <div style="height: 200px;"></div>
            <li class="li-top"><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>登陆</a></li>
            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i>注册</a></li>
        @else
            <li class="profil">
                <img src="{{ asset(user()->avatar) }}" alt="">
                <h2>{{ user()->name }}</h2>
                <h6>{{ user()->introduction }}</h6>
            </li>
            <li class="li-top">
                <a href="{{ route('users.show', user()->id) }}"><i class="fa fa-user"></i>个人中心</a>
            </li>
            <li>
                <a href="{{ route('users.password', user()->id) }}"><i class="fa fa-lock"></i>修改密码</a>
            </li>
            <li>
                <a href="{{ route('users.name', user()->id) }}"><i class="fa fa-edit"></i>修改名称</a>
            </li>
            <li>
                <a href="{{ route('users.avatar', user()->id) }}"><i class="fa fa-picture-o"></i>修改头像</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-in"></i>
                    退出登录
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</div>
<!-- end side nav left-->