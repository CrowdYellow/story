@section('css')
    <style>
        .nav-top {
            width: 100%;
            height: 1.8rem;
            position: relative;
        }
        .nav-top .nav a {
            display: block;
            float: left;
            width: 2.65rem;
            height: 1.8rem;
            line-height: 1.8rem;
            text-align: center;
            font-size: 18px;
            color: rgb(133, 133, 133);
            position: relative;
        }
        .nav-top .nav a.on {
            height: 1.65rem;
            border-bottom: 0.15rem solid rgb(255, 111, 33);
            color: rgb(255, 111, 33);
            font-weight: bold;
        }
        .nav span {
            display: block;
            float: left;
            width: 1.45rem;
            height: 1rem;
            overflow: hidden;
            background: transparent url(https://www.guozhi.org/skin/yokam/arrow_down.png) no-repeat scroll 0% 0% / 50% auto;
            cursor: pointer;
            position: absolute;
            right: 0.05rem;
            bottom: 0.025rem;
        }
        .nav-top .all.on {
            height: 3.8rem;
        }
        .nav-top .all {
            width: 16rem;
            height: 0px;
            overflow: hidden;
            background: rgb(255, 255, 255) none repeat scroll 0% 0%;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: 999;
            transition: all 0.3s ease 0s;
        }
        .nav-top .nav {
            width: 16rem;
            height: 1.8rem;
            overflow: hidden;
            background: rgb(255, 255, 255) none repeat scroll 0% 0%;
            box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.12);
        }
        .nav-top .all a {
            display: block;
            float: left;
            width: 2.65rem;
            height: 1.8rem;
            line-height: 1.8rem;
            text-align: center;
            font-size: 18px;
            color: rgb(133, 133, 133);
            position: relative;
        }
        .nav-top .all a.on {
            color: rgb(255, 111, 33);
            font-weight: bold;
            height: 1.65rem;
            border-bottom: 0.15rem solid rgb(255, 111, 33);
        }
        .nav-top .all span {
            display: block;
            float: left;
            width: 1.45rem;
            height: 1rem;
            overflow: hidden;
            background: transparent url(https://www.guozhi.org/skin/yokam/arrow_up.png) no-repeat scroll 0% 0% / 50% auto;
            cursor: pointer;
            position: absolute;
            right: 0.05rem;
            bottom: 0.025rem;
            opacity: 0;
            transition: all 0.5s ease 0s;
        }
        .nav-top .all.on span {
            opacity: 1;
        }
    </style>
@stop
<div class="row nav-top">
    <div class="nav">
        <a class="on" href="/">推荐<i></i></a>
        <a href="{{ route('categories.show', 1) }}">爱情<i></i></a>
        <a href="{{ route('categories.show', 2) }}">奇幻<i></i></a>
        <a href="{{ route('categories.show', 3) }}">悬疑<i></i></a>
        <a class="sq" href="{{ route('categories.show', 4) }}">世情</a>
        <span data-type="open" class="open"></span>
    </div>
    <div class="all">
        <a class="on" href="/">推荐<i></i></a>
        <a href="{{ route('categories.show', 1) }}">爱情<i></i></a>
        <a href="{{ route('categories.show', 2) }}">奇幻<i></i></a>
        <a href="{{ route('categories.show', 3) }}">悬疑<i></i></a>
        <a href="{{ route('categories.show', 4) }}">世情<i></i></a>
        <a href="{{ route('categories.show', 5) }}">婚姻<i></i></a>
        <a href="{{ route('categories.show', 6) }}">青春<i></i></a>
        <a href="{{ route('categories.show', 7) }}">励志<i></i></a>
        <a href="{{ route('categories.show', 8) }}">小知识<i></i></a>
        <a href="{{ route('categories.show', 9) }}">情趣<i></i></a>
        <a href="{{ route('categories.show', 10) }}">问答<i></i></a>
        <a href="{{ route('categories.show', 11) }}">娱乐<i></i></a>
        <span data-type="close" class="close"></span>
    </div>
</div>
@section('js')
    <script>
        //字体大小
        (function (doc, win) {
            var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function () {
                    var clientWidth = docEl.clientWidth;
                    if (!clientWidth) return;
                    docEl.style.fontSize = 40 * (clientWidth / 640) + 'px';
                };
            if (!doc.addEventListener) return;
            win.addEventListener(resizeEvt, recalc, false);
            doc.addEventListener('DOMContentLoaded', recalc, false);
        })(document, window);

        $('.open').click(function () {
            $('.all').addClass('on')
        });
        $('.close').click(function () {
            $('.all').removeClass('on')
        });
        //选择
        $(".nav,.all").on("click", "a", function () {
            $(this).addClass('on').siblings().removeClass('on');
            $('.all').removeClass('on')
        });

        $(".all").on("click", "a", function () {
            var i = $(this).index();
            $(this).addClass('on').siblings().removeClass('on');
            $('.nav a').removeClass('on')
            $('.all').removeClass('on');
            var aa = $('.all a').eq(i).text();
            $('.sq').text(aa).addClass('on')
        });
    </script>
@stop