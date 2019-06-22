@extends('layouts.app')
@section('content')
    <style>
        em {
            font-style: normal
        }
        .logo {
            height: 200px;
            background: #ff8800;
            text-align: center;
            position: relative;
            margin-top: 50px;
        }

        .mylogo {
            border-radius: 100%;
            width: 80px;
            height: 80px;
            border: 4px solid #fff;
            box-shadow: 0 0 1px 0 #999;
            position: absolute;
            top: 40px;
            margin-left: -44px;
        }

        .userinfo {
            position: absolute;
            top: 130px;
            width: 100%;
            color: #fff;
            font-size: 12px;
            text-align: center;
        }

        .userinfo a {
            color: #fff;
        }

        .userinfo em {
            margin: 0 5px;
            color: #ffbb00;
        }
        .article {
            margin: 5px 10px;
        }
        .article ul {
            margin-top: 5px;
        }
        .article li {
            padding: 3px 0 8px;
            border-bottom: 1px solid #eee;
            margin-bottom: 5px;
        }
        .article li h3 em {
            font-weight: normal;
            font-size: 12px;
            float: right;
            color: #999;
            font-style: normal;
        }
    </style>
    <div class="logo">
        <div>
            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="mylogo">
        </div>
        <div class="userinfo">
            <h2>
                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
            </h2>
            文章：{{ $articles->total() }}
            <em>|</em>
            访问：{{ $user->views_count }}
            <em>|</em>
            <a href="">加关注</a>
        </div>
    </div>
    <div class="article">
        <ul>
            @foreach($articles as $article)
                <li>
                    <h3 style="font-size: 1.2rem;font-weight: bold">
                        <em>{{ $article->created_at }}</em>
                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                    </h3>
                    <div>
                        <p>{{ $article->excerpt }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="pagination-blog">
                {!! $articles->render() !!}
            </div>
        </div>
    </div>
@stop