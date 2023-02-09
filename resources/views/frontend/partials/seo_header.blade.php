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

            <!-- Logo & banner -->
            <div class="logo-banner">
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
                    @if($logo_banner !== null)
                        <div class="banner">
                            <div class="desktop-banner">
                                <span>Advertisement</span>
                                <a href="{{@$logo_banner->url}}" target="_blank">
                                    <img src="{{asset('/images/banners/'.@$logo_banner->image)}}" alt="{{$logo_banner->name}}"  />
                                </a>
                            </div>
                            <div class="tablet-banner">
                                <span>Advertisement</span>
                                <a href="{{@$logo_banner->url}}" target="_blank">
                                    <img src="{{asset('/images/banners/'.@$logo_banner->image)}}" alt="{{$logo_banner->name}}"  />
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Logo & advertisement -->

            <!-- navbar list container -->
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
                                                        <div class="inner-megadropdown tech-dropdown">

                                                            <div class="owl-wrapper">
                                                                <h1>@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif</h1>

                                                                <ul class="horizontal-filter-posts">
                                                                    @foreach($nav->children[0] as $childNav)
                                                                        @if($childNav->type == 'custom')
                                                                            <li><a class="{{request()->is(@$childNav->slug) ? 'active' : ''}}"
                                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif
                                                                                   href="/{{@$childNav->slug}}">
                                                                                    @if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                                </a></li>
                                                                        @elseif($childNav->type == 'category')
                                                                            <li><a class="{{request()->is('category/'.@$childNav->slug) ? 'active' : ''}}"
                                                                                   @if(@$childNav->target !== NULL) target="_blank" @endif
                                                                                   href="{{url('category')}}/{{$childNav->slug}}">
                                                                                    @if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif
                                                                                </a></li>
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
                                                                <div class="owl-carousel" data-num="4">
                                                                    @sandeshloop(getCategoryRelatedPost($nav->slug,0,5) as $news)
                                                                    <div class="item news-post standard-post">
                                                                        <div class="post-gallery">
                                                                            <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
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
                                                                    @endsandeshloop
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                            </li>
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
                                                                {{--                                                                <ul class="horizontal-filter-posts">--}}
                                                                {{--                                                                    <li><a class="active" href="#">All</a></li>--}}
                                                                {{--                                                                    <li><a href="#">Software</a></li>--}}
                                                                {{--                                                                    <li><a href="#">Internet</a></li>--}}
                                                                {{--                                                                    <li><a href="#">Mobile</a></li>--}}
                                                                {{--                                                                </ul>--}}
                                                                <h1>@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif</h1>
                                                                <div class="owl-carousel" data-num="4">
                                                                    @sandeshloop(getCategoryRelatedPost($nav->slug,0,5) as $news)
                                                                    <div class="item news-post standard-post">
                                                                        <div class="post-gallery">
                                                                            <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
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
                                                                    @endsandeshloop
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
            <!-- End navbar list container -->

        </nav>
        <!-- End Bootstrap navbar -->

    </header>
    <!-- End Header -->
    @if($above_featured !== null )
        <div class="banner">
            <div class="container">
                <div class="desktop-banner">
                    <span>Advertisement</span>
                    <a href="{{@$above_featured->url}}" target="_blank">
                        <img src="{{asset('/images/banners/'.@$above_featured->image)}}" alt="">
                    </a>
                </div>
                <div class="tablet-banner">
                    <span>Advertisement</span>
                    <a href="{{@$above_featured->url}}" target="_blank">
                        <img src="{{asset('/images/banners/'.@$above_featured->image)}}" alt="">
                    </a>
                </div>
                <div class="mobile-banner">
                    <span>Advertisement</span>
                    <a href="{{@$above_featured->url}}" target="_blank">
                        <img src="{{asset('/images/banners/'.@$above_featured->image)}}" alt="">
                    </a>
                </div>
            </div>
        </div>
@endif
