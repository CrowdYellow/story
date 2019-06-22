@section('css')
    <style>
        body, dd, div, dl, dt, fieldset, form, h1, h2, h3, h4, h5, h6, img, input, li, ol, p, pre, td, textarea, th, ul {
            padding: 0;
            margin: 0
        }

        img {
            border: 0
        }

        li, ol, ul {
            list-style: none
        }

        a {
            text-decoration: none;
        }

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
        .recommends {
            width: 15rem;
            overflow: hidden;
            margin: 0px auto 0.5rem;
            padding-top: 0.25rem;
        }
        .recommends .list {
            width: 16rem;
        }
        a, a:hover {
            text-decoration: none;
            color: #5A6F79;
        }
        .recommends .list dl {
            width: 7.25rem;
            overflow: hidden;
            float: left;
            margin: 0px 0.5rem 0.5rem 0px;
            background: #eee;
        }
        .recommends .list dd {
            width: 6.25rem;
            overflow: hidden;
            padding: 0.35rem 0px 0px 0.5rem;
        }
        .recommends .list dd strong {
            width: 6.25rem;
            margin: 0px 0.5rem 0.1rem 0px;
            max-height: 0.85rem;
            overflow: hidden;
            line-height: 0.875rem;
            font-size: 14px;
            color: rgb(81, 81, 81);
            font-weight: normal;
            display: block;
        }
        .recommends .list dd p {
            display: none;
        }
        @media only screen and (min-width: 750px) {
            .mainList_dl dd p { display: block; }
            /*	.recommends .list dl { height: 9rem; } */
            .recommends .list dd p { color: rgb(170, 170, 170); font-size: 10px; line-height: 0.75rem; max-height: 1.5rem; min-height: 1.5rem; overflow: hidden; width: 6.25rem; padding-top: 0.01rem; display: block; }
        }
        @media only screen and (max-width: 320px) {
            .mainList_dl dd p { display: block; }
            /*	.recommends .list dl { height: 9rem; } */
            .recommends .list dd p { color: rgb(170, 170, 170); font-size: 10px; line-height: 0.75rem; max-height: 1.5rem;  min-height:1.5rem;overflow: hidden; width: 6.25rem; padding-top: 0.25rem; display: block; }
        }
    </style>
@stop
<div class="row nav-top">
    <div class="nav">
        <a class="on">推荐<i></i></a>
        <a>爱情<i></i></a>
        <a>奇幻<i></i></a>
        <a>悬疑<i></i></a>
        <a class="sq">世情</a>
        <span data-type="open" class="open"></span>
    </div>
    <div class="all">
        <a class="on">推荐<i></i></a>
        <a>爱情<i></i></a>
        <a>奇幻<i></i></a>
        <a>悬疑<i></i></a>
        <a>世情<i></i></a>
        <a>婚姻<i></i></a>
        <a>青春<i></i></a>
        <a>励志<i></i></a>
        <a>小知识<i></i></a>
        <a>情趣<i></i></a>
        <a>问答<i></i></a>
        <a>娱乐<i></i></a>
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