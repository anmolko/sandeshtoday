
@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('css')
    <style>

</style>
@endsection
@section('content')

        <!-- Page Banner Start -->
        <section class="page-banner-area pt-245 rpt-150 pb-170 rpb-100 rel z-1 bgc-lighter text-center">
            <div class="container">
                <div class="banner-inner rpt-10">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center wow fadeInUp delay-0-4s">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
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

                <!-- Contact Us Page Area start -->
                <section class="contact-us-page-area py-130">
            <div class="container">
                <div class="row align-items-end justify-content-between">
                    <div class="col-lg-7">
                        <div class="contact-content rmb-65 wow fadeInRight delay-0-2s">
                            <div class="section-title mb-25">
                                <span class="sub-title style-two mb-15">Contact Us</span>
                                <h2>Send Your Message</h2>
                            </div>
                            <form id="contactForm" class="contactForm z-1 rel"  action="{{route('contact.store')}}" name="contactForm" method="post">
                            @csrf
                                <!-- @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <strong class="sent-success">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif     -->
                            <div class="row pt-15">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="" placeholder="Michael C. Coleman" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control" value="" placeholder="support@gmail.com" required data-error="Please enter your Email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" id="phone" name="phone" class="form-control" value="" placeholder="+000 (123) 456 88" required data-error="Please enter your phone number">
                                            <div class="help-block with-errors"></div>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-30">
                                        <div class="form-group">
                                           <label for="subject">Select Requirments</label>
                                           <select name="subject" id="subject">
                                                <option value="Trade Inquiry" >Trade Inquiry</option>
                                                <option value="Ask a question" selected>Ask a question</option>
                                                <option value="Share Feedback">Share Feedback</option>
                                                <option value="Career Enquiry">Career Enquiry</option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Write Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write Message" required data-error="Please enter your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group pt-5 mb-0">
                                            <button type="submit" class="theme-btn w-100">Send Message <i class="fas fa-angle-double-right"></i></button>
                                            <div id="msgSubmit" class="hidden"></div>
                                        </div>
                                    </div>
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
        <!-- Contact Us Page Area end -->
        
        <!-- Location Map Area Start -->
        <div class="contact-page-map wow fadeInUp delay-0-2s">
            <div class="our-location">
            @if(@$setting_data->google_map)
                                <iframe frameborder="0" height="200px" scrolling="no" marginheight="0" marginwidth="0" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="{{@$setting_data->google_map}}"
                                            title="%3$s" aria-label="%3$s"></iframe>
                                @endif
            </div>
        </div>
        <!-- Location Map Area End -->

        
  
@endsection
@section('js')
  <!-- For Contact Form -->
  <script src="{{asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/contact-form-script.js')}}"></script>
@endsection
