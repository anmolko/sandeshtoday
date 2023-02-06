@extends('frontend.layouts.master')
@section('title') हाम्रोबारे
@endsection
@section('css')
    <style>




        .about-section ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .about-section img {
            max-width: 100%;
            height: auto;
        }


        .about-section    .sec-title{
            position:relative;
            z-index: 1;
            margin-bottom:60px;
        }

        .about-section .sec-title .title{
            position: relative;
            display: block;
            font-size: 18px;
            line-height: 24px;
            color: #00aeef;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .about-section .sec-title h2{
            position: relative;
            display: block;
            font-size: 50px;
            line-height: 1.28em;
            color: #0d47a2;
            font-weight: 600;
            padding-bottom: 18px;
        }

        .about-section .sec-title h2:before{
            position:absolute;
            content:'';
            left:0px;
            bottom:0px;
            width:50px;
            height:3px;
            background-color:#d1d2d6;
        }

        .about-section .sec-title .text{
            position: relative;
            font-size: 16px;
            line-height: 26px;
            color: #848484;
            font-weight: 400;
            margin-top: 35px;
            text-align: justify;
        }

        .about-section .sec-title.light h2{
            color: #ffffff;
        }

        .about-section .sec-title.text-center h2:before{
            left:50%;
            margin-left: -25px;
        }

        .about-section .list-style-one{
            position:relative;
        }

        .about-section .list-style-one li{
            position:relative;
            font-size:16px;
            line-height:26px;
            color: #222222;
            font-weight:400;
            padding-left:35px;
            margin-bottom: 12px;
        }

        .about-section .list-style-one li:before {
            content: "\f058";
            position: absolute;
            left: 0;
            top: 0px;
            display: block;
            font-size: 18px;
            padding: 0px;
            color: #ff2222;
            font-weight: 600;
            -moz-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1.6;
            font-family: "Font Awesome 5 Free";
        }

        .about-section .list-style-one li a:hover{
            color: #44bce2;
        }

        .about-section .btn-style-one{
            position: relative;
            display: inline-block;
            font-size: 17px;
            line-height: 30px;
            color: #ffffff;
            padding: 10px 30px;
            font-weight: 600;
            overflow: hidden;
            letter-spacing: 0.02em;
            background-color: #00aeef;
        }

        .about-section .btn-style-one:hover{
            background-color: #0794c9;
            color: #ffffff;
        }
        .about-section{
            position: relative;
            padding: 120px 0 70px;
        }

        .about-section .sec-title{
            margin-bottom: 45px;
        }

        .about-section .content-column{
            position: relative;
            margin-bottom: 50px;
        }

        .about-section .content-column .inner-column{
            position: relative;
            padding-left: 30px;
        }

        .about-section .text{
            margin-bottom: 20px;
            font-size: 18px;
            line-height: 1.6;
            color: #848484;
            font-weight: 400;
            text-align: justify;
        }

        .about-section .list-style-one{
            margin-bottom: 45px;
        }

        .about-section .btn-box{
            position: relative;
        }

        .about-section .btn-box a{
            padding: 15px 50px;
        }

        .about-section .image-column{
            position: relative;
        }

        .about-section .image-column .text-layer{
            position: absolute;
            right: -110px;
            top: 50%;
            font-size: 325px;
            line-height: 1em;
            color: #ffffff;
            margin-top: -175px;
            font-weight: 500;
        }

        .about-section .image-column .inner-column{
            position: relative;
            padding-left: 80px;
            padding-bottom: 0px;
        }
        .about-section .image-column .inner-column .author-desc{
            position: absolute;
            bottom: 16px;
            z-index: 1;
            background: orange;
            padding: 10px 15px;
            left: 96px;
            width: calc(100% - 152px);
            border-radius: 50px;
        }
        .about-section .image-column .inner-column .author-desc h2{
            font-size: 21px;
            letter-spacing: 1px;
            text-align: center;
            color: #fff;
            margin: 0;
        }
        .about-section .image-column .inner-column .author-desc span{
            font-size: 16px;
            letter-spacing: 6px;
            text-align: center;
            color: #fff;
            display: block;
            font-weight: 400;
        }
        .about-section .image-column .inner-column:before{
            content: '';
            position: absolute;
            width: calc(50% + 150px);
            height: calc(100% + 160px);
            top: -80px;
            left: -3px;
            background: transparent;
            z-index: 0;
            border: 44px solid #ea4d36a3;
        }

        .about-section .image-column .image-1{
            position: relative;
        }
        .about-section .image-column .image-2{
            position: absolute;
            left: 0;
            bottom: 0;
        }

        .about-section .image-column .image-2 img,
        .about-section .image-column .image-1 img{
            box-shadow: 0 30px 50px rgba(8,13,62,.35);
            border-radius: 46px;
        }

        .about-section .image-column .video-link{
            position: absolute;
            left: 70px;
            top: 170px;
        }

        .about-section .image-column .video-link .link{
            position: relative;
            display: block;
            font-size: 22px;
            color: #191e34;
            font-weight: 400;
            text-align: center;
            height: 100px;
            width: 100px;
            line-height: 100px;
            background-color: #ffffff;
            border-radius: 50%;
            box-shadow: 0 30px 50px rgba(8,13,62,.15);
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
            transition: all 300ms ease;
        }
    </style>
@endsection
@section('content')

    <div class="blog-section section">
        <div class="container">
            <section class="about-section">
                <div class="container">
                    <div class="row">
                        <div class="content-column  {{(@$homesettings->welcome_image !== null) ? "col-lg-7":"col-lg-12" }} col-md-12 col-sm-12 order-2">
                            <div class="inner-column">
                                <div class="sec-title">
{{--                                    <span class="title">About Css3transition</span>--}}
                                    <h2>{{ @$homesettings->welcome_heading }}</h2>
                                </div>
                                <div class="text">
                                    {!! @$homesettings->welcome_description !!}
                                </div>


                            </div>
                        </div>

                        @if(@$homesettings->welcome_image !== null)
                        <!-- Image Column -->
                        <div class="image-column col-lg-5 col-md-12 col-sm-12">
                            <div class="inner-column wow fadeInLeft">
{{--                                <div class="author-desc">--}}
{{--                                    <h2>hello</h2>--}}
{{--                                    <span>Web Developer</span>--}}
{{--                                </div>--}}
                                <figure class="image-1">
                                    <img src="{{(@$homesettings->welcome_image !== null) ?  asset('/images/home/welcome/'.@$homesettings->welcome_image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="{{@$homesettings->welcome_heading}}" loading="lazy">
                                </figure>

                            </div>
                        </div>
                        @endif

                    </div>

                </div>
            </section>

        </div>
    </div>

@endsection
@section('js')
@endsection
