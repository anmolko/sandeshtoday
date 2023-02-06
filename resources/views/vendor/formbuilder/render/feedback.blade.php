@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($form->name) }} @endsection
@section('css')
    <style>
        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;
            color: #B94A48;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .parsley-errors-list.filled {
            opacity: 1;
        }

    </style>
@endsection
@section('content')

    <!-- Page Banner Start -->
    <section class="page-banner-area pt-245 rpt-150 pb-170 rpb-100 rel z-1 bgc-lighter text-center">
        <div class="container">
            <div class="banner-inner rpt-10">
                <h1 class="page-title wow fadeInUp delay-0-2s">{{ $pageTitle }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center wow fadeInUp delay-0-4s">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">{{ $form->name }}  </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="banner-shapes">
            <div class="circle wow zoomInLeft delay-0-2s" data-wow-duration="2s"></div>
            <img class="shape-one" src="{{asset('assets/frontend/images/shapes/hero-shape1.png')}}" alt="Shape">
            <img class="shape-two" src="{{asset('assets/frontend/images/shapes/hero-shape2.png')}}" alt="Shape">
        </div>
    </section>
    <!-- Page Banner End -->

    <section class="contact-us-page-area py-130">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="row align-items-end justify-content-between">
                        <div class="card-body">
                            <h3 class="text-center text-success">
                                Your entry for <strong>{{ $form->name }}</strong> was successfully submitted.
                            </h3>
                        </div>
                        <div class="text-center">
                            <p> {{ @$form->custom_description }}</p>
                            <div class="text-center">
                                <a href="{{ url()->previous() }}" class="theme-btn">
                                    View Form
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    Contact Now
                                    <i class="fas fa-angle-double-right"></i>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-info wow fadeInLeft delay-0-2s">
                        <div class="contact-info-item style-two">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="content">
                                <span class="title">Location</span>
                                <span class="text">
                                        @if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif
                                    </span>
                            </div>
                        </div>
                        <div class="contact-info-item style-two">
                            <div class="icon">
                                <i class="far fa-envelope-open-text"></i>
                            </div>
                            <div class="content">
                                <span class="title">email address</span>
                                <span class="text">
                                        <a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif"><span class="__cf_email__" >@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</span></a><br>
                                    </span>
                            </div>
                        </div>
                        <div class="contact-info-item style-two">
                            <div class="icon">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="content">
                                <span class="title">Phone Number</span>
                                <span class="text">
                                        Call <a href="calto:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif</a><br>
                                    </span>
                            </div>
                        </div>
                        <div class="follow-us">
                            <h4>Follow Us</h4>
                            <div class="social-style-two">

                                @if(!empty(@$setting_data->facebook))
                                    <a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" target="_blank" class="social-fb"
                                    ><i class="fab fa-facebook-f"></i
                                        ></a>
                                @endif
                                @if(!empty(@$setting_data->youtube))

                                    <a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" target="_blank" class="social-youtube"
                                    ><i class="fab fa-youtube"></i
                                        ></a>
                                @endif
                                @if(!empty(@$setting_data->instagram))

                                    <a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" target="_blank" class="social-instagram"
                                    ><i class="fab fa-instagram"></i
                                        ></a>
                                @endif
                                @if(!empty(@$setting_data->linkedin))

                                    <a href="@if(!empty(@$setting_data->linkedin)) {{@$setting_data->linkedin}} @endif" target="_blank" class="social-linkedin"
                                    ><i class="fab fa-linkedin-in"></i
                                        ></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
