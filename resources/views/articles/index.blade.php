@extends('layouts.app')
@section('content')
<!-- blog -->
<div class="pages section">
    <div class="container">
        <div class="blog">
            <div class="row">
                <div class="col s12">
                    <div class="blog-content">
                        <img src="{{ asset('static/img/blog1.jpg') }}" alt="">
                        <div class="blog-detailt">
                            <h5><a href="">How To Design Fresh and Clean</a></h5>
                            <div class="date">
                                <span><i class="fa fa-calendar"></i> July 22, 2016</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quasi sit aperiam quia voluptatem odio, facere iusto magni sunt, cumque quae, molestias temporibus ducimus repellendus!</p>
                            <div class="button-default">Read More</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="blog-content">
                        <img src="{{ asset('static/img/blog2.jpg') }}" alt="">
                        <div class="blog-detailt">
                            <h5><a href="">How To Design Fresh and Clean</a></h5>
                            <div class="date">
                                <span><i class="fa fa-calendar"></i> July 22, 2016</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quasi sit aperiam quia voluptatem odio, facere iusto magni sunt, cumque quae, molestias temporibus ducimus repellendus!</p>
                            <div class="button-default">Read More</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="blog-content">
                        <img src="{{ asset('static/img/blog3.jpg') }}" alt="">
                        <div class="blog-detailt">
                            <h5><a href="">How To Design Fresh and Clean</a></h5>
                            <div class="date">
                                <span><i class="fa fa-calendar"></i> July 22, 2016</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quasi sit aperiam quia voluptatem odio, facere iusto magni sunt, cumque quae, molestias temporibus ducimus repellendus!</p>
                            <div class="button-default">Read More</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="pagination-blog">
                        <ul>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end blog -->
@stop