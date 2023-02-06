@extends('frontend.layouts.master')
@section('title') समाचार खोज परिणाम @endsection

@section('content')

    <div class="post-header-section section mt-30 mb-30">
        <div class="container">
            <div class="row row-1 border-bottom-1">
                <div class="col-12">
                    <div class="post-header category-header">

                        <div class="flex-1">
                            <!-- Title -->
                            <h3 class="title">खोज गरिएको : <strong>{{$query}}</strong></h3>
                            <div class="pt-5 mb-remove">
                                <ol class="page-breadcrumb pt-5 mb-remove">
                                    <li><a href="/">गृह पृष्ठ</a></li>
                                    <li class="active"> खोज परिणाम </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="post-section section mt-10">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row">

                <div class="col-lg-12 col-12 mb-50">

                    <!-- Post Block Wrapper Start -->
                    <div class="post-block-wrapper">

                        <!-- Post Block Body Start -->
                        <div class="body">
                            <div class="row">
                                @if(count($searchPosts)>0)
                                    @darpanloop(@$searchPosts as $news)
                                    <div class="post fashion-post post-default-list post-search post-separator-border" id="posts">
                                        <div class="post-wrap">

                                            <!-- Image -->
                                            <a class="image" href="{{ url(@$news->url()) }}">
                                                <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">
                                            </a>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Title -->
                                                <h4 class="title"><a href="{{ url(@$news->url()) }}">{{@$news->title}}</a></h4>

                                                <!-- Meta -->
                                                <div class="meta fix">
                                                    <span class="meta-item date"><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</span>
                                                </div>

                                                <!-- Description -->
                                                <p>  {{   @$news->shortContent(100)}}</p>

                                                <!-- Read More -->
                                                <a href="{{ url(@$news->url()) }}" class="read-more">पुरा पढ्नुहोस् <i class="fa fa-angle-right"></i></a>

                                            </div>

                                        </div>
                                    </div>
                                    @enddarpanloop
                                @else
                                    <div class="post sports-post post-separator-border col-md-12 col-12">
                                        <div class="post-wrap" style="text-align: center">

                                            <div class="content">
                                                <h2 class="title" style="font-size: 40px;">पोस्ट  भेटिएन ।
                                                    <br> नया खोज सुचारु गर्नुहोस् । धन्यवाद ।
                                                </h2>
                                            </div>
                                            <div class="image" style="width: 50%;margin: auto;">
                                                <img src="{{ asset('assets/frontend/img/post_not_found.png')}}" alt="post">
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div><!-- Post Block Body End -->

                    </div><!-- Post Block Wrapper End -->

                </div>


            </div><!-- Feature Post Row End -->

        </div>
    </div>



@endsection

@section('js')
    <script>

    </script>

@endsection
