@extends('frontend.layouts.master')
@section('title') समाचार @endsection

@section('content')

    <section class="block-wrapper">
        <div class="container">

            <!-- block content -->
            <div class="block-content non-sidebar">
                <div class="grid-box">
                    <div class="title-section">
                        <h1><span class="world">समाचार</span></h1>
                    </div>
                    @sandeshloop(@$allPosts->chunk(2) as $chunked)
                        <div class="row">
                            @foreach($chunked as $news)
                                <div class="col-md-6">
                                    <div class="news-post standard-post2 all-post">
                                        <div class="post-gallery">
                                            <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                        </div>
                                        <div class="post-title">
                                            <h2>
                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endsandeshloop
                    {{ $allPosts->links('vendor.pagination.default') }}

                </div>
            </div>
            <!-- End block content -->
        </div>
    </section>
@endsection
