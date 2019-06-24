@extends('layouts.app')
@section('content')
    <style>
        .recommends .list a{
            display: block;
            width: 43%;
            float: left;
            padding: .5rem;
            background: #eee;
            margin: .5rem;
            height: 3rem;
            overflow: hidden;
        }
        .recommends .list:after{
            content: "";
            display: table;
            clear: both;
        }
        .all {
            padding: 1rem 0;
        }
        .all a{
            display: inline-block;
            padding: .5rem;
            font-size: 1.1rem;
        }
        a.active{
            border-bottom: 0.15rem solid rgb(255, 111, 33);
        }
    </style>
    <!-- single post -->
    <div class="pages section">
        <div class="container">
            <div class="blog-single">
                <div class="all">
                    <a class="{{ active_class(if_route('home')) }}" href="/">推荐<i></i></a>
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show', $category->id) }}" class="@if($article->category_id == $category->id) active @endif ">{{ $category->name }}<i></i></a>
                    @endforeach
                </div>
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
                            <a href="{{ route('users.show', $article->user->id) }}"><img src="{{ asset($article->user->avatar) }}" width="90" alt=""></a>
                        </div>
                        <div class="col s9">
                            <div class="comment-title">
                                <span>
                                    <strong>
                                        <a href="{{ route('users.show', $article->user->id) }}">
                                            {{ $article->user->name }}
                                        </a>
                                    </strong>
                                    |
                                    {{ $article->user->created_at }}
                                    |
                                    <a href="">作家</a></span>
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
                            <a href="{{ route('articles.show', $otherArticle->id) }}">
                                <strong>{{ $otherArticle->title }}</strong>
                                <p>{{ $otherArticle->excerpt }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p style="text-align: center;" id="weChat"><img src="//www.guozhi.org/wx_tz/wxewm_ledu.jpg"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- end single post -->

@stop
@section('js')
<script>
    let images = document.getElementById("switchLoad").getElementsByTagName("img");
    for (var i = 0; i < images.length; i++) {
        images[i].src = images[i].getAttribute("_src");
    }
    $.ajax({
        url: "/api/{{ $article->user->id }}/articles",
        type: "GET",
        dataType: "json",
        success:function (data) {
            // var data = JSON.parse(response);
            let box = document.getElementById("articles-list");
            let p = '';
            for (let i = 0; i < data.length; i++) {
                p += "<p><a style='color: #ff6d00' href='/articles/" + data[i].id + "'>" + data[i].title + "</a></p>";
            }
            box.innerHTML = p;
        }
    });
    $.ajax({
        url: "/api/wechat",
        type: "GET",
        dataType: "json",
        success:function (data) {
            console.log(data.wechat);
        }
    });
</script>

@stop