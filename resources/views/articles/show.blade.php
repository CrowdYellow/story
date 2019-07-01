@extends('layouts.app')
@section('title', $article->title.'-'.$article->category->name.'-'.getWebTitle()->web_title)
@section('keywords', $article->title)
@section('description', $article->excerpt)
@section('content')
    <style>
        .recommends .list a{
            display: block;
            width: 43%;
            float: left;
            padding: .5rem;
            background: #eee;
            margin: .5rem;
           /* height: 3rem;*/
            overflow: hidden;
        }
        .recommends .list:after{
            content: "";
            display: table;
            clear: both;
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
                        <a href="{{ url('/topics?category='.$article->category_id.'&topics='.$article->topic) }}"><span style="border: 1px solid #ccc;display: inline-block;padding: 5px;">{{ $article->topic }}</span></a>
                    </div>
                    <p>{!! $article->body !!}</p>
                    <div id="otherUrl" class="share-post" style="border: 0">
                        <a href=''><img src='' alt=''></a>
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
                <div id="otherArt" class="share-post" style="border: 0">
                    <a href=''><img src='' alt=''></a>
                </div>
                <div style="padding:0.42667rem 0.42667rem;font-size:1rem">
                    <dt>相关阅读</dt>
                </div>
                <div class="recommends">
                    <div class="list">
                        @foreach($otherArticles as $otherArticle)
                            <a href="{{ route('articles.show', $otherArticle->id) }}">
                                <strong>{{ $otherArticle->title }}</strong>
                               {{-- <p>{{ $otherArticle->excerpt }}</p>--}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p style="text-align: center;" id="weChat"></p>
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
            $("#weChat").html("<img src='/"+data.wechat+"'>");
            console.log(data.wechat);
        }
    });
    $.ajax({
        url: "/api/ads",
        type: "GET",
        dataType: "json",
        success:function (data) {
            $("#otherUrl").html("<a href='"+data[0].url+"'><img src='/"+data[0].images+"' alt=''></a>");
            $("#otherArt").html("<a href='"+data[1].url+"'><img style='width: 100%;' src='/"+data[1].images+"' alt=''></a>");
        }
    });
</script>

@stop