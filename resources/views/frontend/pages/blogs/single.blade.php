@extends('frontend.layouts.seo_master')
@section('title'){{ucfirst(@$singleBlog->title)}} @endsection
@section('css')
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=63ebb6ef4a4876001374e2fd&product=sticky-share-buttons&source=platform" async="async"></script>

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

{{--                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>0</span></a></li>--}}
{{--                                    <li><i class="fa fa-eye"></i>872</li>--}}
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <div class="banner">
                                    @if(@$above !== null)
                                        <div class="desktop-banner">
                                            <span>Advertisement</span>
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$above->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tablet-banner">
                                            <span>Advertisement</span>
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$above->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="mobile-banner">
                                            <span>Advertisement</span>
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
                                            <span>Advertisement</span>
                                            <a href="{{@$below->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$below->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="tablet-banner">
                                            <span>Advertisement</span>
                                            <a href="{{@$above->url}}" target="_blank">
                                                <img src="{{asset('/images/banners/'.@$below->image)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="mobile-banner">
                                            <span>Advertisement</span>
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
                                    <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Politics</a></li>
                                    <li><a href="#">Sport</a></li>
                                </ul>
                            </div>

                            <div class="share-post-box">
                                <ul class="share-box">
                                    <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share on Facebook</a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i>Share on Twitter</a></li>
                                    <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>
                                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>
                                </ul>
                            </div>

                            <div class="prev-next-posts">
                                <div class="prev-post">
                                    <img src="{{ asset('assets/frontend/upload/news-posts/listw4.jpg') }}" alt="">
                                    <div class="post-content">
                                        <h2><a href="single-post.html" title="prev post">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>11</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="next-post">
                                    <img src="{{ asset('assets/frontend/upload/news-posts/listw5.jpg') }}" alt="">
                                    <div class="post-content">
                                        <h2><a href="single-post.html" title="next post">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>8</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="about-more-autor">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#about-autor" data-toggle="tab">About The Autor</a>
                                    </li>
                                    <li>
                                        <a href="#more-autor" data-toggle="tab">More From Autor</a>
                                    </li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane active" id="about-autor">
                                        <div class="autor-box">
                                            <img src="{{ asset('assets/frontend/upload/users/avatar1.jpg') }}" alt="">
                                            <div class="autor-content">
                                                <div class="autor-title">
                                                    <h1><span>Jane Smith</span><a href="autor-details.html">18 Posts</a></h1>
                                                    <ul class="autor-social">
                                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>
                                                    Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="more-autor">
                                        <div class="more-autor-posts">

                                            <div class="news-post image-post3">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/gal1.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="news-post image-post3">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/gal2.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="news-post image-post3">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/gal3.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <h2><a href="single-post.html">Suspendisse urna nibh.</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="news-post image-post3">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/gal4.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. Aliquam </a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- carousel box -->
                            <div class="carousel-box owl-wrapper">
                                <div class="title-section">
                                    <h1><span>You may also like</span></h1>
                                </div>
                                <div class="owl-carousel" data-num="3">

                                    <div class="item news-post image-post3">
                                        <img src="{{ asset('assets/frontend/upload/news-posts/art1.jpg') }}" alt="">
                                        <div class="hover-box">
                                            <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="item news-post image-post3">
                                        <img src="{{ asset('assets/frontend/upload/news-posts/art2.jpg') }}" alt="">
                                        <div class="hover-box">
                                            <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="item news-post video-post">
                                        <img src="{{ asset('assets/frontend/upload/news-posts/art3.jpg') }}" alt="">
                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                        <div class="hover-box">
                                            <h2><a href="single-post.html">Lorem ipsum dolor sit consectetuer adipiscing elit. Donec odio. </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="item news-post image-post3">
                                        <img src="{{ asset('assets/frontend/upload/news-posts/art4.jpg') }}" alt="">
                                        <div class="hover-box">
                                            <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. Aliquam </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="item news-post image-post3">
                                        <img src="{{ asset('assets/frontend/upload/news-posts/art5.jpg') }}" alt="">
                                        <div class="hover-box">
                                            <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- End carousel box -->

                            <!-- contact form box -->
                            <div class="contact-form-box">
                                <div class="title-section">
                                    <h1><span>Leave a Comment</span> <span class="email-not-published">Your email address will not be published.</span></h1>
                                </div>
                                <form id="comment-form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name">Name*</label>
                                            <input id="name" name="name" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mail">E-mail*</label>
                                            <input id="mail" name="mail" type="text">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="website">Website</label>
                                            <input id="website" name="website" type="text">
                                        </div>
                                    </div>
                                    <label for="comment">Comment*</label>
                                    <textarea id="comment" name="comment"></textarea>
                                    <button type="submit" id="submit-contact">
                                        <i class="fa fa-comment"></i> Post Comment
                                    </button>
                                </form>
                            </div>
                            <!-- End contact form box -->

                        </div>
                        <!-- End single-post box -->

                    </div>
                    <!-- End block content -->

                </div>
                <div class="sharethis-sticky-share-buttons"></div>
                <div class="col-sm-3">

                    <!-- sidebar -->
                    <div class="sidebar">

                        <div class="widget social-widget">
                            <div class="title-section">
                                <h1><span>Stay Connected</span></h1>
                            </div>
                            <ul class="social-share">
                                <li>
                                    <a href="#" class="rss"><i class="fa fa-rss"></i></a>
                                    <span class="number">9,455</span>
                                    <span>Subscribers</span>
                                </li>
                                <li>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <span class="number">56,743</span>
                                    <span>Fans</span>
                                </li>
                                <li>
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <span class="number">43,501</span>
                                    <span>Followers</span>
                                </li>
                                <li>
                                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                    <span class="number">35,003</span>
                                    <span>Followers</span>
                                </li>
                            </ul>
                        </div>

                        <div class="widget features-slide-widget">
                            <div class="title-section">
                                <h1><span>Featured Posts</span></h1>
                            </div>
                            <div class="image-post-slider">
                                <ul class="bxslider">
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/im3.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            <li><i class="fa fa-eye"></i>872</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/im1.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            <li><i class="fa fa-eye"></i>872</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="news-post image-post2">
                                            <div class="post-gallery">
                                                <img src="{{ asset('assets/frontend/upload/news-posts/im2.jpg') }}" alt="">
                                                <div class="hover-box">
                                                    <div class="inner-hover">
                                                        <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            <li><i class="fa fa-eye"></i>872</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget tab-posts-widget">

                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a href="#option1" data-toggle="tab">Popular</a>
                                </li>
                                <li>
                                    <a href="#option2" data-toggle="tab">Recent</a>
                                </li>
                                <li>
                                    <a href="#option3" data-toggle="tab">Top Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="option1">
                                    <ul class="list-posts">
                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw1.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw2.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Sed arcu. Cras consequat. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw3.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw4.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw5.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="option2">
                                    <ul class="list-posts">

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw3.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw4.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw5.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw1.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw2.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="option3">
                                    <ul class="list-posts">

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw4.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Donec consectetuer ligula vulputate sem tristique cursus. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw1.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw3.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.  </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw2.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <img src="{{ asset('assets/frontend/upload/news-posts/listw5.jpg') }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget post-widget">
                            <div class="title-section">
                                <h1><span>Featured Video</span></h1>
                            </div>
                            <div class="news-post video-post">
                                <img alt="" src="{{ asset('assets/frontend/upload/news-posts/video-sidebar.jpg') }}">
                                <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                <div class="hover-box">
                                    <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </div>
                            <p>Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis. </p>
                        </div>

                        <div class="widget subscribe-widget">
                            <form class="subscribe-form">
                                <h1>Subscribe to RSS Feeds</h1>
                                <input type="text" name="sumbscribe" id="subscribe" placeholder="Email"/>
                                <button id="submit-subscribe">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </button>
                                <p>Get all latest content delivered to your email a few times a month.</p>
                            </form>
                        </div>

                        <div class="widget tags-widget">

                            <div class="title-section">
                                <h1><span>Popular Tags</span></h1>
                            </div>

                            <ul class="tag-list">
                                <li><a href="#">News</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Politics</a></li>
                                <li><a href="#">Sport</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Videos</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">World</a></li>
                                <li><a href="#">Music</a></li>
                            </ul>

                        </div>

                        <div class="banner">
                            <div class="desktop-banner">
                                <span>Advertisement</span>
                                <img src="{{ asset('assets/frontend/upload/addsense/300x250.jpg') }}" alt="">
                            </div>
                            <div class="tablet-banner">
                                <span>Advertisement</span>
                                <img src="{{ asset('assets/frontend/upload/addsense/200x200.jpg') }}" alt="">
                            </div>
                            <div class="mobile-banner">
                                <span>Advertisement</span>
                                <img src="{{ asset('assets/frontend/upload/addsense/300x250.jpg') }}" alt="">
                            </div>
                        </div>

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

            var number = $('.editor-content').find('p').size();

            if(number => 2){
                var banner1 ='<div class="banner"> ' +
                    '<div class="desktop-banner"> ' +
                    '<span>Advertisement</span> ' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt=""></a> ' +
                    '</div>' +
                    '<div class="tablet-banner">' +
                    '<span>Advertisement</span>' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt=""></a> ' +
                    '</div> ' +
                    '<div class="mobile-banner"> ' +
                    '<span>Advertisement</span> ' +
                    '<a href="{{(@$between1->url !== null) ? @$between1->url:"#"}}" target="_blank">' +
                    '<img src="{{asset('/images/banners/'.@$between1->image)}}" alt=""></a> ' +
                    '</div> ' +
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
