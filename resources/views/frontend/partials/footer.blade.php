
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
                <div class="col-md-3">
                    <div class="widget text-widget">
                        <h1>About</h1>
                        <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis. </p>
                        <p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. </p>
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
                    <div class="widget posts-widget">
                        <h1>Random Post</h1>
                        <ul class="list-posts">
                            <li>
                                <img src="upload/news-posts/listw4.jpg" alt="">
                                <div class="post-content">
                                    <a href="travel.html">travel</a>
                                    <h2><a href="single-post.html">Pellentesque odio nisi, euismod in ultricies in, diam. </a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <img src="upload/news-posts/listw1.jpg" alt="">
                                <div class="post-content">
                                    <a href="business.html">business</a>
                                    <h2><a href="single-post.html">Sed arcu. Cras consequat.</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <img src="upload/news-posts/listw3.jpg" alt="">
                                <div class="post-content">
                                    <a href="tech.html">tech</a>
                                    <h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.</a></h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget categories-widget">
                        <h1>Hot Categories</h1>
                        <ul class="category-list">
                            <li>
                                <a href="#">Business <span>12</span></a>
                            </li>
                            <li>
                                <a href="#">Sport <span>26</span></a>
                            </li>
                            <li>
                                <a href="#">LifeStyle <span>55</span></a>
                            </li>
                            <li>
                                <a href="#">Fashion <span>37</span></a>
                            </li>
                            <li>
                                <a href="#">Technology <span>62</span></a>
                            </li>
                            <li>
                                <a href="#">Music <span>10</span></a>
                            </li>
                            <li>
                                <a href="#">Culture <span>43</span></a>
                            </li>
                            <li>
                                <a href="#">Design <span>74</span></a>
                            </li>
                            <li>
                                <a href="#">Entertainment <span>11</span></a>
                            </li>
                            <li>
                                <a href="#">video <span>41</span></a>
                            </li>
                            <li>
                                <a href="#">Travel <span>11</span></a>
                            </li>
                            <li>
                                <a href="#">Food <span>29</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget flickr-widget">
                        <h1>Flickr Photos</h1>
                        <ul class="flickr-list">
                            <li><a href="#"><img src="upload/flickr/1.jpg" alt=""></a></li>
                            <li><a href="#"><img src="upload/flickr/2.jpg" alt=""></a></li>
                            <li><a href="#"><img src="upload/flickr/3.jpg" alt=""></a></li>
                            <li><a href="#"><img src="upload/flickr/4.jpg" alt=""></a></li>
                            <li><a href="#"><img src="upload/flickr/5.jpg" alt=""></a></li>
                            <li><a href="#"><img src="upload/flickr/6.jpg" alt=""></a></li>
                        </ul>
                        <a href="#">View more photos...</a>
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
