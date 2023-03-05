@extends('frontend.layouts.seo_master')
@section('title'){{ucfirst(@$singleBlog->title)}} @endsection
@section('css')
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63d38be7e591ca001a314048&product=inline-share-buttons&source=platform" async="async"></script>

    <style>
     @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap");

        .custom-editor .media{
            display: block;
        }

        .custom-editor{
            font-size: 1.1875rem;
        }
        .canosoft-listing ul,.canosoft-listing ol {
            padding: 0;
            margin-left: 15px;
        }
        .single-post  .elementor-top-section {
            padding: 0;
        }


    </style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singleBlog->title)}} | @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else सन्देश टूडे @endif</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleBlog->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleBlog->meta_tags)}}' />
    <meta property='article:published_time' content='<?php if(@$singleBlog->updated_at !=''){?>{{@$singleBlog->updated_at}} <?php }else {?> {{@$singleBlog->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ (@$singleBlog->meta_description !== null) ? ucfirst(@$singleBlog->meta_description): @$singleBlog->shortContent(60) }}" />
    <meta property="og:title" content="{{ (@$singleBlog->meta_title !== null) ?   ucfirst(@$singleBlog->meta_title) : ucfirst(@$singleBlog->title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="News Portal" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else  सन्देश टूडे @endif" />
    <meta property="og:image" content="{{($singleBlog->image !== null) ?  asset('/images/blog/'.@$singleBlog->image) : asset('assets/backend/images/sandesh_today.png')}}" />
    <meta property="og:image:url" content="{{($singleBlog->image !== null) ?  asset('/images/blog/'.@$singleBlog->image) : asset('assets/backend/images/sandesh_today.png')}}" />
    <meta property="og:image:size" content="300" />

@endsection
@section('content')

    <!-- block-wrapper-section
			================================================== -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">

                    <!-- block content -->
                    <div class="block-content">

                        <!-- single-post box -->
                        <div class="single-post-box" id="main-content">
                            <div class="title-post" id="sticky-me">
                                <h1>{{ucfirst(@$singleBlog->title)}} </h1>
                                <ul class="post-tags featured-post-details">
                                    <li><img src="{{asset('assets/backend/images/favicon-32x32.png')}}" alt="" />
                                        {{($singleBlog->authors !== null ) ? ucwords(@$singleBlog->authors) : "सन्देश टूडे"}}
                                    </li>
                                    <li><i class="fa fa-clock-o"></i>{{$singleBlog->publishedDateNepali()}}</li>
                                    @if(!empty(Auth::user()) && Auth::user()->user_type !== 'viewer')
                                        <li><i class="fa fa-eye"></i>{{@$singleBlog->totalCount()}}</li>
                                        <li><i class="fa fa-edit"></i><a class="edit-post" href="{{route('blog.edit',$singleBlog->id)}}">Edit</a></li>
                                    @endif

                                    <div class="sharethis-inline-share-buttons float-end"></div>

{{--                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li>--}}
{{--                                    <li><i class="fa fa-eye"></i>872</li>--}}
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <div class="banner">
                                    @if(@$above !== null)
                                        <div class="desktop-banner">
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$above->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tablet-banner">
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$above->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="mobile-banner">
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$above->image)}}" alt="">
                                            </a>
                                        </div>
                                        @endif
                                    </div>

{{--                                <ul class="share-box">--}}
{{--                                    <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>--}}
{{--                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i><span>Share on Facebook</span></a></li>--}}
{{--                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i><span>Share on Twitter</span></a></li>--}}
{{--                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>--}}
{{--                                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>--}}
{{--                                </ul>--}}
                            </div>

                            <div class="post-gallery">
                                <img src="{{($singleBlog->image !== null) ?  asset('/images/blog/'.@$singleBlog->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                            </div>
                            <div class="share-post-box border-top">
                                <div class="banner">
                                    @if(@$below !== null)
                                        <div class="desktop-banner">
                                            <a href="{{@$below->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$below->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tablet-banner">
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$below->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="mobile-banner">
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$below->image)}}" alt="">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="post-content editor-content editor-flx" id="content">
                                {!! $singleBlog->description !!}
                            </div>
                        </div>
                        <div class="single-post-box">
                            <div class="post-tags-box">
                                <ul class="tags-box">
                                    <li><span>Category:</span></li>
                                    @foreach($singleBlog->categories as $cat)
                                        <li><a href="#">{{$cat->name}}</a></li>
                                    @endforeach
                                    <li class="float-end""><div class="sharethis-inline-share-buttons"></div>
                                    </li>

                                </ul>

                            </div>

                            <div class="prev-next-posts">
                                @if(@$previous !== null)
                                    <div class="prev-post">
                                        <img src="{{(@$previous->image !== null) ?  asset('/images/blog/'.@$previous->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                        <div class="post-content">
                                            <h2>
                                                <a href="{{ url(@$previous->url()) }}">
                                                    {{@$previous->title}}</a>
                                            </h2>

                                        </div>
                                    </div>
                                @endif
                                @if(@$next !== null)
                                    <div class="next-post">
                                        <img src="{{(@$next->image !== null) ?  asset('/images/blog/'.@$next->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                        <div class="post-content">
                                            <h2>
                                                <a href="{{ url(@$next->url()) }}">
                                                    {{@$next->title}}</a>
                                            </h2>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- contact form box -->
                            <div class="contact-form-box comment-block">
                                <div class="title-section">
                                    <h1><span>प्रतिक्रिया गर्नुहोस्</span>
                                        @if(!empty(Auth::user()) && Auth::user()->user_type == 'viewer')
                                            <span class="email-not-published">Posting as: <a href="{{route('front-user.dashboard')}}">{{ ucwords(@Auth::user()->name) }} </a></span>
                                        @endif
                                    </h1>
                                </div>
                                @if(!empty(Auth::user()) && Auth::user()->user_type == 'viewer')
                                    @include('frontend.pages.blogs.comments')
                                @else
                                    <div class="share-post-box">
                                        <ul class="share-box">
                                            <li><span>प्रतिक्रिया गर्न लग इन गर्नु होस्:</span></li>
                                            <li><a class="google" href="{{route('google.redirect')}}"><i class="fa fa-google"></i> Login via Google</a></li>
                                            {{--                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share on Twitter</a></li>--}}
                                        </ul>
                                    </div>
                                    <div class="comment-block">
                                        @foreach($singleBlog->comments as $comment)
                                            <div class="comment">
                                                <div class="user-banner">
                                                    <div class="user">
                                                        @if(@$comment->user->image && str_contains(@$comment->user->image, 'https'))
                                                            <img class="avatar rounded-circle default"
                                                                 src="{{@$comment->user->image}}"/>
                                                        @elseif(@$comment->user->image)
                                                            <img class="avatar rounded-circle social"
                                                                 src="{{asset('/images/user/'.@$comment->user->image)}}"/>
                                                        @else
                                                            <div class="avatar" style="background-color:#fff5e9;border-color:#ffe0bd; color:#F98600">
                                                                {{getFirstLetters($comment->user->name)}}
                                                                {{--                        <span class="stat green"></span>--}}
                                                            </div>
                                                        @endif

                                                        <h5>{{ $comment->user->name }}</h5>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <p>
                                                        {{@$comment->comment}}
                                                    </p>
                                                </div>

                                                <div class="footer">
                                                    <div class="reactions">
                                                        <button class="btn btn-like react " data-comment="{{ $comment->id}}">
                                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                            <span class="like-count-{{ $comment->id}}">{{ ($comment->likes()>0) ? $comment->likes():""}}</span>
                                                        </button>
                                                        <button class="btn btn-dislike react" data-comment="{{ $comment->id}}">
                                                            <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                                            <span class="dislike-count-{{ $comment->id}}">{{  ($comment->dislikes()>0) ? $comment->dislikes():"" }}</span>
                                                        </button>
                                                    </div>
                                                    <div class="divider"></div>
                                                    <span class="is-mute">{{@$comment->getCommentedAgoinNepali()}}</span>
                                                </div>
                                            </div>
                                            @if(count($comment->replies)>0)
                                                @foreach($comment->replies as $reply)
                                                    <div class="reply comment">
                                                        <div class="user-banner">
                                                            <div class="user">
                                                                <div class="avatar">
                                                                    @if(@$reply->user->image && str_contains(@$reply->user->image, 'https'))
                                                                        <img class="avatar rounded-circle"
                                                                             src="{{@$reply->user->image}}"/>
                                                                    @elseif(@$reply->user->image)
                                                                        <img class="avatar rounded-circle"
                                                                             src="{{asset('/images/user/'.@$reply->user->image)}}"/>
                                                                    @else
                                                                        <div class="avatar" style="background-color:#fff5e9;border-color:#ffe0bd; color:#F98600">
                                                                            {{getFirstLetters($reply->user->name)}}
                                                                            {{--                        <span class="stat green"></span>--}}
                                                                        </div>
                                                                    @endif
                                                                    {{--                                <span class="stat green"></span>--}}
                                                                </div>
                                                                <h5>{{ @$reply->user->name }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <p><a class="tagged-user">@ {{ $comment->user->name }}</a>
                                                                {{@$reply->comment}}
                                                            </p>
                                                        </div>
                                                        <div class="footer">
                                                            <div class="reactions">
                                                                <button class="btn btn-like react" data-comment="{{ $reply->id}}">
                                                                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                                    <span class="like-count-{{ $reply->id}}">{{  ($reply->likes()>0) ? $reply->likes():"" }}</span>
                                                                </button>
                                                                <button class="btn btn-dislike react" data-comment="{{ $reply->id}}">
                                                                    <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                                                    <span class="dislike-count-{{$reply->id}}">{{  ($reply->dislikes()>0) ? $reply->dislikes():"" }}</span>
                                                                </button>
                                                            </div>
                                                            <div class="divider"></div>
                                                            <span class="is-mute">{{@$reply->getCommentedAgoinNepali()}}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>


                                @endif



                            </div>
                            <!-- End contact form box -->

                            <!-- carousel box -->
                            <div class="masonry-box carousel-box owl-wrapper mt-40">
                                <div class="title-section property-title">
                                    <h1>
                                        <span>
                                            @if(@$setting_data->property_ad_logo !== null)
                                            <img src="{{asset('/images/settings/'.@$setting_data->property_ad_logo)}}" alt="">
                                            @else
                                                Property Advertisement
                                            @endif
                                        </span>
                                    </h1>
                                </div>

                                <div class="features-today-box owl-wrapper">
                                    <div class="owl-carousel" data-num="3">
                                        @sandeshloop(@$property_ads as $ads)
                                        <div class="item news-post standard-post2 default-size property-post">
                                            <div class="post-gallery">
                                                <a href="{{ @$ads->url}}">
                                                    <img src="{{($ads->image !== null) ?  asset('/images/banners/'.@$ads->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-title">
                                                <h2><a href="{{ @$ads->url}}"> {{@$ads->name}} </a></h2>
                                                <ul class="post-tags property-tags">
                                                    <li>{{@$ads->amount}} <span class="property-amt">Total Amount</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endsandeshloop
                                    </div>
                                </div>
                            </div>
                            <!-- End carousel box -->

                            <!-- carousel box -->
                            <div class="masonry-box carousel-box owl-wrapper">
                                <div class="title-section">
                                    <h1><span>सम्बन्धित खबर</span></h1>
                                </div>

                                <div class="features-today-box owl-wrapper">
                                    <div class="owl-carousel" data-num="3">
                                        @sandeshloop(@$singleBlog->relatedPostsByCategory() as $news)
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
                            <!-- End carousel box -->



                        </div>
                        <!-- End single-post box -->

                    </div>
                    <!-- End block content -->

                </div>
                <div class="col-sm-3">

                    <!-- sidebar -->
                    <div class="sidebar">
                        @if(count(@$singleBlog->singleSidebarAds( 0, 1))>0)
                            @sandeshloop(@$singleBlog->singleSidebarAds(0,1) as $banner)
                                <div class="banner">
                                    <div class="desktop-banner">
                                        <a href="{{@$banner->url}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="tablet-banner">
                                        <a href="{{@$banner->url}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="mobile-banner">
                                        <a href="{{@$banner->url}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endsandeshloop
                        @endif

                        <div class="widget features-slide-widget single-post-sidebar" style="margin-top: 10px;">
                            <div class="title-section">
                                <h1><span>लोकप्रिय</span></h1>
                            </div>
                            <div class="image-post-slider">
                                <ul class="list-posts">
                                    @sandeshloop(@$topnews_week as $popular)
                                        <li>
                                            <img src=" {{($popular->image !== null) ?  asset('/images/blog/'.@$popular->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                            <div class="post-content">
                                                <h2><a href="{{ url(@$popular->url()) }}">
                                                        {{@$popular->title}}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{  $popular->getMinsAgoinNepali() }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endsandeshloop
                                </ul>
                            </div>
                        </div>

                        @if(count(@$singleBlog->singleSidebarAds( 1, 3))>0)
                            @sandeshloop(@$singleBlog->singleSidebarAds(1,3) as $banner)
                            <div class="banner">
                                <div class="desktop-banner">
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="tablet-banner">
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="mobile-banner">
                                    <a href="{{@$banner->url}}" target="_blank">
                                        <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endsandeshloop
                        @endif

                        <div class="widget features-slide-widget single-post-sidebar" style="margin-top: 10px;">
                                <div class="title-section">
                                    <h1><span>ताजा अपडेट</span></h1>
                                </div>
                                <div class="image-post-slider">
                                    <ul class="list-posts">
                                        @sandeshloop(@$latestPosts as $popular)
                                        <li>
                                            <img src="{{($popular->image !== null) ?  asset('/images/blog/'.@$popular->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                            <div class="post-content">
                                                <h2><a href="{{ url(@$popular->url()) }}">
                                                        {{@$popular->title}}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{  $popular->getMinsAgoinNepali() }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endsandeshloop
                                    </ul>
                                </div>
                            </div>

                        @if(count(@$singleBlog->singleSidebarAds( 4, 3))>0)
                                @sandeshloop(@$singleBlog->singleSidebarAds(4,3) as $banner)
                                <div class="banner">
                                    <div class="desktop-banner">
                                        <a href="{{@$banner->url}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="tablet-banner">
                                        <a href="{{@$banner->url}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="mobile-banner">
                                        <a href="{{@$banner->url}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$banner->image)}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                @endsandeshloop
                            @endif

{{--                            <div class="widget post-widget">--}}
{{--                                <div class="title-section">--}}
{{--                                    <h1><span>Featured Video</span></h1>--}}
{{--                                </div>--}}
{{--                                <div class="news-post video-post">--}}
{{--                                    <img alt="" src="upload/news-posts/video-sidebar.jpg">--}}
{{--                                    <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>--}}
{{--                                    <div class="hover-box">--}}
{{--                                        <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>--}}
{{--                                        <ul class="post-tags">--}}
{{--                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <p>Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis. </p>--}}
{{--                            </div>--}}
                    </div>
                    <!-- End sidebar -->

                </div>

            </div>

        </div>
    </section>
    <!-- End block-wrapper-section -->

@endsection

@section('js')

    <script>
        $(window).scroll(function () {
            var threshold =650;
            if ($(window).scrollTop() >= threshold){
                $('#sticky-me').addClass('sticky-header');
            }else{
                $('#sticky-me').removeClass('sticky-header');
            }


            var check = $("#main-content").height() + 250;
            if ($(window).scrollTop() > check) {
                $('#sticky-me').addClass('bottom');
            }else {
                $('#sticky-me').removeClass('bottom');
            }
        });
        $(document).ready(function () {

            var numb = $('.editor-content').find('p').size();

            let between1 = '{{$between1 ?? 'n/a'}}';
            let between2 = '{{$between2[0] ?? 'n/a'}}';
            console.log(between2);

            if(between1 !=='n/a' && numb > 2){
                var banner1 ='<div class="banner"> ' +
                    '<div class="desktop-banner"> ' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt=""></a> ' +
                    '</div>' +
                    '<div class="tablet-banner">' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt=""></a> ' +
                    '</div> ' +
                    '<div class="mobile-banner"> ' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt=""></a> ' +
                    '</div> ' +
                    '</div>';
                $( ".editor-content p:nth-child(2)" ).after().append(banner1);
            }

            if(between2 !=='n/a' && numb > 4){

                var banner2 ='<div class="banner"> ' +
                    '<div class="desktop-banner"> ' +
                    '<a href="{{(@$between2[0]->url !== null) ? @$between2[0]->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between2[0]->image)}}" alt=""></a> ' +
                    '</div>' +
                    '<div class="tablet-banner">' +
                    '<a href="{{(@$between2[0]->url !== null) ? @$between2[0]->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between2[0]->image)}}" alt=""></a> ' +
                    '</div> ' +
                    '<div class="mobile-banner"> ' +
                    '<a href="{{(@$between2[0]->url !== null) ? @$between2[0]->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between2[0]->image)}}" alt=""></a> ' +
                    '</div> ' +
                    '</div>';
                    $( ".editor-content p:nth-child(4)").after().append(banner2);
            }

        });
        $(function() {

            $('.replybutton').on('click', function() {
                $('.replybox').hide();
                var commentboxId = $(this).attr('data-commentbox');
                $('#'+commentboxId).toggle();
            });

            $('.cancelbutton').on('click', function() {
                $('.replybox').hide();
            });

        });
        $(document).on('click','#saveLikeDislike',function(){
            var _comment = $(this).data('comment');
            var _type    = $(this).data('type');
            var _user    = $(this).data('user');
            var vm       = $(this);
            // Run Ajax
            $.ajax({
                url:"{{ url('comment-like-dislike') }}",
                type:"post",
                dataType:'json',
                data:{
                    comment:_comment,
                    user:_user,
                    type:_type,
                    _token:"{{ csrf_token() }}"
                },
                beforeSend:function(){
                    vm.closest(".reactions ").addClass("disabled-reaction");
                },
                success:function(res){
                    if(res.bool == true){
                        vm.removeClass('disabled').addClass('active');
                        vm.removeAttr('id');
                        var _prevCount=$("."+_type+"-count-"+_comment).text();
                        _prevCount++;
                        $("."+_type+"-count-"+_comment).text(_prevCount);
                    }
                }
            });
        });
    </script>
@endsection
