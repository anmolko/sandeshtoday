@extends('backend.layouts.master')
@section('title', "Dashboard Settings")
@section('css')
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .hidden{
            display:none!important;
        }
        .dropdown-item{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="container-fluid" style="position:relative;">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{(@$settings->favicon!==null) ? asset('/images/settings/'.@$settings->favicon) : asset('assets/backend/images/canosoft-favicon.png')}}" alt="" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">
                                                        {{(@$setting_data !== null && @$setting_data->website_name !== "") ? $setting_data->website_name :"Sandesh Today " }}
                                                        - Dashboard Settings</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-smartphone-line align-bottom me-1"></i>
                                                            {{ (@$setting_data !== null && $setting_data->phone !== null) ? $setting_data->phone:"Number not set." }}
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>
                                                            <i class="ri-mail-send-line align-bottom me-1"></i>
                                                            <span class="fw-medium">
                                                                {{ (@$setting_data !== null && $setting_data->email !== null) ? $setting_data->email:"sample@email.com" }}
                                                            </span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>
                                                            <i class="ri-building-line align-bottom me-1"></i>
                                                            <span class="fw-medium">
                                                                {{ (@$setting_data !== null && $setting_data->address !== null) ? $setting_data->address:"Putalisadak, Kathmandu" }}
                                                            </span>
                                                        </div>
{{--                                                        <div class="vr"></div>--}}
{{--                                                        <div class="badge rounded-pill bg-info fs-12">New</div>--}}
{{--                                                        <div class="badge rounded-pill bg-danger fs-12">High</div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto" style="    margin-top: 1rem;">
                                        <div class="hstack gap-1 flex-wrap">
                                            <div class="d-sm-flex align-items-center justify-content-between">
{{--                                                <h4 class="mb-sm-0">Create Product</h4>--}}

                                                <div class="page-title-right">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                                        <li class="breadcrumb-item active">{{str_replace('-',' ',ucwords(Request::segment(2)))}}</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview"
                                           role="tab">
                                            General
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#aboutus-overview"
                                           role="tab">
                                            About us
                                        </a>
                                    </li>
                                    @if($settings !== null)
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#privacy-overview"
                                               role="tab">
                                                Privacy Policy
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#terms-overview"
                                               role="tab">
                                                Terms of service
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            @if($settings !== null)
                                {!! Form::open(['url'=>route('settings.update', @$settings->id),'id'=>'settings-info-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                            @else
                                {!! Form::open(['route' => 'settings.store','method'=>'post','class'=>'needs-validation','id'=>'settings-info-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                            @endif
                                <div class="row  mb-4">
                                    <div class="col-lg-8">
                                        <form>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="website-name-input">Website name</label>
                                                        <input type="text" class="form-control" id="website-name-input" name="website_name" value="{{@$settings->website_name}}"
                                                               placeholder="Enter website name" required>
                                                    </div>
                                                    <div class="position-relative">
                                                        <label>Website Summary</label>
                                                        <textarea class="form-control" id="ckeditor-classic" name="website_description" placeholder="Enter website description" rows="3" required>{{@$settings->website_description}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the website summary.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Related Images</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <h5 class="fs-14 mb-1">Main Logo</h5>
                                                        @if(!empty($settings->logo))
                                                            <img src="{{asset('images/settings/'.@$settings->logo)}}" class="img-thumbnail" width="300" alt="One Slide">
                                                        @endif
                                                        <p class="text-muted">Add the logo for frontend and backend display.</p>
                                                        <input class="form-control" name="logo" id="main-logo-input" type="file" accept="image/png, image/jpeg">
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="fs-14 mb-1">White Logo</h5>
                                                        @if(!empty($settings->logo_white))
                                                            <img src="{{asset('images/settings/'.@$settings->logo_white)}}" class="img-thumbnail" width="300" alt="Two Slide">
                                                        @endif
                                                        <p class="text-muted">Add the white logo for frontend display.</p>

                                                        <input class="form-control" name="logo_white" id="white-logo-input" type="file" accept="image/png, image/jpeg">
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="fs-14 mb-1">Favicon</h5>
                                                        @if(!empty($settings->favicon))
                                                            <img src="{{asset('images/settings/'.@$settings->favicon)}}" class="img-thumbnail" width="50" alt="Three Slide">
                                                        @endif
                                                        <p class="text-muted">Add the favicon(32 * 32px).</p>

                                                        <input class="form-control" name="favicon" id="favicon-logo-input" type="file" accept="image/png, image/jpeg">
                                                    </div>
                                                    <div class="mb-4">
                                                        <h5 class="fs-14 mb-1">Property Advertisement Logo</h5>
                                                        @if(!empty($settings->property_ad_logo))
                                                            <img src="{{asset('images/settings/'.@$settings->property_ad_logo)}}" class="img-thumbnail" width="300" alt="Three Slide">
                                                        @endif
                                                        <p class="text-muted">Add the Property Advertisement.</p>

                                                        <input class="form-control" name="property_ad_logo" id="favicon-logo-input" type="file" accept="image/png, image/jpeg">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab" href="#additional-info-tab"
                                                               role="tab">
                                                                Additional Details
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#google-info-tab"
                                                               role="tab">
                                                                Google Info
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab" href="#add-website-metadata"
                                                               role="tab">
                                                                Meta Data
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- end card header -->
                                                <div class="card-body">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="additional-info-tab" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="broadcasting_registration">Broadcasting Reg. number (??????????????? ??????????????? ??????????????? ??????)</label>
                                                                            <input type="text" class="form-control" name="broadcasting_registration" id="broadcasting_registration"
                                                                                   value="{{@$settings->broadcasting_registration}}">
                                                                        </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="company_registration">Company Reg. number (?????????????????? ??????????????? ??????)</label>
                                                                        <input type="text" class="form-control" name="company_registration" id="company_registration"
                                                                               value="{{@$settings->company_registration}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="chairman">Chairman (?????????????????????)</label>
                                                                            <input type="text" class="form-control" name="chairman" id="chairman"
                                                                                   value="{{@$settings->chairman}}">
                                                                        </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="operator">Operator (?????????????????????)</label>
                                                                        <input type="text" class="form-control" name="operator" id="operator"
                                                                               value="{{@$settings->operator}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="editor">Editor (?????????????????????)</label>
                                                                            <input type="text" class="form-control" name="editor" id="editor"
                                                                                   value="{{@$settings->editor}}">
                                                                        </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="news_email">News email</label>
                                                                        <input type="text" class="form-control" name="news_email" id="news_email"
                                                                               value="{{@$settings->news_email}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label" for="ad_email">Advertisement email </label>
                                                                            <input type="text" class="form-control" name="ad_email" id="ad_email"
                                                                                   value="{{@$settings->ad_email}}">
                                                                        </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="ad_number">Advertisement Number</label>
                                                                        <input type="text" class="form-control" name="ad_number" id="ad_number"
                                                                               value="{{@$settings->ad_number}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                        </div>

                                                        <div class="tab-pane" id="google-info-tab" role="tabpanel">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="analytics-code-input">Analytics Code</label>
                                                                <input type="text" class="form-control" name="google_analytics" id="analytics-code-input"
                                                                       value="{{@$settings->google_analytics}}"
                                                                       placeholder="Enter google analytics code here">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="google-map-input">Map URL</label>
                                                                        <textarea class="form-control" name="google_map" id="google-map-input" placeholder="Enter company map location" rows="3">{{@$settings->google_map}}</textarea>

                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="meta-pixel-inputmeta-pixel-input">Meta Pixel</label>
                                                                        <textarea class="form-control" name="meta_pixel" id="meta-pixel-input" placeholder="Enter meta pixel" rows="3">{{@$settings->meta_pixel}}</textarea>

                                                                    </div>
                                                                </div>
                                                                <!-- end col -->
                                                            </div>
                                                            <!-- end row -->
                                                        </div>
                                                        <!-- end tab-pane -->

                                                        <div class="tab-pane" id="add-website-metadata" role="tabpanel">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="meta-title-input">Meta title</label>
                                                                        <input type="text" class="form-control" placeholder="Enter meta title" value="{{@$settings->meta_title}}" name="meta_title" id="meta-title-input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- end row -->
                                                            <div>
                                                                    <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                                                    <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter website tags" type="text" name="meta_tags"
                                                                           value="{{@$settings->meta_tags}}" />
                                                            </div>
                                                            <div>
                                                                <label class="form-label" for="meta-description-input">Meta Description</label>
                                                                <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description" name="meta_description" rows="3">{{@$settings->meta_description}}</textarea>
                                                            </div>
                                                        </div>
                                                        <!-- end tab pane -->
                                                    </div>
                                                    <!-- end tab content -->
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">{{($settings !== null) ? "Update Settings":"Save Settings"}}</button>
                                            </div>
                                        </form>


                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-4">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="email-number-input" class="form-label">Email Address</label>
                                                        <input type="text" class="form-control" id="email-number-input" name="email"
                                                               value="{{@$settings->email}}"
                                                               placeholder="Enter email address" required/>
                                                    </div>

                                                    <div>
                                                        <label for="address-number-input" class="form-label">Company Address</label>
                                                        <input type="text" class="form-control" id="address-number-input" name="address"
                                                               value="{{@$settings->address}}"
                                                               placeholder="Enter current location" />
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Contacts</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="phone-number-input" class="form-label">Office number</label>
                                                        <input type="text" class="form-control" id="phone-number-input" name="phone"
                                                               value="{{@$settings->phone}}"
                                                               placeholder="Enter phone number" />
                                                    </div>

                                                    <div>
                                                        <label for="mobile-number-input" class="form-label">News number</label>
                                                        <input type="text" class="form-control" id="mobile-number-input" name="mobile"
                                                               value="{{@$settings->mobile}}"
                                                               placeholder="Enter mobile number" />
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Social Number</h5>
                                                </div>
                                                <!-- end card body -->
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label for="viber-number-input" class="form-label">Viber number</label>
                                                        <input type="text" class="form-control" id="viber-number-input" name="viber"
                                                               value="{{@$settings->viber}}"
                                                               placeholder="Enter viber number" />
                                                    </div>

                                                    <div>
                                                        <label for="whatsapp-number-input" class="form-label">Whatsapp number</label>
                                                        <input type="text" class="form-control" id="whatsapp-number-input" name="whatsapp"
                                                               value="{{@$settings->whatsapp}}"
                                                               placeholder="Enter whatsapp number" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Social Links</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3 d-flex">
                                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                    <span class="avatar-title rounded-circle fs-16 bg-gradient text-light">
                                                        <i class="ri-facebook-fill"></i>
                                                    </span>
                                                        </div>
                                                        <input type="url" class="form-control" id="fbUsername" name="facebook" value="{{@$settings->facebook}}" placeholder="Enter facebook profile link"/>
                                                    </div>
                                                    <div class="mb-3 d-flex">
                                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                    <span class="avatar-title rounded-circle fs-16 bg-youtube">
                                                        <i class="ri-youtube-fill"></i>
                                                    </span>
                                                        </div>
                                                        <input type="url" class="form-control" id="youtubeUsername" name="youtube" value="{{@$settings->youtube}}"  placeholder="Enter youtube link">
                                                    </div>
                                                    <div class="mb-3 d-flex">
                                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                    <span class="avatar-title rounded-circle fs-16 bg-instagram">
                                                        <i class="ri-instagram-fill"></i>
                                                    </span>
                                                        </div>
                                                        <input type="url" class="form-control" id="instaUsername" name="instagram" value="{{@$settings->instagram}}"  placeholder="Enter instagram profile link">
                                                    </div>
                                                    <div class="mb-3 d-flex">
                                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                            <span class="avatar-title rounded-circle fs-16 bg-twitter">
                                                                <i class="ri-twitter-fill"></i>
                                                            </span>
                                                        </div>
                                                        <input type="url" class="form-control" id="linkedinUsername" name="linkedin" value="{{@$settings->linkedin}}"  placeholder="Enter linkedin profile link">
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="avatar-xs d-block flex-shrink-0 me-3">
                                                            <span class="avatar-title rounded-circle fs-16 bg-tiktok">
                                                                <i class="bx bxl-tiktok"></i>
                                                            </span>
                                                        </div>
                                                        <input type="url" class="form-control" id="tiktokUsername" name="ticktock" value="{{@$settings->ticktock}}"  placeholder="Enter tiktok profile link">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        </div>
                        @if($settings !== null)

                            <div class="tab-pane fade" id="privacy-overview" role="tabpanel">

                                {!! Form::open(['url'=>route('settings.privacy', @$settings->id),'id'=>'status-terms-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                <div class="row  mb-4">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="position-relative">
                                                    <label>Website Privacy Policy</label>
                                                    <textarea class="form-control" id="ckeditor-classic-privacy" name="privacy_policy" placeholder="Enter website privacy policy" rows="3" required>{{@$settings->privacy_policy}}</textarea>
                                                    <div class="invalid-tooltip">
                                                        Please enter the privacy policy.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">{{(@$settings->privacy_policy !== null) ? "Update Policy":"Save Policy"}}</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}


                            </div>

                            <div class="tab-pane fade" id="terms-overview" role="tabpanel">

                                {!! Form::open(['url'=>route('settings.terms', @$settings->id),'id'=>'status-terms-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                <div class="row  mb-4">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="position-relative">
                                                    <label>Website Terms of service</label>
                                                    <textarea class="form-control" id="ckeditor-classic-terms" name="terms_conditions" placeholder="Enter website terms of service" rows="3" required>{{@$settings->terms_conditions}}</textarea>
                                                    <div class="invalid-tooltip">
                                                        Please enter the website terms of service
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">{{(@$settings->terms_conditions !== null) ? "Update Policy":"Save Policy"}}</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}


                            </div>

                        @endif

                        <div class="tab-pane fade" id="aboutus-overview" role="tabpanel">

                            @if($homesettings !== null)
                                {!! Form::open(['url'=>route('homepage.update', @$homesettings->id),'id'=>'homesettings-info-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                            @else
                                {!! Form::open(['route' => 'homepage.store','method'=>'post','class'=>'needs-validation','id'=>'homesettings-info-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                            @endif
                            <div class="row  mb-4">
                                    <div class="col-lg-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="welcome-heading-input">Heading <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="welcome-heading-input" name="welcome_heading" value="{{@$homesettings->welcome_heading}}"
                                                           placeholder="Enter  heading" required>
                                                </div>
                                                <div class="position-relative mb-3">
                                                    <label> Description <span class="text-muted text-danger">*</span></label>
                                                    <textarea class="form-control" maxlength="1215" name="welcome_description" id="welcome_description" placeholder="Enter welcome description" rows="8" required>{{@$homesettings->welcome_description}}</textarea>
                                                    <div class="invalid-tooltip">
                                                        Please enter the  description.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card -->



                                        <!-- end card -->
                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">{{($homesettings !== null) ? "Update About us":"Save About us"}}</button>
                                        </div>



                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-4">
                                    <div class="sticky-side-div">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">Other Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <img  id="current-img"  src="{{ (@$homesettings->welcome_image !== null) ? asset('images/home/welcome/'.@$homesettings->welcome_image) :  asset('images/default-image.jpg') }}" class="position-relative img-fluid img-thumbnail welcome-feature-image" >
                                                    <input  type="file" accept="image/png, image/jpeg" hidden
                                                            id="profile-foreground-img-file-input" onchange="loadFile(event)" name="welcome_image"
                                                            class="profile-foreground-img-file-input" >

                                                    <figcaption class="figure-caption">*use image minimum of 420 x 510px </figcaption>
                                                    <div class="invalid-feedback" >
                                                        Please select a image.
                                                    </div>
                                                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                                        <i class="ri-image-edit-line align-bottom me-1"></i> Add  Image
                                                    </label>
                                                </div>
{{--                                                <div class="mb-3">--}}
{{--                                                    <label for="choices-publish-status-input" class="form-label">Image Alignment</label>--}}

{{--                                                    <select class="form-select" id="choices-publish-status-input" name="welcome_side_image" data-choices data-choices-search-false>--}}
{{--                                                        <option value="left" @if(@$homesettings->welcome_side_image == "left") selected @endif>Left</option>--}}
{{--                                                        <option value="right" @if(@$homesettings->welcome_side_image == "right") selected @endif>Right</option>--}}
{{--                                                        <option value="none" @if(@$homesettings->welcome_side_image == "none") selected @endif>None</option>--}}

{{--                                                    </select>--}}
{{--                                                </div>--}}
                                            </div>
                                            <!-- end card body -->
                                        </div>


                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}


                        </div>


                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>



@endsection

@section('js')
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>

    <script src="{{asset('assets/backend/js/pages/project-overview.init.js')}}"></script>

    <script src="{{asset('assets/backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

    <script src="{{asset('assets/backend/js/pages/ecommerce-product-create.init.js')}}"></script>

    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            createEditor('ckeditor-classic-privacy');
            createEditor('ckeditor-classic-terms');
            createEditor('welcome_description');
        });
        function createEditor(id){
            ClassicEditor.create(document.querySelector("#"+id))
                .then( editor => {
                    window.editor = editor;
                    editor.ui.view.editable.element.style.height="200px";
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + id).text(editor.getData());
                    } );
                } )
                .catch(function(e){console.error(e)});
        }
        var loadFile = function(event) {
            var image = document.getElementById('profile-foreground-img-file-input');
            var replacement = document.getElementById('current-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


@endsection
