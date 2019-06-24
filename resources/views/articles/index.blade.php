@extends('layouts.app')
@section('content')
    <style>
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
    <!-- blog -->
    <div class="pages section">
        <div class="container">
            <div class="blog">
                <div class="all">
                    <a class="{{ active_class(if_route('home')) }}" href="/">推荐<i></i></a>
                    @foreach($categories as $category)
                        <a class="{{ active_class((if_route('categories.show') && if_route_param('category', $category->id))) }}" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}<i></i></a>
                    @endforeach
                </div>
                @foreach($articles as $article)
                    <div class="row">
                        <div class="col s12">
                            <div class="blog-content">
                                <img src="{{ $article->cover }}" alt="">
                                <div class="blog-detailt">
                                    <h5><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                    </h5>
                                    <div class="date">
                                        <span><i class="fa fa-calendar"></i> {{ $article->created_at }}</span>
                                    </div>
                                    <p>{{ $article->excerpt }}</p>
                                    <a href="{{ route('articles.show', $article->id) }}" class="button-default">阅读全文</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col s12">
                        <div class="pagination-blog">
                            {!! $articles->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end blog -->
@stop
