@extends('layouts.app')
@section('content')
    <!-- single post -->
    <div class="pages section" id="switchLoad">
        @include('layouts._top_nav')
        <div class="container">
            <div class="blog-single">
                <div class="blog-single-content">
                    <h5>{{ $article->title }}</h5>
                    <div class="date">
                        <span><i class="fa fa-calendar"></i> {{ $article->created_at }}</span>
                    </div>
                    <p>{!! $article->body !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end single post -->
@stop
@section('js')
    <script src="{{ asset('static/js/jquery.SuperSlide.2.1.3.js') }}"></script>
    <script>
        jQuery("#switchLoad").slide({ switchLoad:"_src",delayTime:0 });
    </script>
@stop