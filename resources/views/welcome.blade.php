@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('content')

    <!-- Featured post Start -->
    @if(count($featured)>0)
        <div class="hero-section section mt-5 mb-20">
            <div class="container">
                @foreach($featured as $news)
                    <div class="featured-post featured-post-2 {{!$loop->first ? "pt-5 pb-2":""}}">
                        <div class="featured post-container">
                            <h2>
                                <a href="{{ url(@$news->url()) }}">
                                    {{@$news->title}} </a>
                            </h2>
                            <div class="sandeshtoday-title">
                                <ul class="post-tags featured-post-details">
                                    <li>
                                        <div class="sandeshtoday-author-wrap">
                                            <span class="author-img">
                                            <img src="{{asset('assets/backend/images/favicon-32x32.png')}}" alt=""></span>
                                            <span class="author-name"> {{ ($news->authors !== null ) ? ucwords(@$news->authors) : "Sandesh Today"}}  </span>
                                        </div>
                                    </li>
                                    <li><i class="fa fa-clock-o"></i>
                                        {{  @$news->getMinsAgoinNepali() }}
                                    </li>
                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                </ul>
                            </div>
                            @if($loop->first || $news->show_featured_image !== null )
                                <div class="featured-post-img">
                                    <a href="{{ url(@$news->url()) }}">
                                        <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="{{@$news->title}}" loading="lazy">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @if($below_featured !== null )
            <div class="banner home-banner">
                <div class="container">
                    <div class="desktop-banner ">
                        <span>Advertisement</span>
                        <a href="{{@$below_featured->url}}" target="_blank">
                            <img src="{{asset('/images/banners/'.@$below_featured->image)}}" alt="">
                        </a>
                    </div>
                    <div class="tablet-banner">
                        <span>Advertisement</span>
                        <a href="{{@$below_featured->url}}" target="_blank">
                            <img src="{{asset('/images/banners/'.@$below_featured->image)}}" alt="">
                        </a>
                    </div>
                    <div class="mobile-banner">
                        <span>Advertisement</span>
                        <a href="{{@$below_featured->url}}" target="_blank">
                            <img src="{{asset('/images/banners/'.@$below_featured->image)}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <!-- latest-post-section
			================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <!-- block content -->
                    <div class="block-content pb-0">

                        <!-- grid box -->
                        <div class="grid-box">

                            <div class="title-section">
                                <h1><span>ताजा अपडेट</span></h1>
                            </div>
                            <div class="row">
                                @foreach(getLatestPosts(0,4) as $latest_news_feature)
                                    @if($loop->first)
                                        <div class="col-md-7 fresh-update">
                                            <div class="news-post image-post2">
                                                <div class="post-gallery ">
                                                    <div class="veil">
                                                        <img src="{{($latest_news_feature->image !== null) ?  asset('/images/blog/'.@$latest_news_feature->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                    </div>
                                                    <div class="hover-box">
                                                        <div class="inner-hover">
                                                            <h2><a href="{{ url(@$latest_news_feature->url()) }}">
                                                                    {{ ucfirst(@$latest_news_feature->title)}}
                                                                </a></h2>
                                                            <ul class="post-tags tagged">
                                                                <li><i class="fa fa-clock-o"></i>{{  $latest_news_feature->getMinsAgoinNepali() }}</li>
{{--                                                                <li><i class="fa fa-eye"></i>872</li>--}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-5">
                                            <ul class="list-posts">
                                                <li>
                                                    <a href="{{ url(@$latest_news_feature->url()) }}">
                                                        <img src="{{($latest_news_feature->image !== null) ?  asset('/images/blog/'.@$latest_news_feature->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                    </a>
                                                    <div class="post-content">
                                                        <h2><a href="{{ url(@$latest_news_feature->url()) }}">
                                                                {{ ucfirst(@$latest_news_feature->title)}}
                                                            </a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>{{  $latest_news_feature->getMinsAgoinNepali() }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="row">
                                @foreach(getLatestPosts(4,4) as $latest_news_feature)
                                    @if($loop->first)
                                        <div class="col-md-7">
                                            <div class="news-post image-post2">
                                                <div class="post-gallery">
                                                    <div class="veil">
                                                        <img src="{{($latest_news_feature->image !== null) ?  asset('/images/blog/'.@$latest_news_feature->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                    </div>
                                                    <div class="hover-box">
                                                        <div class="inner-hover">
                                                            <h2><a href="{{ url(@$latest_news_feature->url()) }}">
                                                                    {{ ucfirst(@$latest_news_feature->title)}}
                                                                </a></h2>
                                                            <ul class="post-tags tagged">
                                                                <li><i class="fa fa-clock-o"></i>{{  $latest_news_feature->getMinsAgoinNepali() }}</li>
                                                                {{--                                                                <li><i class="fa fa-eye"></i>872</li>--}}
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-5">
                                            <ul class="list-posts">
                                                <li>
                                                    <a href="{{ url(@$latest_news_feature->url()) }}">
                                                        <img src="{{($latest_news_feature->image !== null) ?  asset('/images/blog/'.@$latest_news_feature->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                    </a>
                                                    <div class="post-content">
                                                        <h2><a href="{{ url(@$latest_news_feature->url()) }}">
                                                                {{ ucfirst(@$latest_news_feature->title)}}
                                                            </a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>{{  $latest_news_feature->getMinsAgoinNepali() }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach

                            </div>

                        </div>
                        <!-- End grid box -->

                        <!-- homepage banner -->
                        <div class="banner">
                            @sandeshloop(getHomepageBanner('home-banner',0,1) as $banner)
                                <div class="desktop-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tablet-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="mobile-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                            @endsandeshloop

                        </div>
                        <!-- End homepage banner -->


                    </div>
                    <!-- End block content -->

                </div>

                <div class="col-sm-4">

                    <!-- sidebar -->
                    <div class="sidebar home-sidebar">
                        <div class="widget tab-posts-widget">

                            <ul class="nav nav-tabs two-nav-tabs" id="myTab">
                                <li class="active">
                                    <a href="#popular1" data-toggle="tab">लोकप्रिय</a>
                                </li>
                                @if(count($popular_comments)>0)
                                    <li>
                                        <a href="#commented1" data-toggle="tab">धेरै कमेन्ट रहेको</a>
                                    </li>
                                @endif
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active sidebar-content" id="popular1">
                                    <ul class="list-posts">
                                        @sandeshloop(@$topnews_week as $popular)
                                        <li>
                                            <a href="{{ url(@$popular->url()) }}">
                                                <img src="{{($popular->image !== null) ?  asset('/images/blog/'.@$popular->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                            </a>
                                            <div class="post-content">
                                                <h2>
                                                    <a href="{{ url(@$popular->url()) }}">
                                                        {{@$popular->title}}
                                                    </a>
                                                </h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{  $popular->getMinsAgoinNepali() }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endsandeshloop

                                    </ul>
                                </div>
                                @if(count($popular_comments)>0)
                                    <div class="tab-pane sidebar-content" id="commented1">
                                        <ul class="list-posts">

                                            @sandeshloop(@$popular_comments as $popular)

                                            <li>
                                                <a href="{{ url(@$popular->url()) }}">
                                                    <img src="{{($popular->image !== null) ?  asset('/images/blog/'.@$popular->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                                </a>
                                                <div class="post-content">
                                                    <h2>
                                                        <a href="{{ url(@$popular->url()) }}">
                                                            {{@$popular->title}}
                                                        </a>
                                                    </h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa fa-comments-o"></i>{{ @$popular->comments_count }}</li>
                                                    </ul>
                                                </div>
                                            </li>
                                            @endsandeshloop
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="banner side-banner">
                            @sandeshloop(getHomepageBanner('home-sidebar-banner',0,1) as $banner)
                                <div class="desktop-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tablet-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="mobile-banner">
                                <span>Advertisement</span>
                                <a href="{{@$banner->url}}" target="_blank">
                                    <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                </a>
                            </div>
                            @endsandeshloop
                            @sandeshloop(getHomepageBanner('home-sidebar-banner',1,2) as $banner)
                                <div class="tablet-banner">
                                <span>Advertisement</span>
                                <a href="{{@$banner->url}}" target="_blank">
                                    <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                </a>
                            </div>
                            @endsandeshloop
                        </div>
                    </div>
                    <!-- End sidebar -->

                </div>

            </div>
        </div>
    </section>
    <!-- End block-wrapper-section -->


    <section class="features-today">
        <div class="container">

            <div class="title-section">
                <h1><span>समाचार</span></h1>
            </div>

            <div class="features-today-box owl-wrapper">
                <div class="owl-carousel" data-num="4">
                    @sandeshloop(getCategoryRelatedPost('समाचार',0,8) as $news)
                        <div class="item news-post standard-post">
                        <div class="post-gallery">
                            <a href="{{ url(@$news->url()) }}">
                                <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                            </a>
                        </div>
                        <div class="post-content">
                            <h2>
                                <a href="{{ url(@$news->url()) }}">
                                    {{@$news->title}}
                                </a>
                            </h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                            </ul>
                        </div>
                    </div>
                    @endsandeshloop
                </div>
            </div>

        </div>
    </section>
    <!-- End features-today-section -->

    <!-- block-wrapper-section
        ================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">

                    <!-- block content -->
                    <div class="block-content pb-0">

                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">

                            <div class="title-section">
                                <h1><span class="world">अर्थ</span></h1>
                            </div>

                            <div class="owl-carousel artha-section" data-num="2">

                                <div class="item">
                                    @foreach(getCategoryRelatedPost('अर्थ',0,5) as $news)

                                        @if($loop->first)
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <div class="veil">
                                                    <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                </div>
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2>
                                                            <a href="{{ url(@$news->url()) }}">
                                                                {{@$news->title}}
                                                            </a>
                                                        </h2>
                                                        <ul class="post-tags tagged">
                                                            <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <ul class="list-posts">
                                                <li>
                                                        <a href="{{ url(@$news->url()) }}">
                                                            <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                                        </a>
                                                    <div class="post-content">
                                                        <h2>
                                                            <a href="{{ url(@$news->url()) }}">
                                                                {{@$news->title}}
                                                            </a>
                                                        </h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif

                                    @endforeach
                                </div>

                                <div class="item">
                                    @foreach(getCategoryRelatedPost('अर्थ',5,5) as $news)

                                        @if($loop->first)
                                            <div class="news-post image-post2">
                                                <div class="post-gallery">
                                                    <div class="veil">
                                                        <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                    </div>
                                                    <div class="hover-box">
                                                        <div class="inner-hover">
                                                            <h2>
                                                                <a href="{{ url(@$news->url()) }}">
                                                                    {{@$news->title}}
                                                                </a>
                                                            </h2>
                                                            <ul class="post-tags tagged">
                                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <ul class="list-posts">
                                                <li>
                                                    <a href="{{ url(@$news->url()) }}">
                                                        <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                                    </a>
                                                    <div class="post-content">
                                                        <h2>
                                                            <a href="{{ url(@$news->url()) }}">
                                                                {{@$news->title}}
                                                            </a>
                                                        </h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        @endif

                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <!-- End carousel box -->

                        <!-- homepage banner 2 -->
                        <div class="banner">
                            @sandeshloop(getHomepageBanner('home-banner',1,1) as $banner)
                                <div class="desktop-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tablet-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="mobile-banner">
                                <span>Advertisement</span>
                                <a href="{{@$banner->url}}" target="_blank">
                                    <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                </a>
                            </div>
                            @endsandeshloop

                        </div>
                        <!-- End homepage banner 2 -->

                    </div>
                    <!-- End block content -->

                </div>

                <div class="col-sm-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        @sandeshloop(getHomepageBanner('home-sidebar-banner',1,3) as $banner)
                            <div class="banner home-banner">
                                <div class="desktop-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tablet-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="mobile-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endsandeshloop

                    </div>
                    <!-- End sidebar -->

                </div>

            </div>

        </div>
    </section>
    <!-- End block-wrapper-section -->


    <section class="heading-news2">

        <div class="container">

            <div class="title-section white pt-15">
                <h1><span>राजनीति</span></h1>
            </div>
            <div class="iso-call heading-news-box">
                <div class="image-slider snd-size">
                    <span class="top-stories"> भर्खरै </span>
                    <ul class="bxslider">
                       @sandeshloop(getCategoryRelatedPost('राजनीति',0,3) as $news)
                            <li>
                                <div class="news-post image-post">
                                    <div class="veil">
                                        <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                    </div>
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <h2>
                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                            </h2>
                                            <ul class="post-tags tagged">
                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
{{--                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endsandeshloop
                    </ul>
                </div>
                @foreach(getCategoryRelatedPost('राजनीति',3,4) as $news)
                    <div class="news-post image-post {{($loop->first) ? "default-size":""}}">
                        <div class="veil">
                            <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                        </div>
                        <div class="hover-box">
                            <div class="inner-hover">
                                <h2>
                                    <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                </h2>
                                <ul class="post-tags tagged">
                                    <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
{{--                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>--}}
                                </ul>
{{--                                <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>--}}
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>

    </section>
    <!-- End heading-news-section -->


    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">

                    <!-- block content -->
                    <div class="block-content pb-0">

                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">

                            <div class="title-section">
                                <h1><span>देश/प्रदेश</span></h1>
                            </div>

                            <div class="owl-carousel desh" data-num="2">

                                @foreach(getCategoryRelatedPost('देश/प्रदेश',0,8)->chunk(2) as $chunked)

                                    <div class="item">
                                        @foreach(@$chunked as $news)
                                            <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <div class="veil">
                                                    <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                                </div>
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2>
                                                            <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                                        </h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <!-- End carousel box -->


                        <div class="banner">
                            @sandeshloop(getHomepageBanner('home-banner',2,1) as $banner)
                                <div class="desktop-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tablet-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="mobile-banner">
                                    <span>Advertisement</span>
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                            @endsandeshloop
                        </div>
                    </div>
                    <!-- End block content -->

                </div>

                <div class="col-md-4 col-sm-4">

                    <!-- sidebar -->
                    <div class="sidebar large-sidebar">

                        <div class="widget features-slide-widget">
                            <div class="title-section">
                                <h1><span>विचार</span></h1>
                            </div>
                            <div class="image-post-slider mb-30">
                                <ul class="bxslider">
                                    @sandeshloop(getCategoryRelatedPost('विचार',0,2) as $news)
                                        <li>
                                            <div class="news-post image-post2">
                                                <div class="post-gallery">
                                                    <div class="veil">
                                                        <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                                    </div>
                                                    <div class="hover-box">
                                                        <div class="inner-hover">
                                                            <h2>
                                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                                            </h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endsandeshloop

                                </ul>
                            </div>
                            <ul class="list-posts hide-2posts-md">
                                @sandeshloop(getCategoryRelatedPost('विचार',2,5) as $news)
                                    <li>
                                        <div class="bichar">
                                            <img class="bichar-image" src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                        </div>
                                        <div class="post-content">
                                            <h2>
                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                            </ul>
                                        </div>
                                    </li>
                                @endsandeshloop
                            </ul>
                        </div>

                    </div>
                    <!-- End sidebar -->

                </div>

            </div>

        </div>
    </section>

@endsection
