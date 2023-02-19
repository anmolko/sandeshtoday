@extends('frontend.layouts.master')
@section('title') सबै समाचार @endsection

@section('content')

    @if(count($allPosts)>0)
        <section class="block-wrapper">
            <div class="container">

                <!-- block content -->
                <div class="block-content non-sidebar">

                    <!-- grid box -->
                    <div class="grid-box">
                        <div class="masonry-box">
                            <div class="title-section category-title">
                                <h1><span></span></h1>
                            </div>
                            <div class="latest-articles iso-call">
                                @sandeshloop(@$allPosts as $key=>$news)
                                    <div class="news-post standard-post2 default-size category-posts">
                                        <div class="post-gallery">
                                            <a href="{{ url(@$news->url()) }}">
                                                <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}"></a>
                                        </div>
                                        <div class="post-title">
                                            <h2>
                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>                                    </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endsandeshloop

                            </div>
                        </div>
                        <div class="pagination-box">
                            {{ $allPosts->links('vendor.pagination.default') }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection
