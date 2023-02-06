@extends('frontend.layouts.master')
@section('title') हाम्रो टीम @endsection
@section('css')
    <style>

        .team-area {
            padding: 60px 0;
        }

        .team-social ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .team-site-heading h2 {
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-size: 4em;
            line-height: 1.3em;
            position: relative;
            padding-bottom: 15px;


        }

        .team-site-heading h2 span {
            color: #ff5a6e;
        }

        .team-site-heading h4 {
            display: inline-block;
            padding-bottom: 20px;
            position: relative;
            text-transform: capitalize;
            z-index: 1;
        }

        .team-site-heading h2::before {
            background: #0d47a2 none repeat scroll 0 0;
            bottom: 0;
            content: "";
            height: 2px;
            left: 50%;
            margin-left: -25px;
            position: absolute;
            width: 50px;
        }


        .team-site-heading {
            margin-bottom: 60px;
            overflow: hidden;
            margin-top: -5px;
        }

        .team-area .single-item {
            margin-bottom: 30px;
        }

        .team-area .item .thumb {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .team-area .item .thumb::after {
            background: #232323 none repeat scroll 0 0;
            content: "";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            transition: all 0.35s ease-in-out;
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
            width: 100%;
        }

        .team-area .team-items .item:hover .thumb::after {
            opacity: 0.7;
        }

        .team-area .item .thumb .overlay {
            top: -100%;
            left: 0;
            padding: 20px;
            position: absolute;
            text-align: center;
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
            width: 100%;
            z-index: 1;
        }

        .team-area .item:hover .thumb .overlay {
            top: 50%;
            transform: translate(-50%, -50%);
            left: 50%;
        }

        .team-area .item .thumb .overlay p {
            color: #ffffff;
        }

        .team-area .item .thumb .overlay h4 {
            color: #ffffff;
            display: inline-block;
            position: relative;
            text-transform: uppercase;
        }

        .team-area .item .thumb img {
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            -ms-transition: all 0.35s ease-in-out;
            -o-transition: all 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
        }

        .team-area .item:hover .thumb img {
            opacity: 0.6;
        }

        .team-area .item .thumb .social li {
            display: inline-block;
        }

        .team-area .item .thumb .social li a {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            color: #ffffff;
            display: inline-block;
            height: 40px;
            line-height: 40px;
            margin: 0 2px;
            text-align: center;
            width: 40px;
        }

        .team-area .info {
            background: #ffffff none repeat scroll 0 0;
            -moz-box-shadow: 0 0 10px #cccccc;
            -webkit-box-shadow: 0 0 10px #cccccc;
            -o-box-shadow: 0 0 10px #cccccc;
            box-shadow: 0 0 10px #cccccc;
            padding: 40px 20px 20px;
            position: relative;
            text-align: center;
            z-index: 9;
        }

        .team-area .info .message {
            height: 50px;
            line-height: 40px;
            margin-left: -25px;
            margin-top: -25px;
            position: absolute;
            text-align: center;
            top: 0;
            width: 50px;
        }

        .team-area .info .message a {
            background: #fff none repeat scroll 0 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            -moz-box-shadow: 0 0 10px #cccccc;
            -webkit-box-shadow: 0 0 10px #cccccc;
            -o-box-shadow: 0 0 10px #cccccc;
            box-shadow: 0 0 10px #cccccc;
            box-sizing: border-box;
            color: #ff5a6e;
            display: inline-block;
            font-size: 20px;
            height: 50px;
            line-height: 50px;
            width: 50px;
        }

        .team-area .info .message a i {
            font-weight: 500;
        }

        .team-area .info h4 {
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: capitalize;
            font-size: 1.8em;
            font-family: "Mukta", "Khand", "Glegoo", sans-serif;
        }

        .team-area .info span {
            color: #0d47a2;
            font-family: "Mukta", "Khand", "Glegoo", sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 1.8em;
        }

        .team-area .social li.twitter a {
            background-color: #00b6f1;
        }

        .team-area .social li.pinterest a {
            background-color: #bd081c;
        }

        .team-area .social li.facebook a {
            background-color: #3b5998;
        }

        .team-area .social li.google-plus a {
            background-color: #df4a32;
        }

        .team-area .social li.vimeo a {
            background-color: #1ab7ea;
        }

        .team-area .social li.instagram a {
            background-color: #cd486b;
        }

    </style>
@endsection
@section('content')

    <div class="blog-section section">
        <div class="container">
            <section id="team" class="team-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="team-site-heading text-center">
                                <h2>हाम्रो <span>टीम</span></h2>
{{--                                <h4>Meet our awesome and expert team members</h4>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row team-items">
                        @foreach(@$teams as $team)
                            <div class="col-md-4 single-item">
                            <div class="item">
                                <div class="thumb">

{{--                                    <img class="img-fluid" src="https://i.ibb.co/JC4skS0/team-animate.jpg" alt="Thumb">--}}
                                    <img class="img-fluid" src="{{asset('/images/teams/'.$team->image)}}" alt="Thumb">
                                    <div class="overlay">
                                        <div class="social">
                                            <ul>
                                                @if(!empty(@$team->fb))
                                                    <li class="facebook">
                                                        <a href="{{@$team->fb}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                                    </li>
                                                @endif
                                                @if(!empty(@$team->twitter))
                                                    <li class="twitter">
                                                        <a href="{{@$team->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                @endif
                                                @if(!empty(@$team->insta))
                                                    <li class="instagram">
                                                        <a href="{{@$team->insta}}" target="_blank"><i class="fab fa-instagram"></i></a>
                                                    </li>
                                                @endif
                                                @if(!empty(@$team->linkedin))
                                                    <li class="linkedin">
                                                        <a href="{{@$team->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <span class="message">
                                      <a>
                                        <i class="fa fa-user-circle-o"></i>
                                      </a>
                                    </span>
                                    <h4>{{@$team->name}}</h4>
                                    <span>{{@$team->post}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection
@section('js')
@endsection
