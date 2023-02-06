@extends('frontend.layouts.master')
@section('title') {{ ucfirst( @$category->name )}} @endsection
@section('css')
<style>
.home-one a.active {
    color: #27aae1;
}
</style>
@endsection
@section('content')

    @if(countCategoryChildren(@$category->id))
        @include('frontend.pages.blogs.category_nav2')
    @else
        @include('frontend.pages.blogs.category_nav1')
    @endif

    @if(checkEven(@$category->id))
        @include('frontend.pages.blogs.featured1')
    @else
        @include('frontend.pages.blogs.featured2')
    @endif

    @if(count($allPosts)>0)
        <div class="post-section section mt-50">
        <div class="container">

            <!-- Feature Post Row Start -->
            <div class="row">

                <div class="col-lg-12 col-12 mb-50">
                    <div class="post-block-wrapper all-news-block">
                        <div class="body">
                            <div class="row">
                                @darpanloop(@$allPosts as $key=>$news)

                                    <!-- Post Start -->
                                    <div class="post sports-post post-separator-border col-md-4 col-12">
                                        <div class="post-wrap">

                                            <!-- Image -->
                                            <a class="image" href="{{ url(@$news->url()) }}">
                                                <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post"></a>

                                            <!-- Content -->
                                            <div class="content">

                                                <!-- Title -->
                                                <h4 class="title"><a href="{{ url(@$news->url()) }}">{{@$news->title}}</a></h4>

                                            </div>

                                        </div>
                                    </div><!-- Post End -->

                                @enddarpanloop


                                {{ $allPosts->links('vendor.pagination.default') }}


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection
