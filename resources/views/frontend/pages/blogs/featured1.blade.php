@if(getCategoryRelatedPost(@$category->slug,0,3))
    <!-- Popular Section Start -->
    <div class="popular-section section pt-50 pb-50">
        <div class="container">
          <div class="row">
             <div class="col">

                                <!-- Popular Post Slider Start -->
                                <div class="popular-post-slider">


                                    @darpanloop(getCategoryRelatedPost(@$category->slug,0,3) as $news)
                                        <div class="post post-overlay">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <div class="image">
                                                    <img src="{{($news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/darpan_dainik.png')}}" alt="post">
                                                </div>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title">
                                                        <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                                    </h4>

                                                    <!-- Meta -->
                                                    <div class="meta fix">
                                                        <span class="meta-item date"><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    @enddarpanloop
                                </div>

                            </div>
          </div>
        </div>
    </div><!-- Popular Section End -->
@endif
