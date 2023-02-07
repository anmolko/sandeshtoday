<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @if(\Request::is('/'))
        <title>@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Sandesh Today @endif </title>
    @else
        <title>@yield('title') | @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Sandesh Today  @endif </title>
    @endif
    <meta name="description" content="@if(!empty(@$setting_data->meta_description)) {{ucwords(@$setting_data->meta_description)}} @else Sandesh Today aims to bring you the latest news from all over nepal swiftly and accurately @endif "/>
    <meta name="keywords" content="@if(!empty(@$setting_data->meta_tags)) {{@$setting_data->meta_tags}} @else Nepali News, Sandesh Today, Nepal, Online News, News Portal, Nepali News Portal @endif ">

    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Sandesh Today @endif " />
    <meta property="og:title" content="@if(!empty(@$setting_data->meta_title)) {{ucwords(@$setting_data->meta_title)}} @else Sandesh Today  @endif" />
    <meta property="og:url" content="https://sandeshtoday.com" />
    <meta property="og:description" content="@if(!empty(@$setting_data->meta_description)) {{ucwords(@$setting_data->meta_description)}} @else Sandesh Today aims to bring you the latest news from all over nepal swiftly and accurately @endif" />
    <meta property="og:type" content="News website" />
    <meta property="og:image" content="{{asset('assets/backend/images/canosoft-logo.png')}}" />

    <link rel="shortcut icon" type="image/x-icon" href="@if(@$setting_data->favicon!==null) {{asset('/images/settings/'.@$setting_data->favicon)}} @endif">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css /'>
{{--    <link href="{{asset('assets/frontend/font-awesome/4.2.0/css/font-awesome.min.css')}}" rel="stylesheet" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/jquery.bxslider.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/font-awesome.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/magnific-popup.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.theme.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/ticker-style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}" media="screen" />
    @yield('css')
    @stack('styles')
    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>

</head>
<body>

<!-- Container -->
<div id="container">

    <!-- Header
         ================================================== -->
    <header class="clearfix second-style">
        <!-- Bootstrap navbar -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">

            <!-- Top line -->
            <div class="top-line">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <ul class="top-line-list">
                                <li><span class="time-now">{{ getNepaliTodayDate() }}</span></li>
                                <li><a href="#">Log In</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="social-icons">
                                @if(!empty(@$setting_data->facebook))
                                    <li><a class="facebook" href="{{ (!empty(@$setting_data->facebook)) ? @$setting_data->facebook : "#"  }}"><i class="fa fa-facebook"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->linkedin))
                                   <li><a class="twitter" href="{{ (!empty(@$setting_data->linkedin)) ? @$setting_data->linkedin : "#"  }}"><i class="fa fa-twitter"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->youtube))
                                    <li><a class="google" href="{{ (!empty(@$setting_data->youtube)) ? @$setting_data->youtube : "#"  }}"><i class="fa fa-youtube-play"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->instagram))
                                    <li><a class="linkedin" href="{{ (!empty(@$setting_data->instagram)) ? @$setting_data->instagram : "#"  }}"><i class="fa fa-instagram"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->ticktock))
                                    <li><a class="pinterest" href="{{ (!empty(@$setting_data->ticktock)) ? @$setting_data->ticktock : "#"  }}"><i class="fa-brands fa-tiktok"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top line -->

            <!-- Logo & advertisement -->
            <div class="logo-advertisement">
                <div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">
                            <img src="<?php if(@$setting_data->logo){?>{{asset('/images/settings/'.@$setting_data->logo)}}<?php }?>"  alt="Sandesh today logo" title="Sandesh today logo">

                        </a>
                    </div>

                    <div class="advertisement">
                        <div class="desktop-advert">
                            @if($logo_banner !== null)
                                <span>Advertisement</span>
                                <img src="{{asset('/images/banners/'.@$logo_banner->image)}}" alt="{{$logo_banner->name}}"  />
                            @endif
                        </div>
                        <div class="tablet-advert">
                            @if($logo_banner !== null)
                                <span>Advertisement</span>
                                <img src="{{asset('/images/banners/'.@$logo_banner->image)}}" alt="{{$logo_banner->name}}"  />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Logo & advertisement -->

            <!-- navbar list container -->
            <div class="nav-list-container">
                <div class="container">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">

                            <li><a class="home" href="/">होम पेज </a></li>

                            <li><a class="world" href="news-category4.html">World</a>
                                <div class="megadropdown">
                                    <div class="container">
                                        <div class="inner-megadropdown world-dropdown">
                                            <div class="filter-block">
                                                <ul class="filter-posts">
                                                    <li><a href="#">All</a></li>
                                                    <li><a href="#">Politics</a></li>
                                                    <li><a href="#">Business</a></li>
                                                    <li><a class="active" href="#">Lifestyle</a></li>
                                                    <li><a href="#">Economy</a></li>
                                                    <li><a href="#">Music</a></li>
                                                </ul>
                                            </div>
                                            <div class="posts-filtered-block">
                                                <div class="owl-wrapper">
                                                    <h1>Lifestyle</h1>
                                                    <div class="owl-carousel" data-num="4">

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('assets/frontend/upload/news-posts/art1.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('assets/frontend/upload/news-posts/art2.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('assets/frontend/upload/news-posts/art3.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('assets/frontend/upload/news-posts/art6.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="item news-post standard-post">
                                                            <div class="post-gallery">
                                                                <img src="{{asset('assets/frontend/upload/news-posts/art9.jpg')}}" alt="">
                                                            </div>
                                                            <div class="post-content">
                                                                <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li><a class="travel" href="news-category3.html">Travel</a>
                                <div class="megadropdown">
                                    <div class="container">
                                        <div class="inner-megadropdown travel-dropdown">

                                            <div class="owl-wrapper">
                                                <h1>Latest Posts</h1>
                                                <div class="owl-carousel" data-num="4">

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art1.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art2.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art3.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art6.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art9.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li><a class="tech" href="news-category2.html">Tech</a>
                                <div class="megadropdown">
                                    <div class="container">
                                        <div class="inner-megadropdown tech-dropdown">

                                            <div class="owl-wrapper">
                                                <ul class="horizontal-filter-posts">
                                                    <li><a class="active" href="#">All</a></li>
                                                    <li><a href="#">Software</a></li>
                                                    <li><a href="#">Internet</a></li>
                                                    <li><a href="#">Mobile</a></li>
                                                </ul>
                                                <div class="owl-carousel" data-num="4">

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art1.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art2.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art3.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art6.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post standard-post">
                                                        <div class="post-gallery">
                                                            <img src="{{asset('assets/frontend/upload/news-posts/art9.jpg')}}" alt="">
                                                        </div>
                                                        <div class="post-content">
                                                            <h2><a href="single-post.html">Donec nec justo eget felis facilisis fermentum. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li><a class="fashion" href="news-category6.html">Fashion</a></li>

                            <li><a class="video" href="video.html">Video</a>
                                <div class="megadropdown">
                                    <div class="container">
                                        <div class="inner-megadropdown video-dropdown">

                                            <div class="owl-wrapper">
                                                <h1>Latest Posts</h1>
                                                <div class="owl-carousel" data-num="4">

                                                    <div class="item news-post video-post">
                                                        <img alt="" src="{{asset('assets/frontend/upload/news-posts/video1.jpg')}}">
                                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <div class="hover-box">
                                                            <h2><a href="single-post.html">Lorem ipsum dolor sit consectetuer adipiscing elit. Donec odio. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post video-post">
                                                        <img alt="" src="{{asset('assets/frontend/upload/news-posts/video2.jpg')}}">
                                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <div class="hover-box">
                                                            <h2><a href="single-post.html">Quisque volutpat mattis eros. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post video-post">
                                                        <img alt="" src="{{asset('assets/frontend/upload/news-posts/video3.jpg')}}">
                                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <div class="hover-box">
                                                            <h2><a href="single-post.html">Nullam malesuada erat ut turpis. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post video-post">
                                                        <img alt="" src="{{asset('assets/frontend/upload/news-posts/video4.jpg')}}">
                                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <div class="hover-box">
                                                            <h2><a href="single-post.html">Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class="item news-post video-post">
                                                        <img alt="" src="{{asset('assets/frontend/upload/news-posts/video1.jpg')}}">
                                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i class="fa fa-play-circle-o"></i></a>
                                                        <div class="hover-box">
                                                            <h2><a href="single-post.html">Lorem ipsum dolor sit consectetuer adipiscing elit. Donec odio. </a></h2>
                                                            <ul class="post-tags">
                                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li><a class="sport" href="news-category5.html">Sport</a></li>
                            <li><a class="food" href="news-category1.html">Food &amp; Health</a></li>

                            <li class="drop"><a class="features" href="#">Features</a>
                                <ul class="dropdown features-dropdown">
                                    <li class="drop"><a href="#">Category Layouts</a>
                                        <ul class="dropdown level2">
                                            <li><a href="news-category1.html">Large Image Sidebar</a></li>
                                            <li><a href="news-category2.html">Left Sidebar Thumbnail</a></li>
                                            <li><a href="news-category3.html">Both Sidebar</a></li>
                                            <li><a href="news-category4.html">2 Grid sidebar</a></li>
                                            <li><a href="news-category5.html">3 Grid no sidebar</a></li>
                                            <li><a href="news-category6.html">Fullwidth &amp; slider</a></li>
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="#">Header Layouts</a>
                                        <ul class="dropdown level2">
                                            <li><a href="index.html">Default header</a></li>
                                            <li><a href="header2.html">header 2</a></li>
                                            <li><a href="header3.html">header 3</a></li>
                                            <li><a href="header4.html">header 4</a></li>
                                            <li><a href="header5.html">header 5</a></li>
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="#">Post Formats</a>
                                        <ul class="dropdown level2">
                                            <li><a href="single-post.html">Single Post 1</a></li>
                                            <li><a href="single-post2.html">Single Post 2</a></li>
                                            <li><a href="single-post3.html">Single Post 3</a></li>
                                            <li><a href="single-post4.html">Single Post 4</a></li>
                                            <li><a href="single-post5.html">Single Post 5</a></li>
                                            <li><a href="single-post6.html">Single Post 6</a></li>
                                            <li><a href="single-post7.html">Single Post 7</a></li>
                                            <li><a href="single-post8.html">Single Post 8</a></li>
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="#">Forum Pages</a>
                                        <ul class="dropdown level2">
                                            <li><a href="forums.html">Forums</a></li>
                                            <li><a href="forum-category.html">Topics</a></li>
                                            <li><a href="forum-topic.html">Single Topic</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="allfooter.html">All footer widgets</a></li>
                                    <li><a href="autor-list.html">Autor List</a></li>
                                    <li><a href="autor-details.html">Autor Details</a></li>
                                    <li><a href="404-error.html">404 Error</a></li>
                                    <li><a href="underconstruction.html">Underconstruction</a></li>
                                    <li><a href="comming-soon.html">Comming soon Page</a></li>
                                </ul>
                            </li>

                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <input type="text" id="search" name="search" placeholder="Search here">
                            <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
            <!-- End navbar list container -->

        </nav>
        <!-- End Bootstrap navbar -->

    </header>
    <!-- End Header -->
