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
    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon !== null){?>{{asset('/images/settings/'.@$setting_data->favicon)}}<?php }else{?>{{asset('assets/backend/images/canosoft-favicon.png')}}<?php }?>">

    @yield('seo')

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
{{--    <link href="{{asset('assets/frontend/font-awesome/4.2.0/css/font-awesome.min.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/jquery.bxslider.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/font-awesome.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/magnific-popup.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.theme.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/ticker-style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/style.css')}}" media="screen">
    @yield('css')
    @stack('styles')
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
{{--                                <li>--}}
{{--                                    <span class="city-weather">London, United Kingdom</span>--}}
{{--                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="24px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">--}}
{{--											<path fill="#777777" d="M208,64c8.833,0,16-7.167,16-16V16c0-8.833-7.167-16-16-16s-16,7.167-16,16v32--}}
{{--												C192,56.833,199.167,64,208,64z M332.438,106.167l22.625-22.625c6.249-6.25,6.249-16.375,0-22.625--}}
{{--												c-6.25-6.25-16.375-6.25-22.625,0l-22.625,22.625c-6.25,6.25-6.25,16.375,0,22.625--}}
{{--												C316.062,112.417,326.188,112.417,332.438,106.167z M16,224h32c8.833,0,16-7.167,16-16s-7.167-16-16-16H16--}}
{{--												c-8.833,0-16,7.167-16,16S7.167,224,16,224z M352,208c0,8.833,7.167,16,16,16h32c8.833,0,16-7.167,16-16s-7.167-16-16-16h-32--}}
{{--												C359.167,192,352,199.167,352,208z M83.541,106.167c6.251,6.25,16.376,6.25,22.625,0c6.251-6.25,6.251-16.375,0-22.625--}}
{{--												L83.541,60.917c-6.25-6.25-16.374-6.25-22.625,0c-6.25,6.25-6.25,16.375,0,22.625L83.541,106.167z M400,256--}}
{{--												c-5.312,0-10.562,0.375-15.792,1.125c-16.771-22.875-39.124-40.333-64.458-51.5C318.459,145,268.938,96,208,96--}}
{{--												c-61.75,0-112,50.25-112,112c0,17.438,4.334,33.75,11.5,48.438C47.875,258.875,0,307.812,0,368c0,61.75,50.25,112,112,112--}}
{{--												c13.688,0,27.084-2.5,39.709-7.333C180.666,497.917,217.5,512,256,512c38.542,0,75.333-14.083,104.291-39.333--}}
{{--												C372.916,477.5,386.312,480,400,480c61.75,0,112-50.25,112-112S461.75,256,400,256z M208,128c39.812,0,72.562,29.167,78.708,67.25--}}
{{--												c-10.021-2-20.249-3.25-30.708-3.25c-45.938,0-88.5,19.812-118.375,53.25C131.688,234.083,128,221.542,128,208--}}
{{--												C128,163.812,163.812,128,208,128z M400,448c-17.125,0-32.916-5.5-45.938-14.667C330.584,461.625,295.624,480,256,480--}}
{{--												c-39.625,0-74.584-18.375-98.062-46.667C144.938,442.5,129.125,448,112,448c-44.188,0-80-35.812-80-80s35.812-80,80-80--}}
{{--												c7.75,0,15.062,1.458,22.125,3.541c2.812,0.792,5.667,1.417,8.312,2.521c4.375-8.562,9.875-16.396,15.979-23.75--}}
{{--												C181.792,242.188,216.562,224,256,224c10.125,0,19.834,1.458,29.25,3.709c10.562,2.499,20.542,6.291,29.834,11.291--}}
{{--												c23.291,12.375,42.416,31.542,54.457,55.063C378.938,290.188,389.209,288,400,288c44.188,0,80,35.812,80,80S444.188,448,400,448z"--}}
{{--                                            />--}}
{{--										</svg>--}}
{{--                                    <span class="cel-temperature">+7</span>--}}
{{--                                </li>--}}
                                <li><span class="time-now">{{ getNepaliTodayDate() }}</span></li>
                                <li><a href="#">Log In</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="social-icons">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
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
                        <a class="navbar-brand" href="/"><img src="{{asset('assets/frontend/images/logo-black.png')}}" alt=""></a>
                    </div>

                    <div class="advertisement">
                        <div class="desktop-advert">
                            <span>Advertisement</span>
                            <img src="{{asset('assets/frontend/upload/addsense/728x90-white.jpg')}}" alt="">
                        </div>
                        <div class="tablet-advert">
                            <span>Advertisement</span>
                            <img src="{{asset('assets/frontend/upload/addsense/468x60-white.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Logo & advertisement -->
            <div class="nav-list-container">
                <div class="container">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-left">

                            <li class="single"><a class="home" href="/">होम पेज </a></li>

                            @if(!empty($top_nav_data))
                                @foreach($top_nav_data as $nav)
                                    @if(!empty($nav->children[0]))
                                        @if(@$nav->title == 'अन्य' || @$nav->name == 'अन्य')
                                            <li class="drop">
                                                <a>
                                                    @if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif
                                                </a>
                                                <ul class="dropdown features-dropdown">
                                                    @foreach($nav->children[0] as $childNav)
                                                        @if($childNav->type == 'custom')
                                                            <li>
                                                                <a href="/{{@$childNav->slug}}"
                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif>
                                                                    @if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                </a>
                                                            </li>

                                                        @elseif($childNav->type == 'category')
                                                            <li>
                                                                <a  href="{{url('category')}}/{{$childNav->slug}}"
                                                                    @if(@$childNav->target !== NULL) target="_blank" @endif>
                                                                    @if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li><a class="{{request()->is(@$childNav->slug) ? 'active' : ''}}"
                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif
                                                                   href="{{url('/')}}/{{@$childNav->slug}}">
                                                                    @if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                </a>
                                                            </li>
                                                        @endif

                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li><a class="" href="{{url('category')}}/{{$nav->slug}}">
                                                    @if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif
                                                </a>
                                                <div class="megadropdown">
                                                    <div class="container">
                                                        <div class="inner-megadropdown world-dropdown">
                                                            <div class="filter-block">
                                                                <ul class="filter-posts">
                                                                    @foreach($nav->children[0] as $childNav)
                                                                        @if($childNav->type == 'custom')
                                                                            <li><a class="{{request()->is(@$childNav->slug) ? 'active' : ''}}"
                                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif
                                                                                   href="/{{@$childNav->slug}}">
                                                                                    @if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                                </a>
                                                                            </li>
                                                                        @elseif($childNav->type == 'category')
                                                                            <li><a class="{{request()->is('category/'.@$childNav->slug) ? 'active' : ''}}"
                                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif
                                                                                   href="{{url('category')}}/{{$childNav->slug}}">
                                                                                    @if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                                </a>
                                                                            </li>
                                                                        @else
                                                                            <li><a class="{{request()->is(@$childNav->slug) ? 'active' : ''}}"
                                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif
                                                                                   href="{{url('/')}}/{{@$childNav->slug}}">
                                                                                    @if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                                </a>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="posts-filtered-block">
                                                                <div class="owl-wrapper">
                                                                    <h1>  @if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif</h1>
                                                                    <div class="owl-carousel" data-num="4">
                                                                        @darpanloop(getCategoryRelatedPost($nav->slug,0,5) as $news)
                                                                        <div class="item news-post standard-post">
                                                                            <div class="post-gallery">
                                                                                <img src="{{ asset('/images/blog/'.@$news->image)}}" alt="">
                                                                            </div>
                                                                            <div class="post-content">
                                                                                <h2>
                                                                                    <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                                                                </h2>
                                                                                <ul class="post-tags">
                                                                                    <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        @enddarpanloop


                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @else
                                        @if($nav->type == 'custom')
                                            <li class="single">
                                                <a class="" href="/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>
                                                    @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                </a>
                                            </li>
                                        @elseif($nav->type == 'category')


                                            <li><a class="" href="{{url('category')}}/{{$nav->slug}}">
                                                    @if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif
                                                </a>
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
                                                                <h1>@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif</h1>
                                                                <div class="owl-carousel" data-num="4">
                                                                    @darpanloop(getCategoryRelatedPost($nav->slug,0,5) as $news)
                                                                    <div class="item news-post standard-post">
                                                                        <div class="post-gallery">
                                                                            <img src="{{ asset('/images/blog/'.@$news->image)}}" alt="">
                                                                        </div>
                                                                        <div class="post-content">
                                                                            <h2>
                                                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                                                            </h2>
                                                                            <ul class="post-tags">
                                                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    @enddarpanloop
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="{{request()->is(@$nav->slug.'*') ? 'active' : ''}} single ">
                                                <a class="" href="{{url('/')}}/{{$nav->slug}}">
                                                    @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <input type="text" id="search" name="search" placeholder="Search here">
                            <button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>

        </nav>
        <!-- End Bootstrap navbar -->

    </header>
    <!-- End Header -->
