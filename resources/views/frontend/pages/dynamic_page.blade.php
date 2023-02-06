@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}} @endsection
@section('css')
    <style>

    .theme-btn.style-three, a.theme-btn.style-three.faq-button {
        color: #293043 !important;
        background: transparent;
        border: 1px solid rgba(0, 102, 255, 0.2);
    }
  .custom-editor .media{
        display: block;
    }

    .feature-item-three > img {
        width:60px;
        height:60px;
        margin-top: 10px;
        margin-right: 25px;
    }
    .custom-editor{
        font-size: 1.1875rem;
        text-align: justify;
    }

    .accordion-item {
      margin-bottom: 30px;
  }

  #gallery #image-gallery .img-wrapper {
          height: 270px;
      }

      #gallery img.img-responsive {
          width: 100%;
          height: 100%;
          object-fit: cover;
      }

      ul, ol{
        padding-left: 1rem;
      }

    .winrecruit ul li::before,.winrecruit ol li::before {
      -webkit-box-flex: 0;
      -ms-flex: none;
      flex: none;
      width: 18px;
      height: 18px;
      font-size: 10px;
      margin-top: 7px;
      font-weight: 600;
      content: "\f00c";
      line-height: 14px;
      border: 2px solid;
      text-align: center;
      margin-right: 15px;
      border-radius: 50%;
      color: #0066ff;
      font-family: 'Font Awesome 5 Pro';
    }
    .winrecruit ol li ol li::before,.winrecruit ol li ul li::before,.winrecruit ul li ol li::before ,.winrecruit ul li ul li::before {
      -webkit-box-flex: 0;
      -ms-flex: none;
      flex: none;
      width: 18px;
      height: 18px;
      font-size: 10px;
      margin-top: 7px;
      font-weight: 600;
      content: "\f00c";
      line-height: 14px;
      border: 2px solid;
      text-align: center;
      margin-right: 15px;
      border-radius: 50%;
      color: #0066ff;
      font-family: 'Font Awesome 5 Pro';
    }

    </style>
  <link rel="stylesheet" href="{{asset('assets/frontend/css/lightbox.css')}}">

@endsection
@section('content')

    <!-- Page Banner Start -->
    <section class="page-banner-area pt-245 rpt-150 pb-170 rpb-100 rel z-1 bgc-lighter text-center">
        <div class="container">
            <div class="banner-inner rpt-10">
            <h1 class="page-title wow fadeInUp delay-0-2s animated">{{ucwords(@$page_detail->name)}}</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center wow fadeInUp delay-0-4s">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">{{ucwords(@$page_detail->name)}}</li>
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

    @foreach($sections as $key=>$value)

        @if($value == "basic_section")
          <!--- Basic Section--->
          <section class="ww-do-two-area py-130 rel z-1">
            <div class="container">
              <div class="row justify-content-between align-items-center">

                @if(@$basic_elements->list_image == "right")

                  <div class="col-xl-5 col-lg-6">
                    <div class="ww-do-two-content rmb-65 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                      <div class="section-title mb-30">
                                @if(@$basic_elements->subheading)
                                  <span class="sub-title style-two mb-15">{{ucfirst(@$basic_elements->subheading)}}</span>
                                @endif
                                @if(@$basic_elements->heading)
                                  <h2>{{ucwords(@$basic_elements->heading)}}</h2>
                                @endif

                      </div>
                      <p class="win-justify"> {!! @$basic_elements->description !!}</p>
                      @if(@$basic_elements->button)
                      <div class="ww-do-btns">
                        <a href="{{@$basic_elements->button_link}}" class="theme-btn mt-15">{{ucwords(@$basic_elements->button)}} <i class="fas fa-angle-double-right"></i></a>
                      </div>
                      @endif

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="ww-do-two-images rel">
                      <div class="row">
                    <div class="best-skills-image wow fadeInRight delay-0-2s animated animated" style="visibility: visible; animation-name: fadeInRight;">
                      <img src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="Best Skills">
                    </div>
                      </div>
                    </div>
                  </div>
                @else
                  <div class="col-lg-6">
                    <div class="ww-do-two-images rel">
                      <div class="row">
                    <div class="best-skills-image wow fadeInRight delay-0-2s animated animated" style="visibility: visible; animation-name: fadeInRight;">
                      <img src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="Best Skills">
                    </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-5 col-lg-6">
                    <div class="ww-do-two-content rmb-65 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                      <div class="section-title mb-30">
                                @if(@$basic_elements->subheading)
                                  <span class="sub-title style-two mb-15">{{ucfirst(@$basic_elements->subheading)}}</span>
                                @endif
                                @if(@$basic_elements->heading)
                                  <h2>{{ucwords(@$basic_elements->heading)}}</h2>
                                @endif

                      </div>
                      <p class="win-justify"> {!! @$basic_elements->description !!}</p>
                      @if(@$basic_elements->button)
                      <div class="ww-do-btns">
                        <a href="{{@$basic_elements->button_link}}" class="theme-btn mt-15">{{ucwords(@$basic_elements->button)}} <i class="fas fa-angle-double-right"></i></a>
                      </div>
                      @endif

                    </div>
                  </div>

                @endif

              </div>
            </div>
          </section>
        @endif

        @if($value == "call_to_action_1")
          <!--- Call to Action--->
          <section class="call-to-action-area bgc-black pt-80 pb-50">
            <div class="container">
              <div class="row justify-content-between align-items-center">
                <div class="col-xl-8 col-lg-10">
                  <div class="section-title text-white mb-25 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                    <h2>{{ucfirst(@$call1_elements->heading)}}</h2>
                    <p>{{ucfirst(@$call1_elements->description)}}</p>
                  </div>
                </div>
                <div class="col-lg-3 text-lg-end">
                @if(@$call1_elements->button)
                <a href="{{@$call1_elements->button_link}}" class="theme-btn style-two mb-30 wow fadeInUp delay-0-4s animated" style="visibility: visible; animation-name: fadeInUp;">{{ucwords(@$call1_elements->button)}} <i class="fas fa-angle-double-right"></i></a>

                @endif
                </div>
              </div>
            </div>
          </section>
        @endif

        @if($value == "background_image_section")
          <!--- Background Image--->
          <section class="video-area bgc-black">
            <div class="container">
              <div class="row medium-gap align-items-end pt-80">
                <div class="col-lg-6">
                  <div class="video-part rmb-65 wow fadeInRight delay-0-2s animated" style="visibility: visible; animation-name: fadeInRight; margin-bottom: 0px">
                    <img src="{{asset('/images/section_elements/bgimage_section/'.@$bgimage_elements->image)}}" alt="Video">
                    @if(@$bgimage_elements->list_description)
                      <a href="{{@$bgimage_elements->list_description}}" class="mfp-iframe video-play" tabindex="-1"><i class="fas fa-play"></i></a>
                    @endif

                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="video-content text-white pb-95 rpb-115 wow fadeInLeft delay-0-2s animated" style="visibility: visible; animation-name: fadeInLeft;">
                    <div class="section-title mb-30">
                      @if(@$bgimage_elements->heading)

                        <h2>{{ucwords(@$bgimage_elements->heading)}}</h2>

                      @endif

                    </div><p class="win-justify">{{ucfirst(@$bgimage_elements->description)}}</p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        @endif

        @if($value == "flash_cards")
          <!--- Mission Vision--->
          <section class="services-area-five pt-115 pb-100">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                  <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                    <span class="sub-title style-two mb-20">Our Process</span>
                    <h2> Mission, Vision & Value</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                @foreach(@$flash_elements as $flash_element)

                  @if($loop->index == 0)
                    <div class="col-xl-4 col-md-6">
                      <div class="service-item-five wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="icon">
                          <img src="{{asset('/images/section_elements/list_1/'.@$flash_element->image)}}" alt="Icon">
                        </div>
                        <h4>{{ucwords(@$flash_element->list_header)}}</h4>
                        <p class="win-justify">{{ucfirst(@$flash_element->list_description) }}</p>
                      </div>
                    </div>
                  @endif

                  @if($loop->index == 1)

                    <div class="col-xl-4 col-md-6">
                      <div class="service-item-five wow fadeInUp delay-0-4s animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="icon">
                          <img src="{{asset('/images/section_elements/list_1/'.@$flash_element->image)}}" alt="Icon">
                        </div>
                        <h4>{{ucwords(@$flash_element->list_header)}}</h4>
                        <p class="win-justify">{{ucfirst(@$flash_element->list_description) }}</p>
                      </div>
                    </div>
                  @endif

                  @if($loop->index == 2)

                    <div class="col-xl-4 col-md-6">
                      <div class="service-item-five wow fadeInUp delay-0-6s animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="icon">
                          <img src="{{asset('/images/section_elements/list_1/'.@$flash_element->image)}}" alt="Icon">
                        </div>
                        <h4>{{ucwords(@$flash_element->list_header)}}</h4>
                        <p class="win-justify">{{ucfirst(@$flash_element->list_description) }}</p>
                      </div>
                    </div>
                  @endif
                @endforeach

              </div>
            </div>
          </section>
        @endif

        @if($value == "simple_header_and_description")

          <!--- Simple Header Description--->
          <section class="project-details-area pt-80 pb-130 rel z-1" style="    padding-left: 150px;
    padding-right: 150px;">
            <div class="container">
              <div class="section-title text-center mb-50 wow fadeInUp delay-0-2s animated" style="visibility: visible; animation-name: fadeInUp;">
                  @if(@$header_descp_elements->heading)

                    <h2>{{ucwords(@$header_descp_elements->heading)}}</h2>
                      <hr class="mb-4">
                  @endif

                  @if(@$header_descp_elements->subheading)
                    <span class="sub-title-two">{{@$header_descp_elements->subheading}}</span>

                  @endif
              </div>

                <div class="winrecruit win-justify">
                {!! @$header_descp_elements->description !!}
               </div>
            </div>
          </section>
        @endif

        @if($value == "map_and_description")
          <!--- Map & Description--->
          <section class="faq-page-about-area pt-130">
            <div class="container">
              <div class="row large-gap justify-content-center align-items-center pb-115">
                <div class="col-xl-5 col-lg-6">
                  <div class="faq-page-content rmb-65 wow fadeInRight delay-0-2s animated" style="visibility: visible; animation-name: fadeInRight;">
                    <div class="section-title mb-25">
                        @if(@$map_descp->subheading)
                          <span class="sub-title style-two mb-15">{{@$map_descp->subheading}}</span>
                        @endif
                        @if(@$map_descp->heading)
                          <h2>{{ucwords(@$map_descp->heading)}}</h2>
                        @endif

                    </div>
                    <p class="win-justify">
                    {!!  @$map_descp->description !!}

                    </p>
                      @if(@$map_descp->button)
                        <a href="{{@$map_descp->button_link}}" class="theme-btn style-two mb-30 wow fadeInUp delay-0-4s animated" style="visibility: visible; animation-name: fadeInUp;">{{ucwords(@$map_descp->button)}} <i class="fas fa-angle-double-right"></i></a>
                      @endif

                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="faq-page-image wow fadeInLeft delay-0-2s animated" style="visibility: visible; animation-name: fadeInLeft;">

                          @if(@$map_descp->list_description)
                          {!! @$map_descp->list_description !!}
                          @elseif(@$setting_data->google_map)
                            <iframe frameborder="0" width="100%" height="450px"scrolling="no" marginheight="0" marginwidth="0" src="{{@$setting_data->google_map}}"
                                        title="%3$s" aria-label="%3$s"></iframe>
                          @endif

                  </div>
                </div>
              </div>

            </div>
          </section>
        @endif

        @if($value == "accordion_section_2")
            <!-- FAQs Page Area start -->
          <section class="faqs-area-area py-100 rel z-1" style="    background: linear-gradient(90deg, rgba(247,249,253,1) 0%, rgba(230,238,255,1) 43%, rgba(230,238,255,1) 50%, rgba(247,249,253,1) 100%);">
              <div class="container">
                  <div class="row justify-content-between align-items-end pb-5">
                      <div class="col-xl-6 col-lg-8 wow fadeInUp delay-0-2s">
                          <div class="section-title mb-35">
                              <span class="sub-title style-two mb-15">{{ucwords(@$accordian2_elements[0]->subheading)}}</span>
                              <h2> {{ucwords(@$accordian2_elements[0]->heading)}}</h2>
                          </div>
                      </div>
                      <div class="col-lg-4 text-lg-end wow fadeInUp delay-0-4s">
                        @if(@$accordian2_elements[0]->button_link)
                          <a href="{{@$accordian2_elements[0]->button_link}}" class="theme-btn style-three mb-55 faq-button">{{ucwords(@$accordian2_elements[0]->button)}}<i class="fas fa-angle-double-right"></i></a>
                          @endif
                      </div>
                  </div>
                  <div class="accordion style-two" id="faq-accordion">
                      <div class="row">
                      @foreach($accordian2_elements->chunk(1) as $index => $accordian2_element)

                          <div class="col-lg-6 rmb-20 wow fadeInUp  @if($loop->first) delay-0-2s @else delay-0-4s @endif">

                              <div class="accordion-item">
                                  <h5 class="accordion-header">
                                      <button <?php if($accordian2_element[$index]->list_description !== null){ ?>
                                              class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" <?php }else{ ?>  style="background: transparent;"   <?php }?>   >
                                      {{@$accordian2_element[$index]->list_header}}
                                      </button>
                                  </h5>
                                  @if($accordian2_element[$index]->list_description !== null)
                                  <div id="collapse{{$index}}" class="accordion-collapse collapse @if($index == '0') show @endif" data-bs-parent="#faq-accordion">
                                      <div class="accordion-body">
                                          <p class="win-justify">{!! @$accordian2_element[$index]->list_description !!}</p>
                                      </div>
                                  </div>
                                  @endif
                              </div>

                          </div>
                      @endforeach

                      </div>
                  </div>
              </div>
          </section>
          <!-- FAQs Page Area end -->
        @endif

        @if($value == "small_box_description")

          <!-- Small Box description start -->
          <!-- <section class="freature-area-six "> -->
          <section class="pt-100 pb-100">
              <div class="container">
                  <div class="feature-six-inner bgs-cover bgc-primary" style="background-image: url({{asset('/assets/frontend/images/background/freature-bg-line.png')}});">
                      <div class="row">
                          @for ($i = 1; $i <=@$process_num; $i++)

                              <div class="col-lg-6">
                                  <div class="feature-item-three wow @if($i=='2') color-two delay-0-5s @elseif($i=='3') color-three delay-0-4s @elseif($i=='4')  color-four delay-0-6s @else delay-0-3s @endif fadeInRight ">
                                     <img src="<?php if(@$process_elements[$i-1]->list_image){?>{{asset('/images/section_elements/list_1/'.@$process_elements[$i-1]->list_image)}}<?php }?>"  alt="{{ucwords(@$process_elements[$i-1]->list_header)}}"/>
                                      <div class="content">
                                          <h4>{{ucwords(@$process_elements[$i-1]->list_header)}}</h4>
                                          <p class="win-justify">{{ucfirst(@$process_elements[$i-1]->list_description)}}</p>
                                      </div>
                                  </div>
                              </div>

                          @endfor

                      </div>
                  </div>
              </div>
          </section>
          <!-- Feature Six Area end -->
        @endif

        @if($value == "gallery_section")
          <!--- Gallery Section 1-->
          <section  class="pt-115 pb-100">
            <div id="gallery">
              <div class="container">
                <div id="image-gallery">
                  <div class="row">
                      @foreach(@$gallery_elements as $gallery_element)

                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                          <div class="img-wrapper">
                            <a href="{{asset('/images/section_elements/gallery/'.@$gallery_element->filename)}}">
                              <img src="{{asset('/images/section_elements/gallery/'.@$gallery_element->filename)}}" class="img-responsive"></a>
                            <div class="img-overlay">
                              <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </div>
                          </div>
                        </div>
                      @endforeach

                  </div><!-- End row -->
                </div><!-- End image gallery -->
              </div><!-- End container -->
            </div><!-- End container -->
          </section>
        @endif

        @if($value == "slider_list")
          <!-- Slider List Area start -->
          <section class="feedback-area bgc-lighter pt-100 pb-100 rel z-1">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-40 wow fadeInUp delay-0-2s">
                            <span class="sub-title style-two mb-20">{{ucwords(@$slider_list_elements[0]->description)}}</span>
                            <h2>{{ucwords(@$slider_list_elements[0]->heading)}}</h2>
                        </div>
                    </div>
                </div>
                <div class="feedback-active">
                    @for ($i = 1; $i <=@$list_3; $i++)

                      <div class="feedback-item wow fadeInUp delay-0-2s">

                          <h4>{{ucwords(@$slider_list_elements[$i-1]->list_header)}}</h4>
                          <p >{{ucfirst(Str::limit(@$slider_list_elements[$i-1]->list_description, 100,'...'))}}</p>
                          <div class="feedback-author">
                            <div class="content">
                              <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}" class="theme-btn mt-15" tabindex="0">Read More <i class="fas fa-angle-double-right"></i></a>
                            </div>
                          </div>

                      </div>
                    @endfor

                </div>
            </div>

        </section>
        <!-- Slider List end -->
        @endif

    @endforeach


@endsection
@section('js')
  <script src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>

@endsection
