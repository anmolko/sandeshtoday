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
        @if(count($allPosts)>0)
            <section class="block-wrapper">
            <div class="container">

                <!-- block content -->
                <div class="block-content non-sidebar">

                    <!-- grid box -->
                    <div class="grid-box">
                        <div class="masonry-box">
                            <div class="title-section category-title">
                                <h1><span>{{ ucfirst( @$category->name )}}</span></h1>
                            </div>
                            @if(countCategoryChildren(@$category->id))
                                <ul class="horizontal-filter-posts">
                                    @foreach(categoryChildren(@$category->id) as $child)
                                        <li><a class="active" href="{{route('blog.category',@$child->slug)}}">{{@$child->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="latest-articles iso-call">
                                @sandeshloop(@$allPosts as $key=>$news)
                                    <div class="news-post standard-post2 default-size category-posts">
                                        <div class="post-gallery">
                                            <a href="{{ url(@$news->url()) }}">
                                            <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}"></a>
                                        </div>
                                        <div class="post-title">
                                            <h2>
                                                <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>                                    </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endsandeshloop

                            </div>
                        </div>
                        <div class="pagination-box">
                            {{ $allPosts->links('vendor.pagination.default') }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
        @endif
@endsection
