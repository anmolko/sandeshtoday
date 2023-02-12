
<section class="heading-news3">
    <div class="title-section" style="text-align: center">
        <h1><span>छुटाउनुभयो कि ?</span></h1>
    </div>
    <div class="heading-news-box">


        <div class="owl-wrapper">
            <div class="owl-carousel" data-num="4">
                @foreach($footer_news as $news)
                    <div class="item">
                        <div class="news-post image-post2">
                            <div class="post-gallery">
                                <div class="veil">
                                    <img src="{{(@$news->image !== null) ?  asset('/images/blog/'.@$news->image) : asset('assets/backend/images/sandesh_today.png')}}" alt="post">
                                </div>
                                <div class="hover-box">
                                    <div class="inner-hover">
                                        <h2>
                                            <a href="{{ url(@$news->url()) }}">{{@$news->title}}</a>
                                        </h2>
                                        <ul class="post-tags tagged">
                                            <li><i class="fa fa-clock-o"></i>{{@$news->publishedDateNepali()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

</section>

<!-- footer
        ================================================== -->
<footer>
    <div class="container">
        <div class="footer-widgets-part">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget text-widget footer-descp">
                        <h1>हाम्रो बारेमा</h1>
                        @if(!empty(@$setting_data->website_description)) {!! ucfirst(@$setting_data->website_description) !!} @else
                            <p><a href="/">Sandesh today</a> is a news and entertainment channel that engages viewers through live and often quickly
                                interactions between celebs, journalists and special guests. News is
                                refreshment for people who don’t have time for their daily dose of information.
                                Sandesh today offers you a solution to understanding yourself better.</p>
                        @endif
                    </div>
                    <div class="widget social-widget">
                        <h1>Stay Connected</h1>
                        <ul class="social-icons">
                            @if(!empty(@$setting_data->facebook))
                                <li><a class="facebook" href="{{ (!empty(@$setting_data->facebook)) ? @$setting_data->facebook : "#"  }}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if(!empty(@$setting_data->linkedin))
                                <li><a class="twitter" href="{{ (!empty(@$setting_data->linkedin)) ? @$setting_data->linkedin : "#"  }}"><i class="fa fa-twitter"></i></a></li>
                            @endif
                            @if(!empty(@$setting_data->youtube))
                                <li><a class="google" href="{{ (!empty(@$setting_data->youtube)) ? @$setting_data->youtube : "#"  }}"><i class="fa fa-youtube-play"></i></a></li>
                            @endif
                            @if(!empty(@$setting_data->instagram))
                                <li><a class="linkedin" href="{{ (!empty(@$setting_data->instagram)) ? @$setting_data->instagram : "#"  }}"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            @if(!empty(@$setting_data->ticktock))
                                <li><a class="pinterest" href="{{ (!empty(@$setting_data->ticktock)) ? @$setting_data->ticktock : "#"  }}"><i class="fa-brands fa-tiktok"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget categories-widget">
                        <h1>समाचार</h1>
                        <ul class="category-list">
                            @foreach(@$footer_categories as $category)
                                <li>
                                    <a href="{{ route('blog.category',@$category->slug) }}">{{@$category->name}} <span>{{@$category->blogs_count}}</span></a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    @if(@$footer_nav_data1 !== null)

                    <div class="widget categories-widget">
                        <h1>@if(@$footer_nav_title1 !== null) {{@$footer_nav_title1}} @else सन्देश टूडे @endif</h1>
                        <ul class="category-list single-category">
                            <li><a href="/"> होम पेज </a></li>

                            @if(!empty($footer_nav_data1))
                                @foreach($footer_nav_data1 as $nav)
                                    @if(!empty($nav->children[0]))
                                    @else
                                        @if($nav->type == 'custom')
                                            <li>
                                                <a href="{{ (str_contains(@$nav->slug,'http')) ? $nav->slug: '/'.$nav->slug }}"
                                                   @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif
                                                > @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif </a>
                                            </li>
                                        @elseif($nav->type == 'category')
                                            <li>
                                                <a href="{{url('category')}}/{{$nav->slug}}"
                                                   @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif
                                                > @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{url('/')}}/{{$nav->slug}}"
                                                   @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif
                                                > @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif </a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-md-3">
                    <div class="widget categories-widget">
                        <h1>सम्पर्क ठेगाना</h1>
                        <a href="/">
                            <img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/settings/'.@$setting_data->logo_white)}}<?php } ?>" alt="Logo">
                        </a>

                        <ul class="category-list single-category address-detail" style="margin-top: 20px;">
                            @if(@$setting_data->address !== null)
                                <li>
                                    <i class="fa fa-location-arrow"></i>
                                    <span>{{@$setting_data->address}}</span>
                                </li>
                            @endif
                            @if(@$setting_data->phone !== null)
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <span>
                                        <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +9771238798 @endif">
                                        {{@$setting_data->phone}}
                                        </a>
                                    </span>
                                </li>
                            @endif
                            @if(@$setting_data->mobile !== null)
                                <li>
                                    <i class="fa fa-mobile"></i>
                                    <span>
                                        <a href="tel:@if(!empty(@$setting_data->mobile)) {{@$setting_data->mobile}} @else +9771238798 @endif">
                                        {{@$setting_data->mobile}}
                                        </a>
                                    </span>
                                </li>
                            @endif
                            @if(@$setting_data->email !== null)
                                <li>
                                    <i class="fa fa-keyboard-o"></i>
                                    <span>
                                        <a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">
                                            {{@$setting_data->email}}
                                        </a>
                                    </span>
                                </li>
                             @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-last-line">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; COPYRIGHT 2015 hotmagazine.com</p>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html">Purchase Theme</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->

</div>
<!-- End Container -->

<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.migrate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.ticker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.imagesloaded.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/retina-1.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/plugins-scroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/frontend/js/script.js')}}"></script>

</body>
</html>
