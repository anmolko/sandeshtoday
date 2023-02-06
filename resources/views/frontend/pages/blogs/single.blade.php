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
        .bottom{
            top:auto;
            bottom:0;
            position:absolute;
        }

        #st-1 .st-btn:hover {
            opacity: .7;
            top: 4px!important;
        }

        .post-block-wrapper .comment-head{
            border-bottom: none;
        }

     .post-block-wrapper .comment-head::before, .post-block-wrapper .comment-head::after{
         background-color: transparent;
     }

     .post-block-wrapper .comment-head .post-block-tab-list > li{
         margin-right: 0px;
         box-shadow: 0px 1px 1px rgb(0 0 0 / 6%);
     }
     .comment-head .post-block-tab-list.feature-post-tab-list > li > a.active{
         background: #f7f7f7;
     }
     .post-block-wrapper .comment-head .post-block-tab-list > li a{
         width: 100%;
         height: 35px;
         border: 1px solid #f1f1f1;
         line-height: 24px;
         font-size: 16px;
         padding: 5px 8px;
     }

     .comment-block .group-radio .post-block-tab-list li:last-child{
         border-top-right-radius: 8px;
         border-right: 1px solid #e8e8e8;
         border-top: 1px solid #e8e8e8;
         border-bottom: 1px solid #e8e8e8;
         border-bottom-right-radius: 8px;
     }
     .comment-block .group-radio .post-block-tab-list li:first-child{
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
        border-left: 1px solid #e8e8e8;
        border-top: 1px solid #e8e8e8;
        border-bottom: 1px solid #e8e8e8;
     }
</style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singleBlog->title)}} | @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else दर्पण दैनिक @endif</title>
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
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else  दर्पण दैनिक @endif" />
    <meta property="og:image" content="{{($singleBlog->image !== null) ?  asset('/images/blog/'.@$singleBlog->image) : asset('assets/backend/images/darpan_dainik.png')}}" />
    <meta property="og:image:url" content="{{($singleBlog->image !== null) ?  asset('/images/blog/'.@$singleBlog->image) : asset('assets/backend/images/darpan_dainik.png')}}" />
    <meta property="og:image:size" content="300" />
@endsection
@section('content')
    <!-- Blog Section Start -->
    <div class="blog-section section">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row">
                <div class="col-lg-12 col-12 margin-bottom-30">

                    <div class="single-blog big-header" id="sticky-me">
                        <div class="blog-wrap header">
                            <h1 class="title">{{ucfirst(@$singleBlog->title)}}</h1>

                            <!-- Meta -->
                            <div class="meta fix">
                                 <span class="meta-item darpan-post-time darpan-author">
                                    <img src="{{asset('assets/backend/images/canosoft-favicon.png')}}" alt="">
                                    <span> {{ ($singleBlog->authors !== null ) ? ucwords(@$singleBlog->authors) : "दर्पण दैनिक"}}  </span>
                                </span>
                                <span class="meta-item news-hour-block">
                                    <img src="{{asset('assets/frontend/img/clock.png')}}" alt="">
                                    <span>{{$singleBlog->publishedDateNepali()}}</span>
                                </span>
                                @if(!empty(Auth::user()) && Auth::user()->user_type !== 'viewer')
                                    <span class="meta-item news-hour-block">
                                        <img src="{{asset('assets/frontend/img/view.png')}}" alt="">
                                        <span>Views: {{@$singleBlog->totalCount()}}</span>
                                    </span>
                                    <span class="meta-item news-hour-block">
                                        <img src="{{asset('assets/frontend/img/edit.png')}}" alt="">
                                        <span><a class="edit-post" href="{{route('blog.edit',$singleBlog->id)}}">Edit Post</a> </span>
                                    </span>
                                @endif
                                {{--                                <span class="meta-item news-hour-block">--}}
                                {{--                                    <img src="{{asset('assets/frontend/img/comment-icon.png')}}" alt="">--}}
                                {{--                                    <span><a href="#">0 प्रतिक्रिया</a></span>--}}
                                {{--                                </span>--}}


                                <span>
                                    <div class="sharethis-inline-share-buttons"></div>
                                </span>

                            </div>




                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-12 mb-50">

                    <div class="single-blog mb-50" id="main-content">
                        <div class="blog-wrap">
                            @if($singleBlog->excerpt !== null)
                                <div class="excerpt editor-flx">
                                    <p>{{@$singleBlog->excerpt}}</p>
                                </div>
                            @endif

                            @if(@$above !== null)
                                <div class="post-middle-banner mb-4">
                                    <a href="{{ (@$above->url !== null) ? @$above->url:"#"}}" target="_blank">
                                        <img  src="{{asset('/images/banners/'.@$above->image)}}"  alt="{{@$side->name}}"  />
                                    </a>
                                </div>
                            @endif
                            <div class="image"><img src="{{($singleBlog->image !== null) ?  asset('/images/blog/'.@$singleBlog->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post"></div>


                            {{--                                <div class="meta fix">--}}
                            {{--                                    <span class="font-btn">--}}
                            {{--                                        <a id="big">अ</a>--}}
                            {{--                                        <a id="normal">अ</a>--}}
                            {{--                                        <a id="small">अ</a>--}}
                            {{--                                    </span>--}}
                            {{--                                    @if(count($singleBlog->categories)>0)--}}
                            {{--                                        <span class="categories float-end">--}}
                            {{--                                            <i class="fa fa-list-alt"></i>--}}

                            {{--                                            @foreach($singleBlog->categories as $cat)--}}
                            {{--                                                <a href="#">{{$cat->name}}</a>--}}
                            {{--                                                {{($loop->last) ?"":"," }}--}}
                            {{--                                            @endforeach--}}
                            {{--                                        </span>--}}
                            {{--                                    @endif--}}
                            {{--                                    <span class="meta-item view"><i class="fa fa-eye"></i>(3483)</span>--}}
                            {{--                                </div>--}}

                            @if(@$below !== null)
                                <div class="post-middle-banner mb-4">
                                    <a href="{{ (@$below->url !== null) ? @$below->url:"#"}}" target="_blank">
                                        <img  src="{{asset('/images/banners/'.@$below->image)}}"  alt="{{@$below->name}}"  />
                                    </a>
                                </div>
                        @endif
                        <!-- Content -->
                            <div class="content editor-content editor-flx" id="content">
                                {{-- Description --}}
                                {!! $singleBlog->description !!}

                                {{--                                    <div class="inside-editor-content col-lg-12 col-md-6 col-12">--}}
                                {{--                                        <a href="#"><img src="{{asset('assets/frontend/img/gifs/side3.gif')}}" alt="Sidebar Banner"></a>--}}
                                {{--                                        <a href="#"><img src="{{asset('assets/frontend/img/gifs/side3.gif')}}" alt="Sidebar Banner"></a>--}}
                                {{--                                        <a href="#"><img src="{{asset('assets/frontend/img/gifs/side3.gif')}}" alt="Sidebar Banner"></a>--}}
                                {{--                                    </div>--}}


                            </div>


                            <div class="tags-social float-start">

                                @if(@$belowpost !== null)
                                    <div class="post-middle-banner mb-4">
                                        <a href="{{ (@$belowpost->url !== null) ? @$belowpost->url:"#"}}" target="_blank">
                                            <img src="{{asset('/images/banners/'.@$belowpost->image)}}" alt="{{@$belowpost->name}}" target="_blank" />
                                        </a>
                                    </div>
                                @endif
                                @if(count($singleBlog->tags)>0)
                                    <div class="tags float-start">
                                        <i class="fa fa-tags"></i>

                                        @foreach($singleBlog->tags as $tag)
                                            <a href="#">{{$tag->name}}</a>
                                            {{($loop->last) ?"":"," }}
                                        @endforeach
                                    </div>
                                @endif
                                <div class="blog-social float-end">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>

                            </div>

                        </div>
                    </div>


                @if(count(@$singleBlog->relatedPostsByCategory())>0)
                    <!-- Post Block Wrapper Start -->
                        <div class="post-block-wrapper mb-50">

                            <!-- Post Block Head Start -->
                            <div class="head">
                                <!-- Title -->
                                <h4 class="title">सम्बन्धित खबर</h4>
                            </div><!-- Post Block Head End -->

                            <!-- Post Block Body Start -->
                            <div class="body">

                                <div class="two-column-post-carousel column-post-carousel post-block-carousel slick-space">

                                    @darpanloop(@$singleBlog->relatedPostsByCategory() as $related)
                                    <div class="slick-slide">

                                        <!-- Overlay Post Start -->
                                        <div class="post post-overlay hero-post">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <div class="image"><img src="{{($related->image !== null) ?  asset('/images/blog/'.@$related->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post"></div>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title"><a href="#">  {{ @$related->title }} </a></h4>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ $related->publishedDateNepali() }}</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div><!-- Overlay Post End -->

                                    </div>
                                    @enddarpanloop
                                </div>

                            </div><!-- Post Block Body End -->

                        </div><!-- Post Block Wrapper End -->
                @endif


                <!-- comments -->
                    <div class="post-block-wrapper mb-50">

                            <!-- Post Block Head Start -->
                            <div class="head">

                                <!-- Title -->
                                <h4 class="title">प्रतिक्रिया गर्नुहोस्</h4>

                                @if(!empty(Auth::user()) && Auth::user()->user_type == 'viewer')

                                <div class="meta fix float-end">
                                    <a href="{{route('front-user.dashboard')}}" class="meta-item author">
                                        @if(@Auth::user()->image && str_contains(@Auth::user()->image, 'https'))
                                            <img class="avatar rounded-circle" style="height: 35px;"
                                                 src="{{@Auth::user()->image}}"/>
                                        @elseif(@Auth::user()->image)
                                         <img class="avatar rounded-circle" style="height: 35px;"
                                                 src="{{asset('/images/user'.@Auth::user()->image)}}"/>

                                        @else

                                            <img class="avatar rounded-circle" style="height: 35px;"
                                                 src="{{asset('assets/backend/images/default.png')}}"/>
                                        @endif

                                         {{ ucwords(@Auth::user()->name) }}</a>
                                </div>
                                @endif
                            </div><!-- Post Block Head End -->

                            <!-- Post Block Body Start -->
                            <div class="body">

                                <div class="post-comment-form">
                                    @if(!empty(Auth::user()) && Auth::user()->user_type == 'viewer')
                                        @include('frontend.pages.blogs.comments')
                                    @else
                                        <div style="text-align: center; margin-bottom: 10px">
                                            <p style="font-size: 18px;">प्रतिक्रिया गर्न लग इन गर्नु होस्:</p>

                                        </div>

                                        <div class="block-wrap">

                                            <!-- google	 -->
                                            <div>
                                                <a class="btn-google" href="{{route('google.redirect')}}">
                                                    <div class="google-content">
                                                        <div class="logo">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                                                <defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/>
                                                            </svg>
                                                        </div>
                                                        <p>Log in with Google</p>
                                                    </div>
                                                </a>
                                            </div>



                                        <!-- facebook	 -->
{{--                                            <div>--}}
{{--                                                <a class="btn-fb" href="{{route('facebook.redirect')}}">--}}
{{--                                                    <div class="fb-content">--}}
{{--                                                        <div class="logo">--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" version="1">--}}
{{--                                                                <path fill="#FFFFFF" d="M32 30a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v28z"/>--}}
{{--                                                                <path fill="#4267b2" d="M22 32V20h4l1-5h-5v-2c0-2 1.002-3 3-3h2V5h-4c-3.675 0-6 2.881-6 7v3h-4v5h4v12h5z"/>--}}
{{--                                                            </svg>--}}
{{--                                                        </div>--}}
{{--                                                        <p>Log in with Facebook</p>--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}

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
                                                        <button class="btn dropdown"><i class="ri-more-line"></i></button>
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
                                                                <button class="btn dropdown"><i class="ri-more-line"></i></button>
                                                            </div>
                                                            <div class="content">
                                                                <p><a class="tagged-user">@ {{ $comment->user->name }}</a>
                                                                    {{@$reply->comment}}
                                                                </p>
                                                            </div>
                                                            <div class="footer">
                                                                <button class="btn"><i class="ri-emotion-line"></i></button>
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

                            </div><!-- Post Block Body End -->

                        </div><!-- Post Block Wrapper End -->

                    <div class="row ">

                        <div class="col-lg-12 col-12 mb-50">

                            <!-- Post Block Wrapper Start -->
                            <div class="post-block-wrapper">

                                <!-- Post Block Head Start -->
                                <div class="head education-head">

                                    <!-- Title -->
                                    <h4 class="title">राजनीति
                                    </h4>
                                </div><!-- Post Block Head End -->

                                <!-- Post bottom -->
                                <div class="body pb-0">

                                    <div class="row">
                                        @darpanloop(getCategoryRelatedPost('राजनीति ',0,4) as $news)
                                        <!-- Post Start -->
                                        <div class="post education-post col-md-6 col-12 mb-20">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <a class="image" href="{{ url(@$news->url()) }}">
                                                    <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">
                                                </a>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title"><a href="{{ url(@$news->url()) }}">{{@$news->title}}</a></h4>

                                                    <!-- Read More -->
                                                    <a href="#" class="read-more">पुरा पढ्नुहोस् <i class="fa fa-angle-right"></i></a>

                                                </div>

                                            </div>
                                        </div><!-- Post End -->
                                        @enddarpanloop

                                    </div>
                                </div><!-- Post Block Body End -->

                            </div><!-- Post Block Wrapper End -->

                        </div>
                    </div><!-- World Post Row End -->
                </div>



                <!-- Sidebar -->
                <div class="col-lg-3 col-12 mb-50">
                    <div class="row">

                        <!-- Single Sidebar banners -->

                        @if(count(@$singleBlog->singleSidebarAds( 0, 5))>0)
                            @darpanloop(@$singleBlog->singleSidebarAds(0,5) as $side)
                            <div class="single-sidebar col-lg-12 col-md-6 col-12">

                                <!-- Sidebar Banner -->
                                <a href="{{ (@$side->url !== null) ? @$side->url:"#"}}" target="_blank" class="sidebar-banner">
                                    <img src="{{asset('/images/banners/'.@$side->image)}}" alt="{{@$side->name}}">
                                </a>

                            </div>
                            @enddarpanloop
                        @endif


                    <!-- Single Sidebar posts-->
                        <div class="single-sidebar">

                            <!-- Sidebar Block Wrapper -->
                            <div class="sidebar-block-wrapper">

                                <!-- Sidebar Block Head Start -->
                                <div class="side-head education-head">

                                    <!-- Tab List -->
                                    <div class="sidebar-tab-list education-sidebar-tab-list nav">
                                        <a class="active" data-bs-toggle="tab" href="#latest-news">ताजा अपडेट</a>
                                        <a data-bs-toggle="tab" href="#popular-news">लोकप्रिय</a>
                                    </div>

                                </div><!-- Sidebar Block Head End -->

                                <!-- Sidebar Block Body Start -->
                                <div class="body">

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="latest-news">
                                            @darpanloop(@$latestPosts as $latest)
                                            <div class="post post-small post-list education-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="{{ url(@$latest->url()) }}" style="flex: 0 0 100px;">
                                                        <div class="meta fix sidebar-time">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{  $latest->getMinsAgoinNepali() }}</span>
                                                        </div>
                                                        <img src="{{($latest->image !== null) ?  asset('/images/blog/'.@$latest->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">

                                                    </a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="{{ url(@$latest->url()) }}">{{$latest->title}}</a></h5>

                                                        <!-- Meta -->


                                                    </div>

                                                </div>
                                            </div><!-- Small Post End -->
                                            @enddarpanloop
                                        </div>

                                        <div class="tab-pane fade" id="popular-news">
                                            @darpanloop(@$topnews_week as $popular)
                                            <div class="post post-small post-list education-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image" href="{{ url(@$popular->url()) }}" style="flex: 0 0 100px;">
                                                        <div class="meta fix sidebar-time">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{  $popular->getMinsAgoinNepali($popular->created_at->diffForHumans()) }}</span>
                                                        </div>
                                                        <img src="{{($popular->image !== null) ?  asset('/images/blog/'.@$popular->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">

                                                    </a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="{{ url(@$popular->url()) }}">{{@$popular->title}}</a></h5>

                                                        <!-- Meta -->


                                                    </div>

                                                </div>
                                            </div><!-- Small Post End -->
                                            @enddarpanloop

                                        </div>
                                    </div>

                                </div><!-- Sidebar Block Body End -->

                            </div>

                        </div>

                        @if(count(@$singleBlog->singleSidebarAds( 5, 5))>0)
                            @darpanloop(@$singleBlog->singleSidebarAds(5,5) as $side)
                            <div class="single-sidebar col-lg-12 col-md-6 col-12">

                                <!-- Sidebar Banner -->
                                <a href="{{ (@$side->url !== null) ? @$side->url:"#"}}" target="_blank" class="sidebar-banner">
                                    <img src="{{asset('/images/banners/'.@$side->image)}}" alt="{{@$side->name}}">
                                </a>

                            </div>
                            @enddarpanloop
                        @endif


                    </div>
                </div><!-- Sidebar End -->

            </div><!-- Feature Post Row End -->

        </div>
    </div><!-- Blog Section End -->


@endsection

@section('js')

    <script>
        $(window).scroll(function () {
            var threshold = 300;
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

            // var size = '22';
            // $("#big").on("click",function(){
            //     size = size + 2;
            //     if(size<26 ){
            //         $(".editor-flx p").css("font-size",size + "px");
            //     }else{
            //         $(".editor-flx p").css("font-size",26 + "px");
            //     }
            // });
            // $("#normal").on("click",function(){
            //     size = 20;
            //     $(".editor-flx p").css("font-size",size + "px");
            // });
            // $("#small").on("click",function(){
            //     size = size - 2;
            //     if(size>14){
            //         $(".editor-flx p").css("font-size",size+ "px");
            //     } else {
            //         $(".editor-flx p").css("font-size",16+ "px");
            //     }
            // });

            var number = $('.editor-content').find('p').size();
            if(number => 2){
                var banner1 = '<div class="inside-editor-content col-lg-12 col-md-6 col-12"> ' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt="{{@$between1->name}}"></a>' +
                    '</div>';
                $( ".editor-content p:nth-child(2)" ).after().append(banner1);
            }

            if(number => 4){

                var banner2 = '{!! getMiddleBanner() !!}';
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
