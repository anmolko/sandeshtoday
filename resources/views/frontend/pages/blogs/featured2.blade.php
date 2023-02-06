@if(getCategoryRelatedPost(@$category->slug,0,3))
    <div class="popular-section section pt-50 pb-50">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 col-12 mb-20">
                    @foreach(getCategoryRelatedPost(@$category->slug,0,1) as $news)
                        <div class="post post-overlay life-style-post post-separator-border">
                            <div class="post-wrap">

                                <!-- Image -->
                                <div class="image">
                                    <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">
                                </div>

                                <div class="content">
                                    <h4 class="title">
                                        <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                    </h4>
                                    <div class="meta fix">
                                        <span class="meta-item date"><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</span>
                                    </div>
                                </div>

                            </div>
                        </div><!-- Overlay Post End -->


                    @endforeach
                </div>
                <div class="col-md-5 col-12 mb-20">
                    @foreach(getCategoryRelatedPost(@$category->slug,1,2) as $news)
                        @if($loop->first)
                            <div class="post post-overlay life-style-post post-separator-border">
                                <div class="post-wrap category-wrap">

                                    <div class="image">
                                        <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">
                                    </div>

                                    <div class="content">
                                        <h4 class="title">
                                            <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                        </h4>
                                        <div class="meta fix">
                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</span>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- Overlay Post End -->

                        @else
                            <div class="post post-small post-list life-style-post post-separator-border">
                                <div class="post-wrap">

                                    <!-- Image -->
                                    <a class="image" href="{{ url(@$news->url()) }}">
                                        <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">
                                    </a>

                                    <!-- Content -->
                                    <div class="content">

                                        <!-- Title -->
                                        <h5 class="title">
                                            <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                        </h5>

                                        <!-- Meta -->
                                        <div class="meta fix">
                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</span>
                                        </div>

                                    </div>

                                </div>
                            </div><!-- Small Post End -->

                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
