@extends('frontend.layouts.master')
@section('title') Terms of Service @endsection
@section('css')
    <style>

    .custom-editor .media{
        display: block;
    }

    .custom-editor{
        font-size: 1.1875rem;
        text-align: justify;
    }

    .elementor-811 .elementor-element.elementor-element-6deeee44 {
        padding: 0px 0px 0px 0px;
    }

    </style>
@endsection
@section('content')


    <div class="blog-section section">
        <div class="container">
            <div class="single-blog" style="padding: 10px 0 10px 20px">
                <div class="blog-wrap header">
                    <h4 class="title" style="font-size: 26px">Terms of Service</h4>
                </div>
            </div>
            <!-- Feature Post Row Start -->
            <div class="row">
                <div class="col-lg-12 col-12 mb-50">

                    <div class="single-blog mb-50" id="main-content">
                        <div class="blog-wrap">
                            <div class="content editor-content editor-flx" id="content">

                                {!! $setting_data->terms_conditions !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
