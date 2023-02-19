@extends('frontend.layouts.master')
@section('title') हाम्रो टीम @endsection
@section('css')
    <style>
        .our-team{
            text-align: center;
            position: relative;
        }
        .our-team:before{
            content: "";
            position: absolute;
            border: 4px solid #e94033;
            bottom: -7px;
            top: -7px;
            left: -7px;
            right: -7px;
            opacity: 0;
            transform: scale(1.03);
            z-index: -1;
            transition:0.6s ease 0s;
        }
        .our-team:hover:before{
            opacity: 1;
            transform: scale(1);
        }
        .our-team .team-img{
            position: relative;
        }
        .our-team .team-img:before{
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.6);
            width: 100%;
            height: 100%;
            opacity: 0;
            transition:0.6s ease 0s;
        }
        .our-team:hover .team-img:before{
            opacity: 1;
        }
        .our-team .team-img img{
            width: 100%;
            height: auto;
        }
        .our-team .team-content{
            padding: 10px 0 35px;
            position: relative;
            top: 0;
            transition:0.6s ease 0s;
            background: #fafafa;
        }
        .our-team:hover .team-content{
            top: -50%;
        }
        .our-team .team-content .name{
            color: #333;
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 7px;
            text-transform: uppercase;
            transition:0.6s ease 0s;
        }
        .our-team:hover .team-content .name{
            color: #2c3593;
            font-size: 22px;
        }
        .our-team .team-content .post{
            color: #707070;
            font-size: 17px;
            font-weight: 500;
            display: block;
            text-transform: capitalize;
            transition:0.6s ease 0s;
        }
        .our-team:hover .team-content .post{
            color:#e94033;
        }
        .our-team .social{
            bottom: 0;
            font-size: 0;
            left: 0;
            margin: 0 0 5px;
            opacity: 0;
            padding: 0;
            position: absolute;
            right: 0;
            text-align: center;
            transform: scale(0);
            transition:0.6s ease 0s;
        }
        .our-team:hover .social{
            opacity: 1;
            transform: scale(1);
        }
        .our-team .social li{
            display: inline-block;
        }
        .our-team .social li a{
            display:block;
            color: #333;
            font-size: 18px;
            padding:0 15px;
            position: relative;
            transition:0.3s ease 0s;
        }
        .our-team .social li a:hover{
            color:#F6511D;
        }
        .our-team .social li a:after{
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 1px;
            background-color: #333;
        }
        .our-team .social li:last-child a:after{
            display: none;
        }

        @media screen and (max-width:990px){
            .our-team{
                margin-bottom: 30px !important;
            }
        }
        .mb-80{
            margin-top: 80px;
            margin-bottom: 80px;
        }
    </style>
@endsection
@section('content')

    <section class="block-wrapper mb-80">
        <div class="container">
        <div class="title-section category-title">
            <h1><span>हाम्रो टीम</span></h1>
        </div>
        <div class="row">
            @foreach(@$teams as $team)
                <div class="col-md-4 col-sm-6">
                <div class="our-team">
                    <div class="team-img">
                        <img src="{{asset('/images/teams/'.$team->image)}}">
                    </div>
                    <div class="team-content">
                        <h3 class="name">{{@$team->name}}</h3>
                        <span class="post">{{@$team->post}}</span>
                    </div>
                    <ul class="social">
                        @if(!empty(@$team->fb))
                            <li>
                                <a href="{{@$team->fb}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                        @endif
                        @if(!empty(@$team->twitter))
                            <li>
                                <a href="{{@$team->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                        @endif
                        @if(!empty(@$team->insta))
                            <li>
                                <a href="{{@$team->insta}}" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        @endif
                        @if(!empty(@$team->linkedin))
                            <li>
                                <a href="{{@$team->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>

@endsection
@section('js')
@endsection
