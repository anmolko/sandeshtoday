@extends('frontend.layouts.master')
@section('title') समाचार खोज परिणाम @endsection

@section('content')

    <section class="block-wrapper">
        <div class="container">

            <!-- block content -->
            <div class="block-content non-sidebar">

                <!-- grid box -->
                <div class="grid-box">
                    <div class="title-section">
                        <h1><span class="health">खोज गरिएको : <strong>{{$query}}</strong></span></h1>
                    </div>

{{--                    <div class="image-slider">--}}
{{--                        <ul class="bxslider">--}}
{{--                            @sandeshloop(getCategoryRelatedPost(@$category->slug,0,3) as $news)--}}

{{--                                <li>--}}
{{--                                <div class="news-post image-post2">--}}
{{--                                    <div class="post-gallery">--}}
{{--                                        <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">--}}
{{--                                        <div class="hover-box">--}}
{{--                                            <div class="inner-hover">--}}
{{--                                                <h2>--}}
{{--                                                    <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>--}}
{{--                                                </h2>--}}
{{--                                                <ul class="post-tags">--}}
{{--                                                    <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            @endsandeshloop--}}

{{--                        </ul>--}}
{{--                    </div>--}}

                    <div class="row">
                        @if(count($searchPosts)>0)
                            @sandeshloop(@$searchPosts as $news)
                                <div class="col-md-6">
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <div class="veil">
                                                <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="">
                                            </div>
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <h2>
                                                        <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                                    </h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endsandeshloop
                        @else
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                <div class="news-post standard-post2">
                                    <div class="post-gallery">
                                        <img src=" {{ asset('assets/frontend/images/post_not_found.jpg')}}" alt="">
                                        <a class="category-post world">POST NOT FOUND</a>
                                    </div>
                                    <div class="post-title">
                                        <h2 class="title" style="font-size: 40px;color: #29308d;line-height: 50px;">पोस्ट  भेटिएन ।
                                            <br> नया खोज सुचारु गर्नुहोस् । धन्यवाद ।
                                        </h2>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        @endif
                    </div>

                </div>

            </div>
            <!-- End block content -->
        </div>
    </section>


@endsection

@section('js')
    <script>

    </script>

@endsection
