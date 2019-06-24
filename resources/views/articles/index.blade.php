@extends('layouts.app')
@section('content')
    <!-- blog -->
    <div class="pages section">
        <div class="container">
            <div class="blog">
                @include('layouts._top_nav')
                @foreach($articles as $article)
                    <div class="row">
                        <div class="col s12">
                            <div class="blog-content">
                                <img src="{{ $article->cover }}" alt="">
                                <div class="blog-detailt">
                                    <h5><a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a></h5>
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
