@extends('layouts.app')
@section('content')
    <style>
        .related {
            display: flex;
        }

        .related li {
            width: 50%;
            border: 1px solid #ccc;
            padding: .5rem;
        }
    </style>
    <!-- single post -->
    <div class="pages section">
        @include('layouts._top_nav')
        <div class="container">
            <div class="blog-single">
                <div class="blog-single-content" id="switchLoad">
                    <h2>{{ $article->title }}</h2>
                    <div class="date">
                        <span><i class="fa fa-calendar"></i> {{ $article->created_at }}</span>
                    </div>
                    <div style="text-align: right;padding: .5rem">
                        <span style="border: 1px solid #ccc;display: inline-block;padding: 5px;">{{ $article->topic }}</span>
                    </div>
                    <p>{!! $article->body !!}</p>
                    <div class="share-post">
                        <ul>
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="comment">
                <div class="comment-details">
                    <div class="row">
                        <div class="col s3">
                            <img src="{{ asset($article->user->avatar) }}" width="90" alt="">
                        </div>
                        <div class="col s9">
                            <div class="comment-title">
                                <span><strong>{{ $article->user->name }}</strong> | {{ $article->user->created_at }} | <a
                                            href="">作家</a></span>
                            </div>
                            <p id="articles-list"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div style="padding:0.42667rem 0.42667rem;font-size:1rem">
                    <dt>相关阅读</dt>
                </div>
                <div class="recommends">
                    <div class="list">
                        @foreach($otherArticles as $otherArticle)
                            <a href="{{ route('article.show', $otherArticle->id) }}">
                                <dl>
                                    <dd>
                                        <strong>{{ $otherArticle->title }}</strong>
                                        <p>{{ $otherArticle->excerpt }}</p>
                                    </dd>
                                </dl>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p style="text-align: center;"><img src="//www.guozhi.org/wx_tz/wxewm_ledu.jpg"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end single post -->
    <script>
        let images = document.getElementById("switchLoad").getElementsByTagName("img");
        for (var i = 0; i < images.length; i++) {
            images[i].src = images[i].getAttribute("_src");
        }
        ajax({
            url: "/api/{{ $article->user->id }}/articles",              //请求地址
            type: "GET",                       //请求方式
            success: function (response, xml) {
                var data = JSON.parse(response);
                let box = document.getElementById("articles-list");
                let p = '';
                console.log(data.length);
                for (let i = 0; i < data.length; i++) {
                    p += "<p><a style='color: #ff6d00' href='/articles/" + data[i].id + "'>" + data[i].title + "</a></p>";
                }
                box.innerHTML = p;
            },
            fail: function (status) {
                // 此处放失败后执行的代码
            }
        });

        function ajax(options) {
            options = options || {};
            options.type = (options.type || "GET").toUpperCase();
            options.dataType = options.dataType || "json";
            var params = formatParams(options.data);

            //创建 - 非IE6 - 第一步
            if (window.XMLHttpRequest) {
                var xhr = new XMLHttpRequest();
            } else { //IE6及其以下版本浏览器
                var xhr = new ActiveXObject('Microsoft.XMLHTTP');
            }

            //接收 - 第三步
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    var status = xhr.status;
                    if (status >= 200 && status < 300) {
                        options.success && options.success(xhr.responseText, xhr.responseXML);
                    } else {
                        options.fail && options.fail(status);
                    }
                }
            }

            //连接 和 发送 - 第二步
            if (options.type == "GET") {
                xhr.open("GET", options.url + "?" + params, true);
                xhr.send(null);
            } else if (options.type == "POST") {
                xhr.open("POST", options.url, true);
                //设置表单提交时的内容类型
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send(params);
            }
        }

        //格式化参数
        function formatParams(data) {
            var arr = [];
            for (var name in data) {
                arr.push(encodeURIComponent(name) + "=" + encodeURIComponent(data[name]));
            }
            arr.push(("v=" + Math.random()).replace(".", ""));
            return arr.join("&");
        }
    </script>
@stop