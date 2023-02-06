@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($pageTitle) }} @endsection
@section('css')

    <style>
        /* .footable .btn .caret {
            margin-left: 0;
            display: none;
        } */

        .rendered-form h1{
            font-family: 'Kumbh Sans', sans-serif;
            margin-bottom: 25px;
            font-weight: 700;
            color: #293043;
            line-height: 1.22;
            font-size: 45px;
        }
        .card-title{
            color: #27aae1;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-inline-flexbox;
            display: inline-flex;
        }

        .card-title::before{
            content: url(/assets/frontend/images/shapes/section-subtitle-line.png);
            margin: -15px 15px 0 -25px;
            float: left;
            line-height: 0;
            font-size: 40px;
            font-weight: 300;
            font-family: 'Font Awesome 5 Pro';
        }
        .rendered-form .form-control {
            background: none;
            padding-top: 17px;
            padding-bottom: 17px;
        }

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

        .topbar-items .social-icons li a i {
            line-height: 50px;
        }
        .parsley-errors-list.filled {
            opacity: 1;
        }

        .rendered-form .fb-radio-group .radio label {
            display: inline;
        }

        .rendered-form .fb-radio-group .radio-inline label {
            display: inline ;
            margin-bottom: 0;
        }

        input[type=checkbox], input[type=radio] {
            box-sizing: border-box;
            padding: 0;
        }

        .rendered-form .fb-radio-group .radio input{
            position: absolute !important;
            margin-top: 0.3rem !important;
            margin-left: -1.25rem !important;
        }
        .rendered-form .fb-radio-group .radio-inline input {
            position: static !important;
            margin-top: 0 !important;
            margin-right: 0.3125rem !important;
            margin-left: 0 !important;
        }

        .rendered-form .fb-radio-group .radio {
            position: relative;
            display: block;
            padding-left: 1.25rem !important;
        }

        .rendered-form .fb-radio-group .radio-inline {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-align: center;
            align-items: center;
            padding-left: 0;
            margin-right: 0.75rem;
            position: relative;
        }

        .rendered-form .fb-checkbox-group .checkbox {
            position: relative;
            display: block;
            padding-left: 1.25rem !important;
        }

        .rendered-form .fb-checkbox-group .checkbox input {
            position: absolute !important;
            margin-top: 0.3rem !important;
            margin-left: -1.25rem !important;
        }

        .rendered-form .fb-checkbox-group .checkbox label {
            display: inline-block;
            margin-bottom: 0;
        }

        .rendered-form .fb-checkbox-group .checkbox-inline {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-align: center;
            align-items: center;
            padding-left: 0;
            margin-right: 0.75rem;
            position: relative;
        }

        .rendered-form .fb-checkbox-group .checkbox-inline input {
            position: static !important;
            margin-top: 0 !important;
            margin-right: 0.3125rem !important;
            margin-left: 0 !important;
        }

        .rendered-form .fb-checkbox-group .checkbox-inline label {
            display: inline-block;
            margin-bottom: 0;
        }

        .card {
            position: relative !important;
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
            -ms-flex-direction: column !important;
            flex-direction: column !important;
            min-width: 0 !important;
            word-wrap: break-word !important;
            background-color: var(--vz-card-bg) !important;
            background-clip: border-box !important;
            border: 0 solid rgba(0,0,0,.125) !important;
            border-radius: 0.25rem !important;
        }
        .card-header:first-child {
            border-radius: 0.25rem 0.25rem 0 0 !important;
        }

        .card-header {
            padding: 1rem 1rem !important;
            margin-bottom: 0 !important;
            background-color: var(--vz-card-cap-bg) !important;
            border-bottom: 0 solid rgba(0,0,0,.125) !important;
        }

        .card-footer:last-child {
            border-radius: 0 0 0.25rem 0.25rem !important;
        }

        .card-footer {
            padding: 1rem 1rem !important;
            background-color: var(--vz-card-cap-bg) !important;
            border-top: 0 solid rgba(0,0,0,.125) !important;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #405189 !important;
            border-color: #405189 !important;
        }

        .btn {
            display: inline-block !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            text-align: center !important;
            text-decoration: none !important;
            vertical-align: middle !important;
            cursor: pointer !important;
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
            border: 1px solid transparent !important;
            padding: 0.5rem 0.9rem !important;
            font-size: .8125rem !important;
            border-radius: 0.25rem !important;
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
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h5 class="card-title">{{ ucwords($pageTitle) }}</h5>
                        </div>

                        <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                            @csrf
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <strong class="sent-success">{{ $message }}</strong>
                                </div>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <strong class="error-sent">{{ $message }}</strong>
                                </div>
                            @endif
                            <div class="card-body">
                                <div id="fb-render"></div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="theme-btn w-100 confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                                    <i class="fa fa-submit"></i> Submit Form
                                </button>
                            </div>
                        </form>
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

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
