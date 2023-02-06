@extends('backend.layouts.master')
@section('title', "Home Setting")
@section('css')
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <style>
        .icons-select option {
            text-transform: capitalize;
        }

        .icons-select {
            font-family: 'FontAwesome';
            font-weight: 500;
        }

        .hidden{
            display:none!important;
        }
        .dropdown-item{
            cursor: pointer;
        }

        .feature-image-button{
            position: absolute;
            top: 25%;
        }

        .profile-foreground-img-file-input {
            display: none;
        }

        label.profile-photo-edit.btn.btn-light.feature-side-image-button {
            position: absolute;
            bottom: 25%;
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

                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">

                                                         Home Page Settings</h4>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto" style="    margin-top: 1rem;">
                                        <div class="hstack gap-1 flex-wrap">
                                            <div class="d-sm-flex align-items-center justify-content-between">

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
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#welcome-tab"
                                           role="tab">
                                            Welcome Section                                        </a>
                                    </li>
                                    @if($homesettings !== null)
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#simple-core-action"
                                               role="tab">
                                                Core Values
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#simple-missionvision-action"
                                               role="tab">
                                                Mission Vision Values
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#simple-call-action"
                                               role="tab">
                                                Call Action
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#simple-recruitment-action"
                                               role="tab">
                                                Recruitment Process
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#status-overview"
                                               role="tab">
                                                General Grievance
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#simple-what-makes-us-action"
                                               role="tab">
                                                What makes us different?
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#simple-why-us-action"
                                               role="tab">
                                                Why us?
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
                        <div class="tab-pane fade show active" id="welcome-tab" role="tabpanel">
                            @if($homesettings !== null)
                                {!! Form::open(['url'=>route('homepage.update', @$homesettings->id),'id'=>'homesettings-info-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                            @else
                                {!! Form::open(['route' => 'homepage.store','method'=>'post','class'=>'needs-validation','id'=>'homesettings-info-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                            @endif
                                <div class="row  mb-4">
                                    <div class="col-lg-8">
                                            <figure class="figure">
                                                <img src="{{asset('images/welcome.png')}}" class="figure-img img-fluid rounded" alt="...">
                                                <figcaption class="figure-caption">Output Sample.</figcaption>
                                            </figure>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="welcome-heading-input">Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="welcome-heading-input" name="welcome_heading" value="{{@$homesettings->welcome_heading}}"
                                                               placeholder="Enter  heading" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="welcome-subheading-input">Sub Heading </label>
                                                        <input type="text" class="form-control" id="welcome-subheading-input" name="welcome_subheading" value="{{@$homesettings->welcome_subheading}}"
                                                               placeholder="Enter  subheading">
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label> Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="1215" name="welcome_description" placeholder="Enter welcome description" rows="8" required>{{@$homesettings->welcome_description}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Button Text </label>
                                                        <input type="text" maxlength="20" class="form-control" value="{{@$homesettings->welcome_button}}" name="welcome_button">
                                                        <div class="invalid-feedback">
                                                            Please enter the button text.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Button Link </label>
                                                        <input type="text" class="form-control" value="{{@$homesettings->welcome_link}}" name="welcome_link">
                                                        <div class="invalid-feedback">
                                                            Please enter the button link.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->



                                            <!-- end card -->
                                            <div class="text-end mb-3">
                                                <button type="submit" class="btn btn-success w-sm">{{($homesettings !== null) ? "Update Home Settings":"Save Home Settings"}}</button>
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
                                                            id="profile-foreground-img-file-input" onchange="loadFile(event)" name="welcome_image" {{ (@$homesettings->welcome_image !== null) ? '' :  'required' }}
                                                        class="profile-foreground-img-file-input" >

                                                        <figcaption class="figure-caption">*use image minimum of 450 x 595px </figcaption>
                                                        <div class="invalid-feedback" >
                                                                Please select a image.
                                                            </div>
                                                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                                            <i class="ri-image-edit-line align-bottom me-1"></i> Add  Image
                                                        </label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="choices-publish-status-input" class="form-label">Image Alignment</label>

                                                        <select class="form-select" id="choices-publish-status-input" name="welcome_side_image" data-choices data-choices-search-false>
                                                            <option value="left" @if(@$homesettings->welcome_side_image == "left") selected @endif>Left</option>
                                                            <option value="right" @if(@$homesettings->welcome_side_image == "right") selected @endif>Right</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        </div>
                        @if($homesettings !== null)

                            <div class="tab-pane fade" id="simple-core-action" role="tabpanel">

                                {!! Form::open(['url'=>route('homepage.corevalues', @$homesettings->id),'id'=>'homesettings-coreval-header-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                <div class="row  mb-2">
                                    <div class="col-lg-12">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Heading Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <figure class="figure">
                                                        <img src="{{asset('images/core_values.png')}}" class="figure-img img-fluid rounded" alt="...">
                                                        <figcaption class="figure-caption">Output Sample.</figcaption>
                                                    </figure>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label" for="core_main_heading-input">Main Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="18" id="core_main_heading-input" name="core_main_heading" value="{{@$homesettings->core_main_heading}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label"> Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="125" name="core_main_description" placeholder="Enter core value main description" rows="8" required>{{@$homesettings->core_main_description}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="row  mb-2">
                                    <div class="col-lg-6">
                                        <div class="nosticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0"> Core 1 Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label" for="core_main_heading1-input">Core Heading 1 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="18" id="core_main_heading1-input" name="core_heading1" value="{{@$homesettings->core_heading1}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Description 1 <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="215" name="core_description1" placeholder="Enter core description" rows="4" required>{{@$homesettings->core_description1}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                            <div class="nosticky-side-div">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0"> Core 2 Details</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="position-relative mb-3">
                                                            <label class="form-label">Core Heading 2 <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="18" name="core_heading2" value="{{@$homesettings->core_heading2}}"
                                                                   placeholder="Enter heading" required>
                                                            <div class="invalid-feedback">
                                                                Please enter the heading.
                                                            </div>
                                                        </div>
                                                        <div class="position-relative mb-3">
                                                            <label class="form-label">Core Description 2 <span class="text-muted text-danger">*</span></label>
                                                            <textarea class="form-control" maxlength="215" name="core_description2" placeholder="Enter core value description" rows="4" required>{{@$homesettings->core_description2}}</textarea>
                                                            <div class="invalid-tooltip">
                                                                Please enter the  description.
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- end card body -->
                                                </div>


                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                            <div class="nosticky-side-div">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0"> Core 3 Details</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="position-relative mb-3">
                                                            <label class="form-label" >Core Heading 2 <span class="text-muted text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="18"  name="core_heading3" value="{{@$homesettings->core_heading3}}"
                                                                   placeholder="Enter heading" required>
                                                            <div class="invalid-feedback">
                                                                Please enter the heading.
                                                            </div>
                                                        </div>
                                                        <div class="position-relative mb-3">
                                                            <label class="form-label">Core Description 3 <span class="text-muted text-danger">*</span></label>
                                                            <textarea class="form-control" maxlength="215" name="core_description3" placeholder="Enter core description" rows="4" required>{{@$homesettings->core_description3}}</textarea>
                                                            <div class="invalid-tooltip">
                                                                Please enter the  description.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- end card body -->
                                                </div>


                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="nostickys-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0"> Core 4 Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Heading 4 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="18" name="core_heading4" value="{{@$homesettings->core_heading4}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Description 4 <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="215" name="core_description4" placeholder="Enter core description" rows="4" required>{{@$homesettings->core_description4}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="nostickys-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0"> Core 5 Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Heading 5 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="18" name="core_heading5" value="{{@$homesettings->core_heading5}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Description 5 <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="215" name="core_description5" placeholder="Enter core description" rows="4" required>{{@$homesettings->core_description5}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="nostickys-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0"> Core 6 Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Heading 6 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="18" name="core_heading6" value="{{@$homesettings->core_heading6}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Core Description 6 <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="215" name="core_description6" placeholder="Enter core description" rows="4" required>{{@$homesettings->core_description6}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="text-center mb-3 mt-2">
                                        <button type="submit" class="btn btn-success w-sm">Update Section</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                            </div>

                            <div class="tab-pane fade" id="simple-missionvision-action" role="tabpanel">

                                {!! Form::open(['url'=>route('homepage.mv', @$homesettings->id),'id'=>'homesettings-mv-header-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                <div class="row  mb-2">
                                    <div class="col-lg-8">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Main Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <figure class="figure">
                                                        <img src="{{asset('images/mission.png')}}" class="figure-img img-fluid rounded" alt="...">
                                                        <figcaption class="figure-caption">Output Sample.</figcaption>
                                                    </figure>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="50" name="mv_heading" value="{{@$homesettings->mv_heading}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">SubHeading</label>
                                                        <input type="text" class="form-control" maxlength="50" name="mv_subheading" value="{{@$homesettings->mv_subheading}}"
                                                               placeholder="Enter heading">
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Image Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <img  id="current-mv-img"  src="{{ (@$homesettings->mv_image !== null) ? asset('images/home/welcome/'.@$homesettings->mv_image) :  asset('images/default-image.jpg') }}" class="position-relative img-fluid img-thumbnail welcome-feature-image" >
                                                        <input  type="file" accept="image/png, image/jpeg" hidden
                                                                id="mv-upload-image" onchange="loadbasicFile('mv-upload-image','current-mv-img',event)" name="mv_image" {{ (@$homesettings->mv_image !== null) ? '' :  'required' }}
                                                                class="profile-foreground-img-file-input" >

                                                        <figcaption class="figure-caption">*use image minimum of 450 x 595px </figcaption>
                                                        <div class="invalid-feedback" >
                                                            Please select a image.
                                                        </div>
                                                        <label for="mv-upload-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                            <i class="ri-image-edit-line align-bottom me-1"></i> Add  Image
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="row  mb-2">
                                    <div class="col-lg-12">
                                        <div class="nosticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0"> Mission, Vision, Goal Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Mission Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="230" name="mission" placeholder="Enter mission description" rows="4" required>{{@$homesettings->mission}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Vision Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="230" name="vision" placeholder="Enter vision description" rows="4" required>{{@$homesettings->vision}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Value Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="230" name="value" placeholder="Enter value description" rows="4" required>{{@$homesettings->value}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="text-center mb-3 mt-2">
                                        <button type="submit" class="btn btn-success w-sm">Update Section</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                            </div>

                            <div class="tab-pane fade" id="simple-what-makes-us-action" role="tabpanel">

                                {!! Form::open(['url'=>route('homepage.different', @$homesettings->id),'id'=>'homesettings-whats-header-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                <div class="row  mb-2">
                                    <div class="col-lg-12">
                                        <div class="ssticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Main Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <figure class="figure">
                                                        <img src="{{asset('images/whatdifferent.png')}}" class="figure-img img-fluid rounded" alt="...">
                                                        <figcaption class="figure-caption">Output Sample.</figcaption>
                                                    </figure>
                                                </div>


                                                <!-- end card body -->
                                            </div>

                                            <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-success" id="accordionBordered5">

                                                <div class="accordion-item">
                                                        <h2 class="accordion-header" id="slider-lists-1">
                                                            <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapsedd_1" aria-expanded="true" aria-controls="accor_borderedExamplecollapsedd_1">
                                                                Box 1 details
                                                            </button>
                                                        </h2>
                                                        <div id="accor_borderedExamplecollapsedd_1" class="accordion-collapse collapse show" aria-labelledby="slider-lists-1" data-bs-parent="#accordionBordered5">
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-md-10">

                                                                        <div class="form-group mb-3">
                                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                            <input type="text" class="form-control" name="what_heading1" value="{{@$homesettings->what_heading1}}"  required>
                                                                            <div class="invalid-feedback">
                                                                                Please enter the heading.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div>
                                                                            <img id="current-sliderlist-1-img" src="<?php if(!empty(@$homesettings->what_image1)){ echo '/images/home/welcome/'.@$homesettings->what_image1; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                            <input  type="file" accept="image/png, image/jpeg" hidden
                                                                                    id="sliderlist-1-image" onchange="loadbasicFile('sliderlist-1-image','current-sliderlist-1-img',event)" name="what_image1" {{(@$homesettings->what_image1 !== null) ? "":"required" }}
                                                                                    class="profile-foreground-img-file-input" >

                                                                            <figcaption class="figure-caption">Image for current box. (SIZE: 60px X 60px)</figcaption>
                                                                            <div class="invalid-feedback" >
                                                                                Please select a image.
                                                                            </div>
                                                                            <label for="sliderlist-1-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                                <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="slider-lists-2">
                                                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapsedd_2" aria-expanded="false" aria-controls="accor_borderedExamplecollapsedd_2">
                                                            Box 2 details
                                                        </button>
                                                    </h2>
                                                    <div id="accor_borderedExamplecollapsedd_2" class="accordion-collapse collapse" aria-labelledby="slider-lists-2" data-bs-parent="#accordionBordered5">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-10">

                                                                    <div class="form-group mb-3">
                                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="what_heading2" value="{{@$homesettings->what_heading2}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the heading.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div>
                                                                        <img id="current-sliderlist-2-img" src="<?php if(!empty(@$homesettings->what_image2)){ echo '/images/home/welcome/'.@$homesettings->what_image2; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                        <input  type="file" accept="image/png, image/jpeg" hidden
                                                                                id="sliderlist-2-image" onchange="loadbasicFile('sliderlist-2-image','current-sliderlist-2-img',event)" name="what_image2" {{(@$homesettings->what_image2 !== null) ? "":"required" }}
                                                                                class="profile-foreground-img-file-input" >

                                                                        <figcaption class="figure-caption"> Image for current box. (SIZE: 60px X 60px)</figcaption>
                                                                        <div class="invalid-feedback" >
                                                                            Please select a image.
                                                                        </div>
                                                                        <label for="sliderlist-2-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                            <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="slider-lists-3">
                                                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapsedd_3" aria-expanded="flase" aria-controls="accor_borderedExamplecollapsedd_3">
                                                            Box 3 details
                                                        </button>
                                                    </h2>
                                                    <div id="accor_borderedExamplecollapsedd_3" class="accordion-collapse collapse" aria-labelledby="slider-lists-3" data-bs-parent="#accordionBordered5">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-10">

                                                                    <div class="form-group mb-3">
                                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="what_heading3" value="{{@$homesettings->what_heading3}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the heading.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div>
                                                                        <img id="current-sliderlist-3-img" src="<?php if(!empty(@$homesettings->what_image3)){ echo '/images/home/welcome/'.@$homesettings->what_image3; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                        <input  type="file" accept="image/png, image/jpeg" hidden
                                                                                id="sliderlist-3-image" onchange="loadbasicFile('sliderlist-3-image','current-sliderlist-3-img',event)" name="what_image3" {{(@$homesettings->what_image3 !== null) ? "":"required" }}
                                                                                class="profile-foreground-img-file-input" >

                                                                        <figcaption class="figure-caption"> Image for current box. (SIZE: 60px X 60px)</figcaption>
                                                                        <div class="invalid-feedback" >
                                                                            Please select a image.
                                                                        </div>
                                                                        <label for="sliderlist-3-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                            <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="slider-lists-4">
                                                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapsedd_4" aria-expanded="false" aria-controls="accor_borderedExamplecollapsedd_4">
                                                            Box 4 details
                                                        </button>
                                                    </h2>
                                                    <div id="accor_borderedExamplecollapsedd_4" class="accordion-collapse collapse" aria-labelledby="slider-lists-4" data-bs-parent="#accordionBordered5">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-10">

                                                                    <div class="form-group mb-3">
                                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="what_heading4" value="{{@$homesettings->what_heading4}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the heading.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div>
                                                                        <img id="current-sliderlist-4-img" src="<?php if(!empty(@$homesettings->what_image4)){ echo '/images/home/welcome/'.@$homesettings->what_image4; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                        <input  type="file" accept="image/png, image/jpeg" hidden
                                                                                id="sliderlist-4-image" onchange="loadbasicFile('sliderlist-4-image','current-sliderlist-4-img',event)" name="what_image4" {{(@$homesettings->what_image4 !== null) ? "":"required" }}
                                                                                class="profile-foreground-img-file-input" >

                                                                        <figcaption class="figure-caption"> Image for current box. (SIZE: 60px X 60px)</figcaption>
                                                                        <div class="invalid-feedback" >
                                                                            Please select a image.
                                                                        </div>
                                                                        <label for="sliderlist-4-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                            <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="slider-lists-5">
                                                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapsedd_5" aria-expanded="false" aria-controls="accor_borderedExamplecollapsedd_5">
                                                            Box 5 details
                                                        </button>
                                                    </h2>
                                                    <div id="accor_borderedExamplecollapsedd_5" class="accordion-collapse collapse" aria-labelledby="slider-lists-5" data-bs-parent="#accordionBordered5">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-md-10">

                                                                    <div class="form-group mb-3">
                                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="what_heading5" value="{{@$homesettings->what_heading5}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the heading.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div>
                                                                        <img id="current-sliderlist-5-img" src="<?php if(!empty(@$homesettings->what_image5)){ echo '/images/home/welcome/'.@$homesettings->what_image5; } else{  echo '/images/default-image.jpg'; } ?>" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                                        <input  type="file" accept="image/png, image/jpeg" hidden
                                                                                id="sliderlist-5-image" onchange="loadbasicFile('sliderlist-5-image','current-sliderlist-5-img',event)" name="what_image5" {{(@$homesettings->what_image5 !== null) ? "":"required" }}
                                                                                class="profile-foreground-img-file-input" >

                                                                        <figcaption class="figure-caption"> Image for current box. (SIZE: 60px X 60px)</figcaption>
                                                                        <div class="invalid-feedback" >
                                                                            Please select a image.
                                                                        </div>
                                                                        <label for="sliderlist-5-image" class="profile-photo-edit btn btn-light feature-image-button">
                                                                            <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3 mt-2">
                                        <button type="submit" class="btn btn-success w-sm">Update Section</button>
                                    </div>

                                </div>

                                {!! Form::close() !!}


                            </div>

                            <div class="tab-pane fade" id="simple-why-us-action" role="tabpanel">

                                {!! Form::open(['url'=>route('homepage.whyus', @$homesettings->id),'id'=>'homesettings-mv-header-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Main Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <figure class="figure">
                                                        <img src="{{asset('images/whyus.png')}}" class="figure-img img-fluid rounded" alt="...">
                                                        <figcaption class="figure-caption">Output Sample.</figcaption>
                                                    </figure>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="55" name="why_heading" value="{{@$homesettings->why_heading}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">SubHeading</label>
                                                        <input type="text" class="form-control" maxlength="20" name="why_subheading" value="{{@$homesettings->why_subheading}}"
                                                               placeholder="Enter subheading">
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>

                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Description <span class="text-muted text-danger">*</span></label>
                                                        <textarea class="form-control" maxlength="660" name="why_description" placeholder="Enter why us description" rows="4" required>{{@$homesettings->why_description}}</textarea>
                                                        <div class="invalid-tooltip">
                                                            Please enter the  description.
                                                        </div>
                                                    </div>

                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Button</label>
                                                        <input type="text" class="form-control" maxlength="50" name="why_button" value="{{@$homesettings->why_button}}"
                                                               placeholder="Enter button text">
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>

                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Button Link</label>
                                                        <input type="text" class="form-control" maxlength="50" name="why_link" value="{{@$homesettings->why_link}}"
                                                               placeholder="Enter button link">
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Site Statistics</h5>
                                                </div>
                                                <div class="card-body">

                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Project completed <span class="text-muted text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="project_completed" value="{{@$homesettings->project_completed}}"
                                                               placeholder="Enter project completed number">
                                                        <div class="invalid-feedback">
                                                            Please enter the project completed number.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Happy Clients <span class="text-muted text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="happy_clients" value="{{@$homesettings->happy_clients}}"
                                                               placeholder="Enter happy clients number">
                                                        <div class="invalid-feedback">
                                                            Please enter the happy clients number.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Visa Approved <span class="text-muted text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="visa_approved" value="{{@$homesettings->visa_approved}}"
                                                               placeholder="Enter visa approved number">
                                                        <div class="invalid-feedback">
                                                            Please enter the visa approved number.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label">Success Stories <span class="text-muted text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="success_stories" value="{{@$homesettings->success_stories}}"
                                                               placeholder="Enter success stories number">
                                                        <div class="invalid-feedback">
                                                            Please enter the success stories number.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mb-3 mt-2">
                                        <button type="submit" class="btn btn-success w-sm">Update Section</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                            </div>

                            <div class="tab-pane fade" id="simple-call-action" role="tabpanel">

                                {!! Form::open(['url'=>route('homepage.action', @$homesettings->id),'id'=>'homesettings-simple-header-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                                <div class="row  mb-4">
                                    <div class="col-lg-12">
                                        <div class="sticky-side-div">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Main Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <figure class="figure">
                                                        <img src="{{asset('images/home_action.png')}}" class="figure-img img-fluid rounded" alt="...">
                                                        <figcaption class="figure-caption">Output Sample.</figcaption>
                                                    </figure>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label" for="direction-heading-input">Heading 1 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="35" id="direction-heading-input" name="action_heading" value="{{@$homesettings->action_heading}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label" for="direction-heading-inputs" >Link 1 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="direction-heading-inputs" name="action_link" value="{{@$homesettings->action_link}}"
                                                               placeholder="Enter button link" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the button link.
                                                        </div>
                                                    </div>

                                                    <hr/>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label" for="direction-heading-input">Heading 2 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="35" id="direction-heading-input" name="action_heading2" value="{{@$homesettings->action_heading2}}"
                                                               placeholder="Enter heading" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="position-relative mb-3">
                                                        <label class="form-label" for="direction-heading-inputs">Link 2 <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="direction-heading-inputs" name="action_link2" value="{{@$homesettings->action_link2}}"
                                                               placeholder="Enter button link" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the button link.
                                                        </div>
                                                    </div>
                                                    <div class="text-end mb-3 mt-3">
                                                        <button type="submit" class="btn btn-success w-sm">Update Section</button>
                                                    </div>
                                                </div>

                                                <!-- end card body -->
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                            </div>

                            <div class="tab-pane fade" id="simple-recruitment-action" role="tabpanel">
                                @if(sizeof($recruitment) !== 0)
                                    {!! Form::open(['route' => 'recruitment.listUpdate','method'=>'post','class'=>'needs-validation','id'=>'accordion2-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @else
                                    {!! Form::open(['route' => 'recruitment.store','method'=>'post','class'=>'needs-validation','id'=>'icon-and-title-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @endif
                                <figure class="figure">
                                    <img src="{{asset('images/recruitment.png')}}" class="figure-img img-fluid rounded" alt="..." style="width: 100%">
                                    <figcaption class="figure-caption">Output Sample.</figcaption>
                                </figure>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Recruitment Process
                                                </h4>
                                            </div>

                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="heading[]" value="{{@$recruitment[0]->heading}}" required />
                                                    <div class="invalid-feedback">
                                                        Please enter the process heading.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Description <span class="text-muted text-danger">*</span></label>
                                                    <textarea class="form-control" rows="6" maxlength="920" name="description[]" required>{{@$recruitment[0]->description}}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter the description.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Link </label>
                                                    <input type="url" class="form-control" name="link[]" value="{{@$recruitment[0]->link}}" />
                                                    <div class="invalid-feedback">
                                                        Please enter the process link.
                                                    </div>
                                                </div>
                                                <input type="hidden" class="form-control" value="{{@$recruitment}}" name="recruitment_elements">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Process Details
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="multi-field-wrapper">

                                                    @if(count($recruitment)>0)
                                                        <div id="multi-fields">
                                                            @foreach($recruitment as $key=>$value)
                                                                <div class="multi-field custom-card" style="border-bottom: double #e3e3e3; margin-bottom: 1rem ">
                                                                    <label>Video Type </label>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-control shadow-none icons-select" name="icon[]" id="icon" required>
                                                                            <option value disabled readonly> Select Icons</option>
                                                                            <option value="address-book" {{($value->icon == 'address-book') ? "selected":""}}>&#xf2b9; Address book</option>
                                                                            <option value='address-book-o' {{($value->icon == 'address-book-o') ? "selected":""}}>&#xf2ba; Address book Light</option>
                                                                            <option value="address-card" {{($value->icon == 'address-card') ? "selected":""}}>&#xf2bb; Address card</option>
                                                                            <option value='address-card-o' {{($value->icon == 'address-card-o') ? "selected":""}}>&#xf2bc; Address Card Light</option>
                                                                            <option value='adjust' {{($value->icon == 'adjust') ? "selected":""}}>&#xf042; Adjust</option>
                                                                            <option value='adn' {{($value->icon == 'adn') ? "selected":""}}>&#xf170; Adn</option>
                                                                            <option value='align-center' {{($value->icon == 'align-center') ? "selected":""}}>&#xf037; Align Center</option>
                                                                            <option value='align-justify' {{($value->icon == 'align-justify') ? "selected":""}}>&#xf039; Align Justify</option>
                                                                            <option value='align-left' {{($value->icon == 'align-left') ? "selected":""}}>&#xf036; Align Left</option>
                                                                            <option value='align-right' {{($value->icon == 'align-right') ? "selected":""}}>&#xf038; Align Right</option>
                                                                            <option value='amazon' {{($value->icon == 'amazon') ? "selected":""}}>&#xf270; Amazon</option>
                                                                            <option value='ambulance' {{($value->icon == 'ambulance') ? "selected":""}}>&#xf0f9; Ambulance</option>
                                                                            <option value='american-sign-language-interpreting' {{($value->icon == 'merican-sign-language-interpreting') ? "selected":""}}>&#xf2a3; American Sign Language Interpreting</option>
                                                                            <option value='anchor' {{($value->icon == 'anchor') ? "selected":""}}>&#xf13d; Anchor</option>
                                                                            <option value='android' {{($value->icon == 'android') ? "selected":""}}>&#xf17b; Android</option>
                                                                            <option value='angellist' {{($value->icon == 'angellist') ? "selected":""}}>&#xf209; Angellist</option>
                                                                            <option value='angle-double-down' {{($value->icon == 'angle-double-down') ? "selected":""}}>&#xf103; Angle Double Down</option>
                                                                            <option value='angle-double-left' {{($value->icon == 'angle-double-left') ? "selected":""}}>&#xf100; Angle Double Left</option>
                                                                            <option value='angle-double-right' {{($value->icon == 'angle-double-right') ? "selected":""}}>&#xf101; Angle Double Right</option>
                                                                            <option value='angle-double-up' {{($value->icon == 'angle-double-up') ? "selected":""}}>&#xf102; Angle Double Up</option>
                                                                            <option value='angle-down' {{($value->icon == 'angle-down') ? "selected":""}}>&#xf107; Angle Down</option>
                                                                            <option value='angle-left' {{($value->icon == 'angle-left') ? "selected":""}}>&#xf104; Angle Left</option>
                                                                            <option value='angle-right' {{($value->icon == 'angle-right') ? "selected":""}}>&#xf105; Angle Right</option>
                                                                            <option value='angle-up' {{($value->icon == 'angle-up') ? "selected":""}}>&#xf106; Angle Up</option>
                                                                            <option value='apple' {{($value->icon == 'apple') ? "selected":""}}>&#xf179; Apple</option>
                                                                            <option value='archive' {{($value->icon == 'archive') ? "selected":""}}>&#xf187; Archive</option>
                                                                            <option value='area-chart' {{($value->icon == 'area-chart') ? "selected":""}}>&#xf1fe; Area-chart</option>
                                                                            <option value='arrow-circle-down' {{($value->icon == 'arrow-circle-down') ? "selected":""}}>&#xf0ab; Arrow Circle Down</option>
                                                                            <option value='arrow-circle-left' {{($value->icon == 'arrow-circle-left') ? "selected":""}}>&#xf0a8; Arrow Circle Left</option>
                                                                            <option value='arrow-circle-o-down' {{($value->icon == 'arrow-circle-o-down') ? "selected":""}}>&#xf01a; Arrow Circle O Down</option>
                                                                            <option value='arrow-circle-o-left' {{($value->icon == 'arrow-circle-o-left') ? "selected":""}}>&#xf190; Arrow Circle O Left</option>
                                                                            <option value='arrow-circle-o-right' {{($value->icon == 'arrow-circle-o-right') ? "selected":""}}>&#xf18e; Arrow Circle O Right</option>
                                                                            <option value='arrow-circle-o-up' {{($value->icon == 'arrow-circle-o-up') ? "selected":""}}>&#xf01b; Arrow Circle O Up</option>
                                                                            <option value='arrow-circle-right' {{($value->icon == 'arrow-circle-right') ? "selected":""}}>&#xf0a9; Arrow Circle Right</option>
                                                                            <option value='arrow-circle-up' {{($value->icon == 'arrow-circle-up') ? "selected":""}}>&#xf0aa; Arrow Circle Up</option>
                                                                            <option value='arrow-down' {{($value->icon == 'arrow-down') ? "selected":""}}>&#xf063; Arrow Down</option>
                                                                            <option value='arrow-left' {{($value->icon == 'arrow-left') ? "selected":""}}>&#xf060; Arrow Left</option>
                                                                            <option value='arrow-right' {{($value->icon == 'arrow-right') ? "selected":""}}>&#xf061; Arrow Right</option>
                                                                            <option value='arrow-up' {{($value->icon == 'arrow-up') ? "selected":""}}>&#xf062; Arrow Up</option>
                                                                            <option value='arrows' {{($value->icon == 'arrows') ? "selected":""}}>&#xf047; Arrows</option>
                                                                            <option value='arrows-alt' {{($value->icon == 'arrows-alt') ? "selected":""}}>&#xf0b2; Arrows Alt</option>
                                                                            <option value='arrows-h' {{($value->icon == 'arrows-h') ? "selected":""}}>&#xf07e; Arrows H</option>
                                                                            <option value='arrows-v' {{($value->icon == 'arrows-v') ? "selected":""}}>&#xf07d; Arrows V</option>
                                                                            <option value='asl-interpreting' {{($value->icon == 'asl-interpreting') ? "selected":""}}>&#xf2a3; Asl Interpreting</option>
                                                                            <option value='assistive-listening-systems' {{($value->icon == 'assistive-listening-systems') ? "selected":""}}>&#xf2a2; Assistive Listening Systems</option>
                                                                            <option value='asterisk' {{($value->icon == 'asterisk') ? "selected":""}}>&#xf069; Asterisk</option>
                                                                            <option value='at' {{($value->icon == 'at') ? "selected":""}}>&#xf1fa; At</option>
                                                                            <option value='audio-description' {{($value->icon == 'audio-description') ? "selected":""}}>&#xf29e; Audio Description</option>
                                                                            <option value='automobile' {{($value->icon == 'automobile') ? "selected":""}}>&#xf1b9; Automobile</option>

                                                                            <option value='backward' {{($value->icon == 'backward') ? "selected":""}}>&#xf04a; Backward</option>
                                                                            <option value='balance-scale' {{($value->icon == 'balance-scale') ? "selected":""}}>&#xf24e; Balance Scale</option>
                                                                            <option value='ban' {{($value->icon == 'ban') ? "selected":""}}>&#xf05e; Ban</option>
                                                                            <option value='bandcamp' {{($value->icon == 'bandcamp') ? "selected":""}}>&#xf2d5; Bandcamp</option>
                                                                            <option value='bank' {{($value->icon == 'bank') ? "selected":""}}>&#xf19c; Bank</option>
                                                                            <option value='bar-chart' {{($value->icon == 'bar-chart') ? "selected":""}}>&#xf080; Bar Chart</option>
                                                                            <option value='bar-chart-o' {{($value->icon == 'bar-chart-o') ? "selected":""}}>&#xf080; Bar Chart O</option>
                                                                            <option value='barcode' {{($value->icon == 'barcode') ? "selected":""}}>&#xf02a; barcode</option>
                                                                            <option value='bars' {{($value->icon == 'bars') ? "selected":""}}>&#xf0c9; bars</option>
                                                                            <option value='bath' {{($value->icon == 'bath') ? "selected":""}}>&#xf2cd; bath</option>
                                                                            <option value='bathtub' {{($value->icon == 'bathtub') ? "selected":""}}>&#xf2cd; bathtub</option>
                                                                            <option value='battery' {{($value->icon == 'battery') ? "selected":""}}>&#xf240; battery</option>
                                                                            <option value='battery-0' {{($value->icon == 'battery-0') ? "selected":""}}>&#xf244; battery 0</option>
                                                                            <option value='battery-1' {{($value->icon == 'battery-1') ? "selected":""}}>&#xf243; battery 1</option>
                                                                            <option value='battery-2' {{($value->icon == 'battery-2') ? "selected":""}}>&#xf242; battery 2</option>
                                                                            <option value='battery-3' {{($value->icon == 'battery-3') ? "selected":""}}>&#xf241; battery 3</option>
                                                                            <option value='battery-4' {{($value->icon == 'battery-4') ? "selected":""}}>&#xf240; battery 4</option>
                                                                            <option value='battery-empty' {{($value->icon == 'battery-empty') ? "selected":""}}>&#xf244; battery empty</option>
                                                                            <option value='battery-full' {{($value->icon == 'battery-full') ? "selected":""}}>&#xf240; battery full</option>
                                                                            <option value='battery-half' {{($value->icon == 'battery-half') ? "selected":""}}>&#xf242; battery half</option>
                                                                            <option value='battery-quarter' {{($value->icon == 'battery-quarter') ? "selected":""}}>&#xf243; battery quarter</option>
                                                                            <option value='battery-three-quarters' {{($value->icon == 'battery-three-quarters') ? "selected":""}}>&#xf241; battery three quarters</option>
                                                                            <option value='bed' {{($value->icon == 'bed') ? "selected":""}}>&#xf236; bed</option>
                                                                            <option value='beer' {{($value->icon == 'beer') ? "selected":""}}>&#xf0fc; beer</option>
                                                                            <option value='behance' {{($value->icon == 'behance') ? "selected":""}}>&#xf1b4; behance</option>
                                                                            <option value='behance-square' {{($value->icon == 'behance-square') ? "selected":""}}>&#xf1b5; behance square</option>
                                                                            <option value='bell' {{($value->icon == 'bell') ? "selected":""}}>&#xf0f3; bell</option>
                                                                            <option value='bell-o' {{($value->icon == 'bell-o') ? "selected":""}}>&#xf0a2; bell o</option>
                                                                            <option value='bell-slash' {{($value->icon == 'bell-slash') ? "selected":""}}>&#xf1f6; bell slash</option>
                                                                            <option value='bell-slash-o' {{($value->icon == 'bell-slash-o') ? "selected":""}}>&#xf1f7; bell slash o</option>
                                                                            <option value='bicycle' {{($value->icon == 'bicycle') ? "selected":""}}>&#xf206; bicycle</option>
                                                                            <option value='binoculars' {{($value->icon == 'binoculars') ? "selected":""}}>&#xf1e5; binoculars</option>
                                                                            <option value='birthday-cake' {{($value->icon == 'birthday-cake') ? "selected":""}}>&#xf1fd; birthday cake</option>
                                                                            <option value='bitbucket' {{($value->icon == 'bitbucket') ? "selected":""}}>&#xf171; bitbucket</option>
                                                                            <option value='bitbucket-square' {{($value->icon == 'bitbucket-square') ? "selected":""}}>&#xf172; bitbucket square</option>
                                                                            <option value='bitcoin' {{($value->icon == 'bitcoin') ? "selected":""}}>&#xf15a; bitcoin</option>
                                                                            <option value='black-tie' {{($value->icon == 'black-tie') ? "selected":""}}>&#xf27e; black-tie</option>
                                                                            <option value='blind' {{($value->icon == 'blind') ? "selected":""}}>&#xf29d; blind</option>
                                                                            <option value='bluetooth' {{($value->icon == 'bluetooth') ? "selected":""}}>&#xf293; bluetooth</option>
                                                                            <option value='bluetooth-b' {{($value->icon == 'bluetooth-b') ? "selected":""}}>&#xf294; bluetooth b</option>
                                                                            <option value='bold' {{($value->icon == 'bold') ? "selected":""}}>&#xf032; bold</option>
                                                                            <option value='bolt' {{($value->icon == 'bolt') ? "selected":""}}>&#xf0e7; bolt</option>
                                                                            <option value='bomb' {{($value->icon == 'bomb') ? "selected":""}}>&#xf1e2; bomb</option>
                                                                            <option value='book' {{($value->icon == 'book') ? "selected":""}}>&#xf02d; book</option>
                                                                            <option value='bookmark' {{($value->icon == 'bookmark') ? "selected":""}}>&#xf02e; bookmark</option>
                                                                            <option value='bookmark-o' {{($value->icon == 'bookmark-o') ? "selected":""}}>&#xf097; bookmark o</option>
                                                                            <option value='braille' {{($value->icon == 'braille') ? "selected":""}}>&#xf2a1; braille</option>
                                                                            <option value='briefcase' {{($value->icon == 'briefcase') ? "selected":""}}>&#xf0b1; briefcase</option>
                                                                            <option value='btc' {{($value->icon == 'btc') ? "selected":""}}>&#xf15a; btc</option>
                                                                            <option value='bug' {{($value->icon == 'bug') ? "selected":""}}>&#xf188; bug</option>
                                                                            <option value='building' {{($value->icon == 'building') ? "selected":""}}>&#xf1ad; building</option>
                                                                            <option value='building-o' {{($value->icon == 'building-o') ? "selected":""}}>&#xf0f7; building o</option>
                                                                            <option value='bullhorn' {{($value->icon == 'bullhorn') ? "selected":""}}>&#xf0a1; bullhorn</option>
                                                                            <option value='bullseye' {{($value->icon == 'bullseye') ? "selected":""}}>&#xf140; bullseye</option>
                                                                            <option value='bus' {{($value->icon == 'bus') ? "selected":""}}>&#xf207; bus</option>
                                                                            <option value='buysellads' {{($value->icon == 'buysellads') ? "selected":""}}>&#xf20d; buysellads</option>


                                                                            <option value='cab' {{($value->icon == 'cab') ? "selected":""}}>&#xf1ba; cab</option>
                                                                            <option value='calculator' {{($value->icon == 'calculator') ? "selected":""}}>&#xf1ec; calculator</option>
                                                                            <option value="calendar" {{($value->icon == 'calendar') ? "selected":""}}>&#xf133; Calendar</option>
                                                                            <option value="calendar-alt" {{($value->icon == 'calendar-alt') ? "selected":""}}>&#xf073; calendar alt</option>
                                                                            <option value="calendar-check" {{($value->icon == 'calendar-check') ? "selected":""}}>&#xf274; Calendar check</option>
                                                                            <option value="calendar-minus" {{($value->icon == 'calendar-minus') ? "selected":""}}>&#xf272; calendar minus</option>
                                                                            <option value="calendar-plus" {{($value->icon == 'calendar-plus') ? "selected":""}}>&#xf271; Calendar plus</option>
                                                                            <option value="calendar-times" {{($value->icon == 'calendar-times') ? "selected":""}}>&#xf273; Calendar times</option>
                                                                            <option value='camera' {{($value->icon == 'camera') ? "selected":""}}>&#xf030; camera</option>
                                                                            <option value='camera-retro' {{($value->icon == 'camera-retro') ? "selected":""}}>&#xf083; camera retro</option>
                                                                            <option value='car' {{($value->icon == 'car') ? "selected":""}}>&#xf1b9; car</option>
                                                                            <option value='caret-down' {{($value->icon == 'caret-down') ? "selected":""}}>&#xf0d7; caret down</option>
                                                                            <option value='caret-left' {{($value->icon == 'caret-left') ? "selected":""}}>&#xf0d9; caret left</option>
                                                                            <option value='caret-right' {{($value->icon == 'caret-right') ? "selected":""}}>&#xf0da; caret right</option>
                                                                            <option value='caret-up' {{($value->icon == 'caret-up') ? "selected":""}}>&#xf0d8; caret up</option>
                                                                            <option value="caret-square-down" {{($value->icon == 'caret-square-down') ? "selected":""}}>&#xf150; Caret square down</option>
                                                                            <option value="caret-square-left" {{($value->icon == 'caret-square-left') ? "selected":""}}>&#xf191; caret square left</option>
                                                                            <option value="caret-square-right" {{($value->icon == 'caret-square-right') ? "selected":""}}>&#xf152; Caret square right</option>
                                                                            <option value="caret-square-up" {{($value->icon == 'caret-square-up') ? "selected":""}}>&#xf151; Caret square up</option>
                                                                            <option value='cart-arrow-down' {{($value->icon == 'cart-arrow-down') ? "selected":""}}>&#xf218; cart arrow down</option>
                                                                            <option value='cart-plus' {{($value->icon == 'cart-plus') ? "selected":""}}>&#xf217; cart plus</option>
                                                                            <option value='cc' {{($value->icon == 'cc') ? "selected":""}}>&#xf20a; cc</option>
                                                                            <option value='cc-amex' {{($value->icon == 'cc-amex') ? "selected":""}}>&#xf1f3; cc amex</option>
                                                                            <option value='cc-diners-club' {{($value->icon == 'cc-diners-club') ? "selected":""}}>&#xf24c; cc diners club</option>
                                                                            <option value='cc-discover' {{($value->icon == 'cc-discover') ? "selected":""}}>&#xf1f2; cc discover</option>
                                                                            <option value='cc-jcb' {{($value->icon == 'cc-jcb') ? "selected":""}}>&#xf24b; cc jcb</option>
                                                                            <option value='cc-mastercard' {{($value->icon == 'cc-mastercard') ? "selected":""}}>&#xf1f1; cc mastercard</option>
                                                                            <option value='cc-paypal' {{($value->icon == 'cc-paypal') ? "selected":""}}>&#xf1f4; cc paypal</option>
                                                                            <option value='cc-stripe' {{($value->icon == 'cc-stripe') ? "selected":""}}>&#xf1f5; cc stripe</option>
                                                                            <option value='cc-visa' {{($value->icon == 'cc-visa') ? "selected":""}}>&#xf1f0; cc visa</option>
                                                                            <option value='certificate' {{($value->icon == 'certificate') ? "selected":""}}>&#xf0a3; certificate</option>
                                                                            <option value='chain' {{($value->icon == 'chain') ? "selected":""}}>&#xf0c1; chain</option>
                                                                            <option value='chain-broken' {{($value->icon == 'chain-broken') ? "selected":""}}>&#xf127; chain broken</option>
                                                                            <option value="chart-bar" {{($value->icon == 'chart-bar') ? "selected":""}}>&#xf080; Chart bar</option>
                                                                            <option value='check' {{($value->icon == 'check') ? "selected":""}}>&#xf00c; check</option>
                                                                            <option value="check-circle" {{($value->icon == 'check-circle') ? "selected":""}}>&#xf058; Check circle</option>
                                                                            <option value='check-circle-o' {{($value->icon == 'check-circle-o') ? "selected":""}}>&#xf05d; check circle o</option>
                                                                            <option value="check-square" {{($value->icon == 'check-square') ? "selected":""}}>&#xf14a; Check square</option>
                                                                            <option value='check-square-o' {{($value->icon == 'check-square-o') ? "selected":""}}>&#xf046; check square o</option>
                                                                            <option value='chevron-circle-down' {{($value->icon == 'chevron-circle-down') ? "selected":""}}>&#xf13a; chevron circle down</option>
                                                                            <option value='chevron-circle-left' {{($value->icon == 'chevron-circle-left') ? "selected":""}}>&#xf137; chevron circle left</option>
                                                                            <option value='chevron-circle-right' {{($value->icon == 'chevron-circle-right') ? "selected":""}}>&#xf138; chevron circle right</option>
                                                                            <option value='chevron-circle-up' {{($value->icon == 'chevron-circle-up') ? "selected":""}}>&#xf139; chevron circle up</option>
                                                                            <option value='chevron-down' {{($value->icon == 'chevron-down') ? "selected":""}}>&#xf078; chevron down</option>
                                                                            <option value='chevron-left' {{($value->icon == 'chevron-left') ? "selected":""}}>&#xf053; chevron left</option>
                                                                            <option value='chevron-right' {{($value->icon == 'chevron-right') ? "selected":""}}>&#xf054; chevron right</option>
                                                                            <option value='chevron-up' {{($value->icon == 'chevron-up') ? "selected":""}}>&#xf077; chevron up</option>
                                                                            <option value='child' {{($value->icon == 'child') ? "selected":""}}>&#xf1ae; child</option>
                                                                            <option value='chrome' {{($value->icon == 'chrome') ? "selected":""}}>&#xf268; chrome</option>
                                                                            <option value="circle" {{($value->icon == 'circle') ? "selected":""}}>&#xf111; Circle</option>
                                                                            <option value='circle-o' {{($value->icon == 'circle-o') ? "selected":""}}>&#xf10c; circle o</option>
                                                                            <option value='circle-o-notch' {{($value->icon == 'circle-o-notch') ? "selected":""}}>&#xf1ce; circle o notch</option>
                                                                            <option value='circle-thin' {{($value->icon == 'circle-thin') ? "selected":""}}>&#xf1db; circle thin</option>
                                                                            <option value='clipboard' {{($value->icon == 'clipboard') ? "selected":""}}>&#xf0ea; clipboard</option>
                                                                            <option value="clock" {{($value->icon == 'clock') ? "selected":""}}>&#xf017; Clock</option>
                                                                            <option value="clone" {{($value->icon == 'clone') ? "selected":""}}>&#xf24d; Clone</option>
                                                                            <option value='close' {{($value->icon == 'close') ? "selected":""}}>&#xf00d; close</option>
                                                                            <option value="closed-captioning" {{($value->icon == 'closed-captioning') ? "selected":""}}>&#xf20a; Closed captioning</option>
                                                                            <option value='cloud' {{($value->icon == 'cloud') ? "selected":""}}>&#xf0c2; cloud</option>
                                                                            <option value='cloud-download' {{($value->icon == 'cloud-download') ? "selected":""}}>&#xf0ed; cloud download</option>
                                                                            <option value='cloud-upload' {{($value->icon == 'cloud-upload') ? "selected":""}}>&#xf0ee; cloud upload</option>
                                                                            <option value='cny' {{($value->icon == 'cny') ? "selected":""}}>&#xf157; cny</option>
                                                                            <option value='code' {{($value->icon == 'code') ? "selected":""}}>&#xf121; code</option>
                                                                            <option value='code-fork' {{($value->icon == 'code-fork') ? "selected":""}}>&#xf126; code fork</option>
                                                                            <option value='codiepie' {{($value->icon == 'codiepie') ? "selected":""}}>&#xf284; codiepie</option>
                                                                            <option value='coffee' {{($value->icon == 'coffee') ? "selected":""}}>&#xf0f4; coffee</option>
                                                                            <option value='cog' {{($value->icon == 'cog') ? "selected":""}}>&#xf013; cog</option>
                                                                            <option value='cogs' {{($value->icon == 'cogs') ? "selected":""}}>&#xf085; cogs</option>
                                                                            <option value='columns' {{($value->icon == 'columns') ? "selected":""}}>&#xf0db; columns</option>
                                                                            <option value="comment" {{($value->icon == 'comment') ? "selected":""}}>&#xf075; Comment</option>
                                                                            <option value='comment-o' {{($value->icon == 'comment-o') ? "selected":""}}>&#xf0e5; comment o</option>
                                                                            <option value="comment-alt" {{($value->icon == 'comment-alt') ? "selected":""}}>&#xf27a; Comment alt</option>
                                                                            <option value='commenting-o' {{($value->icon == 'commenting-o') ? "selected":""}}>&#xf27b; commenting o</option>
                                                                            <option value="comments" {{($value->icon == 'comments') ? "selected":""}}>&#xf086; Comments</option>
                                                                            <option value='comments-o' {{($value->icon == 'comments-o') ? "selected":""}}>&#xf0e6; comments o</option>
                                                                            <option value="compass" {{($value->icon == 'compass') ? "selected":""}}>&#xf14e; Compass</option>
                                                                            <option value='compress' {{($value->icon == 'compress') ? "selected":""}}>&#xf066; compress</option>
                                                                            <option value='connectdevelop' {{($value->icon == 'connectdevelop') ? "selected":""}}>&#xf20e; connectdevelop</option>
                                                                            <option value='contao' {{($value->icon == 'contao') ? "selected":""}}>&#xf26d; contao</option>
                                                                            <option value="copy" {{($value->icon == 'copy') ? "selected":""}}>&#xf0c5; Copy</option>
                                                                            <option value="copyright" {{($value->icon == 'copyright') ? "selected":""}}>&#xf1f9; Copyright</option>
                                                                            <option value='creative-commons' {{($value->icon == 'creative-commons') ? "selected":""}}>&#xf25e; creative commons</option>
                                                                            <option value="credit-card" {{($value->icon == 'credit-card') ? "selected":""}}>&#xf09d; Credit card</option>
                                                                            <option value='credit-card-alt' {{($value->icon == 'credit-card-alt') ? "selected":""}}>&#xf283; credit card alt</option>
                                                                            <option value='crop' {{($value->icon == 'crop') ? "selected":""}}>&#xf125; crop</option>
                                                                            <option value='crosshairs' {{($value->icon == 'crosshairs') ? "selected":""}}>&#xf05b; crosshairs</option>
                                                                            <option value='css3' {{($value->icon == 'css3') ? "selected":""}}>&#xf13c; css3</option>
                                                                            <option value='cube' {{($value->icon == 'cube') ? "selected":""}}>&#xf1b2; cube</option>
                                                                            <option value='cubes' {{($value->icon == 'cubes') ? "selected":""}}>&#xf1b3; cubes</option>
                                                                            <option value='cut' {{($value->icon == 'cut') ? "selected":""}}>&#xf0c4; cut</option>
                                                                            <option value='cutlery' {{($value->icon == 'cutlery') ? "selected":""}}>&#xf0f5; cutlery</option>


                                                                            <option value='dashboard' {{($value->icon == 'dashboard') ? "selected":""}}>&#xf0e4; dashboard</option>
                                                                            <option value='dashcube' {{($value->icon == 'dashcube') ? "selected":""}}>&#xf210; dashcube</option>
                                                                            <option value='database' {{($value->icon == 'database') ? "selected":""}}>&#xf1c0; database</option>
                                                                            <option value='deaf' {{($value->icon == 'deaf') ? "selected":""}}>&#xf2a4; deaf</option>
                                                                            <option value='deafness' {{($value->icon == 'deafness') ? "selected":""}}>&#xf2a4; deafness</option>
                                                                            <option value='dedent' {{($value->icon == 'dedent') ? "selected":""}}>&#xf03b; dedent</option>
                                                                            <option value='delicious' {{($value->icon == 'delicious') ? "selected":""}}>&#xf1a5; delicious</option>
                                                                            <option value='desktop' {{($value->icon == 'desktop') ? "selected":""}}>&#xf108; desktop</option>
                                                                            <option value='deviantart' {{($value->icon == 'deviantart') ? "selected":""}}>&#xf1bd; deviantart</option>
                                                                            <option value='diamond' {{($value->icon == 'diamond') ? "selected":""}}>&#xf219; diamond</option>
                                                                            <option value='digg' {{($value->icon == 'digg') ? "selected":""}}>&#xf1a6; digg</option>
                                                                            <option value='dollar' {{($value->icon == 'dollar') ? "selected":""}}>&#xf155; dollar</option>
                                                                            <option value="dot-circle" {{($value->icon == 'dot-circle') ? "selected":""}}>&#xf192; Dot circle</option>
                                                                            <option value='download' {{($value->icon == 'download') ? "selected":""}}>&#xf019; download</option>
                                                                            <option value='dribbble' {{($value->icon == 'dribbble') ? "selected":""}}>&#xf17d; dribbble</option>
                                                                            <option value='drivers-license' {{($value->icon == 'drivers-license') ? "selected":""}}>&#xf2c2; drivers license</option>
                                                                            <option value='drivers-license-o' {{($value->icon == 'drivers-license-o') ? "selected":""}}>&#xf2c3; drivers license o</option>
                                                                            <option value='dropbox' {{($value->icon == 'dropbox') ? "selected":""}}>&#xf16b; dropbox</option>
                                                                            <option value='drupal' {{($value->icon == 'drupal') ? "selected":""}}>&#xf1a9; drupal</option>



                                                                            <option value='edge' {{($value->icon == 'edge') ? "selected":""}}>&#xf282; edge</option>
                                                                            <option value="edit" {{($value->icon == 'edit') ? "selected":""}}>&#xf044; Edit</option>
                                                                            <option value='eercast' {{($value->icon == 'eercast') ? "selected":""}}>&#xf2da; eercast</option>
                                                                            <option value='eject' {{($value->icon == 'eject') ? "selected":""}}>&#xf052; eject</option>
                                                                            <option value='ellipsis-h' {{($value->icon == 'ellipsis-h') ? "selected":""}}>&#xf141; ellipsis h</option>
                                                                            <option value='ellipsis-v' {{($value->icon == 'ellipsis-v') ? "selected":""}}>&#xf142; ellipsis v</option>
                                                                            <option value='empire' {{($value->icon == 'empire') ? "selected":""}}>&#xf1d1; empire</option>
                                                                            <option value='envelope' {{($value->icon == 'envelope') ? "selected":""}}>&#xf0e0; envelope</option>
                                                                            <option value='envelope-o' {{($value->icon == 'envelope-o') ? "selected":""}}>&#xf003; envelope o</option>
                                                                            <option value="envelope-open" {{($value->icon == 'envelope-open') ? "selected":""}}>&#xf2b6; Envelope open</option>

                                                                            <option value='envelope-open-o' {{($value->icon == 'envelope-open-o') ? "selected":""}}>&#xf2b7; envelope open o</option>
                                                                            <option value='envelope-square' {{($value->icon == 'envelope-square') ? "selected":""}}>&#xf199; envelope square</option>
                                                                            <option value='envira' {{($value->icon == 'envira') ? "selected":""}}>&#xf299; envira</option>
                                                                            <option value='eraser' {{($value->icon == 'eraser') ? "selected":""}}>&#xf12d; eraser</option>
                                                                            <option value='etsy' {{($value->icon == 'etsy') ? "selected":""}}>&#xf2d7; etsy</option>
                                                                            <option value='eur' {{($value->icon == 'eur') ? "selected":""}}>&#xf153; eur</option>
                                                                            <option value='euro' {{($value->icon == 'euro') ? "selected":""}}>&#xf153; euro</option>
                                                                            <option value='exchange' {{($value->icon == 'exchange') ? "selected":""}}>&#xf0ec; exchange</option>
                                                                            <option value='exclamation' {{($value->icon == 'exclamation') ? "selected":""}}>&#xf12a; exclamation</option>
                                                                            <option value='exclamation-circle' {{($value->icon == 'exclamation-circle') ? "selected":""}}>&#xf06a; exclamation circle</option>
                                                                            <option value='exclamation-triangle' {{($value->icon == 'exclamation-triangle') ? "selected":""}}>&#xf071; exclamation triangle</option>
                                                                            <option value='expand' {{($value->icon == 'expand') ? "selected":""}}>&#xf065; expand</option>
                                                                            <option value='expeditedssl' {{($value->icon == 'expeditedssl') ? "selected":""}}>&#xf23e; expeditedssl</option>
                                                                            <option value='external-link' {{($value->icon == 'external-link') ? "selected":""}}>&#xf08e; external link</option>
                                                                            <option value='external-link-square' {{($value->icon == 'external-link-square') ? "selected":""}}>&#xf14c; external link square</option>
                                                                            <option value="eye" {{($value->icon == 'eye') ? "selected":""}}>&#xf06e; Eye</option>
                                                                            <option value="eye-slash" {{($value->icon == 'eye-slash') ? "selected":""}}>&#xf070; Eye slash</option>
                                                                            <option value='eyedropper' {{($value->icon == 'eyedropper') ? "selected":""}}>&#xf1fb; eyedropper</option>


                                                                            <option value="flag" {{($value->icon == 'flag') ? "selected":""}}>&#xf024; Flag</option>
                                                                            <option value="flushed" {{($value->icon == 'flushed') ? "selected":""}}>&#xf579; Flushed</option>
                                                                            <option value="folder" {{($value->icon == 'folder') ? "selected":""}}>&#xf07b; Folder</option>
                                                                            <option value="folder-open" {{($value->icon == 'folder-open') ? "selected":""}}>&#xf07c; Folder open </option>
                                                                            <option value="frown" {{($value->icon == 'frown') ? "selected":""}}>&#xf119; Frown</option>
                                                                            <option value="futbol" {{($value->icon == 'futbol') ? "selected":""}}>&#xf1e3; Futbol</option>
                                                                            <option value='fa' {{($value->icon == 'fa') ? "selected":""}}>&#xf2b4; fa</option>
                                                                            <option value='facebook' {{($value->icon == 'facebook') ? "selected":""}}>&#xf09a; facebook</option>
                                                                            <option value='facebook-f' {{($value->icon == 'facebook-f') ? "selected":""}}>&#xf09a; facebook-f</option>
                                                                            <option value='facebook-official' {{($value->icon == 'facebook-official') ? "selected":""}}>&#xf230; facebook-official</option>
                                                                            <option value='facebook-square' {{($value->icon == 'facebook-square') ? "selected":""}}>&#xf082; facebook-square</option>
                                                                            <option value='fast-backward' {{($value->icon == 'fast-backward') ? "selected":""}}>&#xf049; fast-backward</option>
                                                                            <option value='fast-forward' {{($value->icon == 'fast-forward') ? "selected":""}}>&#xf050; fast-forward</option>
                                                                            <option value='fax' {{($value->icon == 'fax') ? "selected":""}}>&#xf1ac; fax</option>
                                                                            <option value='feed' {{($value->icon == 'feed') ? "selected":""}}>&#xf09e; feed</option>
                                                                            <option value='female' {{($value->icon == 'female') ? "selected":""}}>&#xf182; female</option>
                                                                            <option value='fighter-jet' {{($value->icon == 'fighter-jet') ? "selected":""}}>&#xf0fb; fighter-jet</option>
                                                                            <option value="file" {{($value->icon == 'file') ? "selected":""}}>&#xf15b; File</option>
                                                                            <option value="file-archive" {{($value->icon == 'file-archive') ? "selected":""}}>&#xf1c6; File archive</option>
                                                                            <option value="file-audio" {{($value->icon == 'file-audio') ? "selected":""}}>&#xf1c7; File audio</option>
                                                                            <option value="file-code" {{($value->icon == 'file-code') ? "selected":""}}>&#xf1c9; File code</option>
                                                                            <option value="file-excel" {{($value->icon == 'file-excel') ? "selected":""}}>&#xf1c3; File excel </option>
                                                                            <option value="file-image" {{($value->icon == 'file-image') ? "selected":""}}>&#xf1c5; File image</option>
                                                                            <option value='file-movie-o' {{($value->icon == 'file-movie-o') ? "selected":""}}>&#xf1c8; file movie o</option>
                                                                            <option value='file-o' {{($value->icon == 'file-o') ? "selected":""}}>&#xf016; file o</option>
                                                                            <option value="file-pdf" {{($value->icon == 'file-pdf') ? "selected":""}}>&#xf1c1; File pdf</option>
                                                                            <option value='file-photo-o' {{($value->icon == 'file-photo-o') ? "selected":""}}>&#xf1c5; file photo o</option>
                                                                            <option value='file-picture-o' {{($value->icon == 'file-picture-o') ? "selected":""}}>&#xf1c5; file picture o</option>
                                                                            <option value="file-powerpoint" {{($value->icon == 'file-powerpoint') ? "selected":""}}>&#xf1c4; File powerpoint</option>
                                                                            <option value='file-sound-o' {{($value->icon == 'file-sound-o') ? "selected":""}}>&#xf1c7; file sound o</option>
                                                                            <option value='file-text' {{($value->icon == 'file-text') ? "selected":""}}>&#xf15c; file text</option>
                                                                            <option value='file-text-o' {{($value->icon == 'file-text-o') ? "selected":""}}>&#xf0f6; file text o</option>
                                                                            <option value="file-video" {{($value->icon == 'file-video') ? "selected":""}}>&#xf1c8; File video</option>
                                                                            <option value="file-word" {{($value->icon == 'file-word') ? "selected":""}}>&#xf1c2; File word</option>
                                                                            <option value='file-zip-o' {{($value->icon == 'file-zip-o') ? "selected":""}}>&#xf1c6; file zip o</option>
                                                                            <option value='files-o' {{($value->icon == 'files-o') ? "selected":""}}>&#xf0c5; files o</option>
                                                                            <option value='film' {{($value->icon == 'film') ? "selected":""}}>&#xf008; film</option>
                                                                            <option value='filter' {{($value->icon == 'filter') ? "selected":""}}>&#xf0b0; filter</option>
                                                                            <option value='fire' {{($value->icon == 'fire') ? "selected":""}}>&#xf06d; fire</option>
                                                                            <option value='fire-extinguisher' {{($value->icon == 'fire-extinguisher') ? "selected":""}}>&#xf134; fire extinguisher</option>
                                                                            <option value='firefox' {{($value->icon == 'firefox') ? "selected":""}}>&#xf269; firefox</option>
                                                                            <option value='first-order' {{($value->icon == 'first-order') ? "selected":""}}>&#xf2b0; first order</option>
                                                                            <option value='flag' {{($value->icon == 'flag') ? "selected":""}}>&#xf024; flag</option>
                                                                            <option value='flag-checkered' {{($value->icon == 'flag-checkered') ? "selected":""}}>&#xf11e; flag checkered</option>
                                                                            <option value='flag-o' {{($value->icon == 'flag-o') ? "selected":""}}>&#xf11d; flag o</option>
                                                                            <option value='flash' {{($value->icon == 'flash') ? "selected":""}}>&#xf0e7; flash</option>
                                                                            <option value='flask' {{($value->icon == 'flask') ? "selected":""}}>&#xf0c3; flask</option>
                                                                            <option value='flickr' {{($value->icon == 'flickr') ? "selected":""}}>&#xf16e; flickr</option>
                                                                            <option value='floppy-o' {{($value->icon == 'floppy-o') ? "selected":""}}>&#xf0c7; floppy o</option>
                                                                            <option value='folder' {{($value->icon == 'folder') ? "selected":""}}>&#xf07b; folder</option>
                                                                            <option value='folder-o' {{($value->icon == 'folder-o') ? "selected":""}}>&#xf114; folder o</option>
                                                                            <option value='folder-open' {{($value->icon == 'folder-open') ? "selected":""}}>&#xf07c; folder open</option>
                                                                            <option value='folder-open-o' {{($value->icon == 'folder-open-o') ? "selected":""}}>&#xf115; folder open o</option>
                                                                            <option value='font' {{($value->icon == 'font') ? "selected":""}}>&#xf031; font</option>
                                                                            <option value='font-awesome' {{($value->icon == 'font-awesome') ? "selected":""}}>&#xf2b4; font awesome</option>
                                                                            <option value='fonticons' {{($value->icon == 'fonticons') ? "selected":""}}>&#xf280; fonticons</option>
                                                                            <option value='fort-awesome' {{($value->icon == 'fort-awesome') ? "selected":""}}>&#xf286; fort awesome</option>
                                                                            <option value='forumbee' {{($value->icon == 'forumbee') ? "selected":""}}>&#xf211; forumbee</option>
                                                                            <option value='forward' {{($value->icon == 'forward') ? "selected":""}}>&#xf04e; forward</option>
                                                                            <option value='foursquare' {{($value->icon == 'foursquare') ? "selected":""}}>&#xf180; foursquare</option>
                                                                            <option value='free-code-camp' {{($value->icon == 'free-code-camp') ? "selected":""}}>&#xf2c5; free code camp</option>
                                                                            <option value='frown-o' {{($value->icon == 'frown-o') ? "selected":""}}>&#xf119; frown o</option>
                                                                            <option value='futbol-o' {{($value->icon == 'futbol-o') ? "selected":""}}>&#xf1e3; futbol o</option>

                                                                            <option value='gamepad' {{($value->icon == 'gamepad') ? "selected":""}}>&#xf11b; gamepad</option>
                                                                            <option value='gavel' {{($value->icon == 'gavel') ? "selected":""}}>&#xf0e3; gavel</option>
                                                                            <option value='gbp' {{($value->icon == 'gbp') ? "selected":""}}>&#xf154; gbp</option>
                                                                            <option value='ge' {{($value->icon == 'ge') ? "selected":""}}>&#xf1d1; ge</option>
                                                                            <option value='gear' {{($value->icon == 'gear') ? "selected":""}}>&#xf013; gear</option>
                                                                            <option value='gears' {{($value->icon == 'gears') ? "selected":""}}>&#xf085; gears</option>
                                                                            <option value='genderless' {{($value->icon == 'genderless') ? "selected":""}}>&#xf22d; genderless</option>
                                                                            <option value='get-pocket' {{($value->icon == 'get-pocket') ? "selected":""}}>&#xf265; get-pocket</option>
                                                                            <option value='gg' {{($value->icon == 'gg') ? "selected":""}}>&#xf260; gg</option>
                                                                            <option value='gg-circle' {{($value->icon == 'gg-circle') ? "selected":""}}>&#xf261; gg circle</option>
                                                                            <option value='gift' {{($value->icon == 'gift') ? "selected":""}}>&#xf06b; gift</option>
                                                                            <option value='git' {{($value->icon == 'git') ? "selected":""}}>&#xf1d3; git</option>
                                                                            <option value='git-square' {{($value->icon == 'git-square') ? "selected":""}}>&#xf1d2; git square</option>
                                                                            <option value='github' {{($value->icon == 'github') ? "selected":""}}>&#xf09b; github</option>
                                                                            <option value='github-alt' {{($value->icon == 'github-alt') ? "selected":""}}>&#xf113; github alt</option>
                                                                            <option value='github-square' {{($value->icon == 'github-square') ? "selected":""}}>&#xf092; github square</option>
                                                                            <option value='gitlab' {{($value->icon == 'gitlab') ? "selected":""}}>&#xf296; gitlab</option>
                                                                            <option value='gittip' {{($value->icon == 'gittip') ? "selected":""}}>&#xf184; gittip</option>
                                                                            <option value='glass' {{($value->icon == 'glass') ? "selected":""}}>&#xf000; glass</option>
                                                                            <option value='glide' {{($value->icon == 'glide') ? "selected":""}}>&#xf2a5; glide</option>
                                                                            <option value='glide-g' {{($value->icon == 'glide-g') ? "selected":""}}>&#xf2a6; glide g</option>
                                                                            <option value='globe' {{($value->icon == 'globe') ? "selected":""}}>&#xf0ac; globe</option>
                                                                            <option value='google' {{($value->icon == 'google') ? "selected":""}}>&#xf1a0; google</option>
                                                                            <option value='google-plus' {{($value->icon == 'google-plus') ? "selected":""}}>&#xf0d5; google plus</option>
                                                                            <option value='google-plus-circle' {{($value->icon == 'google-plus-circle') ? "selected":""}}>&#xf2b3; google plus circle</option>
                                                                            <option value='google-plus-official' {{($value->icon == 'google-plus-official') ? "selected":""}}>&#xf2b3; google plus official</option>
                                                                            <option value='google-plus-square' {{($value->icon == 'google-plus-square') ? "selected":""}}>&#xf0d4; google plus square</option>
                                                                            <option value='google-wallet' {{($value->icon == 'google-wallet') ? "selected":""}}>&#xf1ee; google wallet</option>
                                                                            <option value='graduation-cap' {{($value->icon == 'graduation-cap') ? "selected":""}}>&#xf19d; graduation cap</option>
                                                                            <option value='gratipay' {{($value->icon == 'gratipay') ? "selected":""}}>&#xf184; gratipay</option>
                                                                            <option value='grav' {{($value->icon == 'grav') ? "selected":""}}>&#xf2d6; grav</option>
                                                                            <option value='group' {{($value->icon == 'group') ? "selected":""}}>&#xf0c0; group</option>

                                                                            <option value='h-square' {{($value->icon == 'h-square') ? "selected":""}}>&#xf0fd; h-square</option>
                                                                            <option value='hacker-news' {{($value->icon == 'hacker-news') ? "selected":""}}>&#xf1d4; hacker news</option>
                                                                            <option value='hand-grab-o' {{($value->icon == 'hand-grab-o') ? "selected":""}}>&#xf255; hand grab o</option>
                                                                            <option value="hand-lizard" {{($value->icon == 'hand-lizard') ? "selected":""}}>&#xf258; Hand lizard</option>
                                                                            <option value="hand-point-down" {{($value->icon == 'hand-point-down') ? "selected":""}}>&#xf0a7; Hand point down</option>
                                                                            <option value="hand-point-left" {{($value->icon == 'hand-point-left') ? "selected":""}}>&#xf0a5; Hand point left</option>
                                                                            <option value="hand-point-right" {{($value->icon == 'hand-point-right') ? "selected":""}}>&#xf0a4; Hand point right</option>
                                                                            <option value="hand-point-up" {{($value->icon == 'hand-point-up') ? "selected":""}}>&#xf0a6; Hand point up</option>
                                                                            <option value="hand-paper" {{($value->icon == 'hand-paper') ? "selected":""}}>&#xf256; Hand paper</option>
                                                                            <option value="hand-peace" {{($value->icon == 'hand-peace') ? "selected":""}}>&#xf25b; Hand peace</option>
                                                                            <option value="hand-pointer" {{($value->icon == 'hand-pointer') ? "selected":""}}>&#xf25a; Hand pointer</option>
                                                                            <option value="hand-rock" {{($value->icon == 'hand-rock') ? "selected":""}}>&#xf255; Hand rock </option>
                                                                            <option value="hand-scissors" {{($value->icon == 'hand-scissors') ? "selected":""}}>&#xf257; Hand scissors</option>
                                                                            <option value="hand-spock" {{($value->icon == 'hand-spock') ? "selected":""}}>&#xf259; Hand spock</option>
                                                                            <option value='hand-stop-o' {{($value->icon == 'hand-stop-o') ? "selected":""}}>&#xf256; hand stop o</option>
                                                                            <option value="handshake" {{($value->icon == 'handshake') ? "selected":""}}>&#xf2b5; Handshake</option>
                                                                            <option value='hard-of-hearing' {{($value->icon == 'hard-of-hearing') ? "selected":""}}>&#xf2a4; hard of hearing</option>
                                                                            <option value='hashtag' {{($value->icon == 'hashtag') ? "selected":""}}>&#xf292; hashtag</option>
                                                                            <option value="hdd" {{($value->icon == 'hdd') ? "selected":""}}>&#xf0a0; Hdd</option>
                                                                            <option value='header' {{($value->icon == 'header') ? "selected":""}}>&#xf1dc; header</option>
                                                                            <option value='headphones' {{($value->icon == 'headphones') ? "selected":""}}>&#xf025; headphones</option>
                                                                            <option value="heart" {{($value->icon == 'heart') ? "selected":""}}>&#xf004; Heart</option>
                                                                            <option value='heart-o' {{($value->icon == 'heart-o') ? "selected":""}}>&#xf08a; heart o</option>
                                                                            <option value='heartbeat' {{($value->icon == 'heartbeat') ? "selected":""}}>&#xf21e; heartbeat</option>
                                                                            <option value='history' {{($value->icon == 'history') ? "selected":""}}>&#xf1da; history</option>
                                                                            <option value="home" {{($value->icon == 'home') ? "selected":""}}>&#xf015; Home</option>
                                                                            <option value="hospital" {{($value->icon == 'hospital') ? "selected":""}}>&#xf0f8; Hospital</option>
                                                                            <option value='hotel' {{($value->icon == 'hotel') ? "selected":""}}>&#xf236; hotel</option>
                                                                            <option value="hourglass" {{($value->icon == 'hourglass') ? "selected":""}}>&#xf254; Hourglass</option>
                                                                            <option value='hourglass-1' {{($value->icon == 'hourglass-1') ? "selected":""}}>&#xf251; hourglass 1</option>
                                                                            <option value='hourglass-2' {{($value->icon == 'hourglass-2') ? "selected":""}}>&#xf252; hourglass 2</option>
                                                                            <option value='hourglass-3' {{($value->icon == 'hourglass-3') ? "selected":""}}>&#xf253; hourglass 3</option>
                                                                            <option value='hourglass-end' {{($value->icon == 'hourglass-end') ? "selected":""}}>&#xf253; hourglass end</option>
                                                                            <option value='hourglass-half' {{($value->icon == 'hourglass-half') ? "selected":""}}>&#xf252; hourglass half</option>
                                                                            <option value='hourglass-o' {{($value->icon == 'hourglass-o') ? "selected":""}}>&#xf250; hourglass o</option>
                                                                            <option value='hourglass-start' {{($value->icon == 'hourglass-start') ? "selected":""}}>&#xf251; hourglass start</option>
                                                                            <option value='houzz' {{($value->icon == 'houzz') ? "selected":""}}>&#xf27c; houzz</option>
                                                                            <option value='html5' {{($value->icon == 'html5') ? "selected":""}}>&#xf13b; html5</option>


                                                                            <option value='i-cursor' {{($value->icon == 'i-cursor') ? "selected":""}}>&#xf246; i cursor</option>
                                                                            <option value='id-badge' {{($value->icon == 'id-badge') ? "selected":""}}>&#xf2c1; id badge</option>
                                                                            <option value="id-card" {{($value->icon == 'id-card') ? "selected":""}}>&#xf2c2; Id card </option>
                                                                            <option value='id-card-o' {{($value->icon == 'id-card-o') ? "selected":""}}>&#xf2c3; id card o</option>
                                                                            <option value='ils' {{($value->icon == 'ils') ? "selected":""}}>&#xf20b; ils</option>
                                                                            <option value="image" {{($value->icon == 'image') ? "selected":""}}>&#xf03e; Image</option>
                                                                            <option value='imdb' {{($value->icon == 'imdb') ? "selected":""}}>&#xf2d8; imdb</option>
                                                                            <option value='inbox' {{($value->icon == 'inbox') ? "selected":""}}>&#xf01c; inbox</option>
                                                                            <option value='indent' {{($value->icon == 'indent') ? "selected":""}}>&#xf03c; indent</option>
                                                                            <option value='industry' {{($value->icon == 'industry') ? "selected":""}}>&#xf275; industry</option>
                                                                            <option value='info' {{($value->icon == 'info') ? "selected":""}}>&#xf129; info</option>
                                                                            <option value='info-circle' {{($value->icon == 'info-circle') ? "selected":""}}>&#xf05a; info circle</option>
                                                                            <option value='inr' {{($value->icon == 'inr') ? "selected":""}}>&#xf156; inr</option>
                                                                            <option value='instagram' {{($value->icon == 'instagram') ? "selected":""}}>&#xf16d; instagram</option>
                                                                            <option value='institution' {{($value->icon == 'institution') ? "selected":""}}>&#xf19c; institution</option>
                                                                            <option value='internet-explorer' {{($value->icon == 'internet-explorer') ? "selected":""}}>&#xf26b; internet explorer</option>
                                                                            <option value='intersex' {{($value->icon == 'intersex') ? "selected":""}}>&#xf224; intersex</option>
                                                                            <option value='ioxhost' {{($value->icon == 'ioxhost') ? "selected":""}}>&#xf208; ioxhost</option>
                                                                            <option value='italic' {{($value->icon == 'italic') ? "selected":""}}>&#xf033; italic</option>

                                                                            <option value='joomla' {{($value->icon == 'joomla') ? "selected":""}}>&#xf1aa; joomla</option>
                                                                            <option value='jpy' {{($value->icon == 'jpy') ? "selected":""}}>&#xf157; jpy</option>
                                                                            <option value='jsfiddle' {{($value->icon == 'jsfiddle') ? "selected":""}}>&#xf1cc; jsfiddle</option>

                                                                            <option value='key' {{($value->icon == 'key') ? "selected":""}}>&#xf084; key</option>
                                                                            <option value="keyboard" {{($value->icon == 'keyboard') ? "selected":""}}>&#xf11c; Keyboard</option>
                                                                            <option value='krw' {{($value->icon == 'krw') ? "selected":""}}>&#xf159; krw</option>


                                                                            <option value='language' {{($value->icon == 'language') ? "selected":""}}>&#xf1ab; language</option>
                                                                            <option value='laptop' {{($value->icon == 'laptop') ? "selected":""}}>&#xf109; laptop</option>
                                                                            <option value='lastfm' {{($value->icon == 'lastfm') ? "selected":""}}>&#xf202; lastfm</option>
                                                                            <option value='lastfm-square' {{($value->icon == 'lastfm-square') ? "selected":""}}>&#xf203; lastfm square</option>
                                                                            <option value='leaf' {{($value->icon == 'leaf') ? "selected":""}}>&#xf06c; leaf</option>
                                                                            <option value='leanpub' {{($value->icon == 'leanpub') ? "selected":""}}>&#xf212; leanpub</option>
                                                                            <option value='legal' {{($value->icon == 'legal') ? "selected":""}}>&#xf0e3; legal</option>
                                                                            <option value="lemon" {{($value->icon == 'lemon') ? "selected":""}}>&#xf094; Lemon</option>
                                                                            <option value='level-down' {{($value->icon == 'level-down') ? "selected":""}}>&#xf149; level down</option>
                                                                            <option value='level-up' {{($value->icon == 'level-up') ? "selected":""}}>&#xf148; level up</option>
                                                                            <option value="life-ring" {{($value->icon == 'life-ring') ? "selected":""}}>&#xf1cd; Life ring</option>
                                                                            <option value="lightbulb" {{($value->icon == 'lightbulb') ? "selected":""}}>&#xf0eb; Lightbulb</option>
                                                                            <option value='line-chart' {{($value->icon == 'line-chart') ? "selected":""}}>&#xf201; line chart</option>
                                                                            <option value='link' {{($value->icon == 'link') ? "selected":""}}>&#xf0c1; link</option>
                                                                            <option value='linkedin' {{($value->icon == 'linkedin') ? "selected":""}}>&#xf0e1; linkedin</option>
                                                                            <option value='linkedin-square' {{($value->icon == 'linkedin-square') ? "selected":""}}>&#xf08c; linkedin square</option>
                                                                            <option value='linode' {{($value->icon == 'linode') ? "selected":""}}>&#xf2b8; linode</option>
                                                                            <option value='linux' {{($value->icon == 'linux') ? "selected":""}}>&#xf17c; linux</option>
                                                                            <option value='list' {{($value->icon == 'list') ? "selected":""}}>&#xf03a; list</option>
                                                                            <option value="list-alt" {{($value->icon == 'list-alt') ? "selected":""}}>&#xf022; List alt</option>
                                                                            <option value='list-ol' {{($value->icon == 'list-ol') ? "selected":""}}>&#xf0cb; list ol</option>
                                                                            <option value='list-ul' {{($value->icon == 'list-ul') ? "selected":""}}>&#xf0ca; list ul</option>
                                                                            <option value='location-arrow' {{($value->icon == 'location-arrow') ? "selected":""}}>&#xf124; location arrow</option>
                                                                            <option value='lock' {{($value->icon == 'lock') ? "selected":""}}>&#xf023; lock</option>
                                                                            <option value='long-arrow-down' {{($value->icon == 'long-arrow-down') ? "selected":""}}>&#xf175; long arrow down</option>
                                                                            <option value='long-arrow-left' {{($value->icon == 'long-arrow-left') ? "selected":""}}>&#xf177; long arrow left</option>
                                                                            <option value='long-arrow-right' {{($value->icon == 'long-arrow-right') ? "selected":""}}>&#xf178; long arrow right</option>
                                                                            <option value='long-arrow-up' {{($value->icon == 'long-arrow-up') ? "selected":""}}>&#xf176; long arrow up</option>
                                                                            <option value='low-vision' {{($value->icon == 'low-vision') ? "selected":""}}>&#xf2a8; low vision</option>

                                                                            <option value='magic' {{($value->icon == 'magic') ? "selected":""}}>&#xf0d0; magic</option>
                                                                            <option value='magnet' {{($value->icon == 'magnet') ? "selected":""}}>&#xf076; magnet</option>
                                                                            <option value='mail-forward' {{($value->icon == 'mail-forward') ? "selected":""}}>&#xf064; mail forward</option>
                                                                            <option value='mail-reply' {{($value->icon == 'mail-reply') ? "selected":""}}>&#xf112; mail reply</option>
                                                                            <option value='mail-reply-all' {{($value->icon == 'mail-reply-all') ? "selected":""}}>&#xf122; mail reply all</option>
                                                                            <option value='male' {{($value->icon == 'male') ? "selected":""}}>&#xf183; male</option>
                                                                            <option value="map" {{($value->icon == 'map') ? "selected":""}}>&#xf279; Map</option>
                                                                            <option value='map-marker' {{($value->icon == 'map-marker') ? "selected":""}}>&#xf041; map marker</option>
                                                                            <option value='map-o' {{($value->icon == 'map-o') ? "selected":""}}>&#xf278; map o</option>
                                                                            <option value='map-pin' {{($value->icon == 'map-pin') ? "selected":""}}>&#xf276; map pin</option>
                                                                            <option value='map-signs' {{($value->icon == 'map-signs') ? "selected":""}}>&#xf277; map signs</option>
                                                                            <option value='mars' {{($value->icon == 'mars') ? "selected":""}}>&#xf222; mars</option>
                                                                            <option value='mars-double' {{($value->icon == 'mars-double') ? "selected":""}}>&#xf227; mars double</option>
                                                                            <option value='mars-stroke' {{($value->icon == 'mars-stroke') ? "selected":""}}>&#xf229; mars stroke</option>
                                                                            <option value='mars-stroke-h' {{($value->icon == 'mars-stroke-h') ? "selected":""}}>&#xf22b; mars stroke h</option>
                                                                            <option value='mars-stroke-v' {{($value->icon == 'mars-stroke-v') ? "selected":""}}>&#xf22a; mars stroke v</option>
                                                                            <option value='maxcdn' {{($value->icon == 'maxcdn') ? "selected":""}}>&#xf136; maxcdn</option>
                                                                            <option value='meanpath' {{($value->icon == 'meanpath') ? "selected":""}}>&#xf20c; meanpath</option>
                                                                            <option value='medium' {{($value->icon == 'medium') ? "selected":""}}>&#xf23a; medium</option>
                                                                            <option value='medkit' {{($value->icon == 'medkit') ? "selected":""}}>&#xf0fa; medkit</option>
                                                                            <option value='meetup' {{($value->icon == 'meetup') ? "selected":""}}>&#xf2e0; meetup</option>
                                                                            <option value="meh" {{($value->icon == 'meh') ? "selected":""}}>&#xf11a; Meh</option>
                                                                            <option value='mercury' {{($value->icon == 'mercury') ? "selected":""}}>&#xf223; mercury</option>
                                                                            <option value='microchip' {{($value->icon == 'microchip') ? "selected":""}}>&#xf2db; microchip</option>
                                                                            <option value='microphone' {{($value->icon == 'microphone') ? "selected":""}}>&#xf130; microphone</option>
                                                                            <option value='microphone-slash' {{($value->icon == 'microphone-slash') ? "selected":""}}>&#xf131; microphone slash</option>
                                                                            <option value='minus' {{($value->icon == 'minus') ? "selected":""}}>&#xf068; minus</option>
                                                                            <option value='minus-circle' {{($value->icon == 'minus-circle') ? "selected":""}}>&#xf056; minus circle</option>
                                                                            <option value="minus-square" {{($value->icon == 'minus-square') ? "selected":""}}>&#xf146; Minus square</option>
                                                                            <option value='minus-square-o' {{($value->icon == 'minus-square-o') ? "selected":""}}>&#xf147; minus square o</option>
                                                                            <option value='mixcloud' {{($value->icon == 'mixcloud') ? "selected":""}}>&#xf289; mixcloud</option>
                                                                            <option value='mobile' {{($value->icon == 'mobile') ? "selected":""}}>&#xf10b; mobile</option>
                                                                            <option value='mobile-phone' {{($value->icon == 'mobile-phone') ? "selected":""}}>&#xf10b; mobile phone</option>
                                                                            <option value='modx' {{($value->icon == 'modx') ? "selected":""}}>&#xf285; modx</option>
                                                                            <option value='money' {{($value->icon == 'money') ? "selected":""}}>&#xf0d6; money</option>
                                                                            <option value="moon" {{($value->icon == 'moon') ? "selected":""}}>&#xf186; Moon</option>
                                                                            <option value='mortar-board' {{($value->icon == 'mortar-board') ? "selected":""}}>&#xf19d; mortar board</option>
                                                                            <option value='motorcycle' {{($value->icon == 'motorcycle') ? "selected":""}}>&#xf21c; motorcycle</option>
                                                                            <option value='mouse-pointer' {{($value->icon == 'mouse-pointer') ? "selected":""}}>&#xf245; mouse pointer</option>
                                                                            <option value='music' {{($value->icon == 'music') ? "selected":""}}>&#xf001; music</option>

                                                                            <option value='navicon' {{($value->icon == 'navicon') ? "selected":""}}>&#xf0c9; navicon</option>
                                                                            <option value='neuter' {{($value->icon == 'neuter') ? "selected":""}}>&#xf22c; neuter</option>
                                                                            <option value="newspaper" {{($value->icon == 'newspaper') ? "selected":""}}>&#xf1ea; Newspaper</option>

                                                                            <option value="object-group" {{($value->icon == 'object-group') ? "selected":""}}>&#xf247; Object group</option>
                                                                            <option value="object-upgroup" {{($value->icon == 'object-upgroup') ? "selected":""}}>&#xf248; Object upgroup</option>
                                                                            <option value='odnoklassniki' {{($value->icon == 'odnoklassniki') ? "selected":""}}>&#xf263; odnoklassniki</option>
                                                                            <option value='odnoklassniki-square' {{($value->icon == 'odnoklassniki-square') ? "selected":""}}>&#xf264; odnoklassniki square</option>
                                                                            <option value='opencart' {{($value->icon == 'opencart') ? "selected":""}}>&#xf23d; opencart</option>
                                                                            <option value='openid' {{($value->icon == 'openid') ? "selected":""}}>&#xf19b; openid</option>
                                                                            <option value='opera' {{($value->icon == 'opera') ? "selected":""}}>&#xf26a; opera</option>
                                                                            <option value='optin-monster' {{($value->icon == 'optin-monster') ? "selected":""}}>&#xf23c; optin monster</option>
                                                                            <option value='outdent' {{($value->icon == 'outdent') ? "selected":""}}>&#xf03b; outdent</option>

                                                                            <option value='pagelines' {{($value->icon == 'pagelines') ? "selected":""}}>&#xf18c; pagelines</option>
                                                                            <option value='paint-brush' {{($value->icon == 'paint-brush') ? "selected":""}}>&#xf1fc; paint brush</option>
                                                                            <option value="paper-plane" {{($value->icon == 'paper-plane') ? "selected":""}}>&#xf1d8; Paper plane</option>
                                                                            <option value='paper-plane-o' {{($value->icon == 'paper-plane-o') ? "selected":""}}>&#xf1d9; paper plane o</option>
                                                                            <option value='paperclip' {{($value->icon == 'paperclip') ? "selected":""}}>&#xf0c6; paperclip</option>
                                                                            <option value='paragraph' {{($value->icon == 'paragraph') ? "selected":""}}>&#xf1dd; paragraph</option>
                                                                            <option value='paste' {{($value->icon == 'paste') ? "selected":""}}>&#xf0ea; paste</option>
                                                                            <option value='pause' {{($value->icon == 'pause') ? "selected":""}}>&#xf04c; pause</option>
                                                                            <option value="pause-circle" {{($value->icon == 'pause-circle') ? "selected":""}}>&#xf28b; Pause circle</option>
                                                                            <option value='pause-circle-o' {{($value->icon == 'pause-circle-o') ? "selected":""}}>&#xf28c; pause circle o</option>
                                                                            <option value='paw' {{($value->icon == 'paw') ? "selected":""}}>&#xf1b0; paw</option>
                                                                            <option value='paypal' {{($value->icon == 'paypal') ? "selected":""}}>&#xf1ed; paypal</option>
                                                                            <option value='pencil' {{($value->icon == 'pencil') ? "selected":""}}>&#xf040; pencil</option>
                                                                            <option value='pencil-square' {{($value->icon == 'pencil square') ? "selected":""}}>&#xf14b; pencil square</option>
                                                                            <option value='pencil-square-o' {{($value->icon == 'pencil square o') ? "selected":""}}>&#xf044; pencil square o</option>
                                                                            <option value='percent' {{($value->icon == 'percent') ? "selected":""}}>&#xf295; percent</option>
                                                                            <option value='phone' {{($value->icon == 'phone') ? "selected":""}}>&#xf095; phone</option>
                                                                            <option value='phone-square' {{($value->icon == 'phone-square') ? "selected":""}}>&#xf098; phone square</option>
                                                                            <option value='photo' {{($value->icon == 'photo') ? "selected":""}}>&#xf03e; photo</option>
                                                                            <option value='picture-o' {{($value->icon == 'picture-o') ? "selected":""}}>&#xf03e; picture o</option>
                                                                            <option value='pie-chart' {{($value->icon == 'pie-chart') ? "selected":""}}>&#xf200; pie chart</option>
                                                                            <option value='pied-piper' {{($value->icon == 'pied-piper') ? "selected":""}}>&#xf2ae; pied piper</option>
                                                                            <option value='pied-piper-alt' {{($value->icon == 'pied-piper-alt') ? "selected":""}}>&#xf1a8; pied piper alt</option>
                                                                            <option value='pied-piper-pp' {{($value->icon == 'pied-piper-pp') ? "selected":""}}>&#xf1a7; pied piper pp</option>
                                                                            <option value='pinterest' {{($value->icon == 'pinterest') ? "selected":""}}>&#xf0d2; pinterest</option>
                                                                            <option value='pinterest-p' {{($value->icon == 'pinterest-p') ? "selected":""}}>&#xf231; pinterest p</option>
                                                                            <option value='pinterest-square' {{($value->icon == 'pinterest-square') ? "selected":""}}>&#xf0d3; pinterest square</option>
                                                                            <option value='plane' {{($value->icon == 'plane') ? "selected":""}}>&#xf072; plane</option>
                                                                            <option value='play' {{($value->icon == 'play') ? "selected":""}}>&#xf04b; play</option>
                                                                            <option value="play-circle" {{($value->icon == 'play-circle') ? "selected":""}}>&#xf144; Play circle </option>
                                                                            <option value='play-circle-o' {{($value->icon == 'play-circle-o') ? "selected":""}}>&#xf01d; play circle o</option>
                                                                            <option value='plug' {{($value->icon == 'plug') ? "selected":""}}>&#xf1e6; plug</option>
                                                                            <option value='plus' {{($value->icon == 'plus') ? "selected":""}}>&#xf067; plus</option>
                                                                            <option value='plus-circle' {{($value->icon == 'plus-circle') ? "selected":""}}>&#xf055; plus circle</option>
                                                                            <option value="plus-square" {{($value->icon == 'plus-square') ? "selected":""}}>&#xf0fe; Plus square</option>
                                                                            <option value='plus-square-o' {{($value->icon == 'plus-square-o') ? "selected":""}}>&#xf196; plus square o</option>
                                                                            <option value='podcast' {{($value->icon == 'podcast') ? "selected":""}}>&#xf2ce; podcast</option>
                                                                            <option value='power-off' {{($value->icon == 'power-off') ? "selected":""}}>&#xf011; power off</option>
                                                                            <option value='print' {{($value->icon == 'print') ? "selected":""}}>&#xf02f; print</option>
                                                                            <option value='product-hunt' {{($value->icon == 'product-hunt') ? "selected":""}}>&#xf288; product hunt</option>
                                                                            <option value='puzzle-piece' {{($value->icon == 'puzzle-piece') ? "selected":""}}>&#xf12e; puzzle piece</option>

                                                                            <option value='qq' {{($value->icon == 'qq') ? "selected":""}}>&#xf1d6; qq</option>
                                                                            <option value='qrcode' {{($value->icon == 'qrcode') ? "selected":""}}>&#xf029; qrcode</option>
                                                                            <option value='question' {{($value->icon == 'question') ? "selected":""}}>&#xf128; question</option>
                                                                            <option value="question-circle" {{($value->icon == 'question-circle') ? "selected":""}}>&#xf059; Question circle</option>
                                                                            <option value='question-circle-o' {{($value->icon == 'question-circle-o') ? "selected":""}}>&#xf29c; question circle o</option>
                                                                            <option value='quora' {{($value->icon == 'quora') ? "selected":""}}>&#xf2c4; quora</option>
                                                                            <option value='quote-left' {{($value->icon == 'quote-left') ? "selected":""}}>&#xf10d; quote left</option>
                                                                            <option value='quote-right' {{($value->icon == 'quote-right') ? "selected":""}}>&#xf10e; quote right</option>

                                                                            <option value='ra' {{($value->icon == 'ra') ? "selected":""}}>&#xf1d0; ra</option>
                                                                            <option value='random' {{($value->icon == 'random') ? "selected":""}}>&#xf074; random</option>
                                                                            <option value='ravelry' {{($value->icon == 'ravelry') ? "selected":""}}>&#xf2d9; ravelry</option>
                                                                            <option value='rebel' {{($value->icon == 'rebel') ? "selected":""}}>&#xf1d0; rebel</option>
                                                                            <option value='recycle' {{($value->icon == 'recycle') ? "selected":""}}>&#xf1b8; recycle</option>
                                                                            <option value='reddit' {{($value->icon == 'reddit') ? "selected":""}}>&#xf1a1; reddit</option>
                                                                            <option value='reddit-alien' {{($value->icon == 'reddit-alien') ? "selected":""}}>&#xf281; reddit alien</option>
                                                                            <option value='reddit-square' {{($value->icon == 'reddit-square') ? "selected":""}}>&#xf1a2; reddit square</option>
                                                                            <option value='refresh' {{($value->icon == 'refresh') ? "selected":""}}>&#xf021; refresh</option>
                                                                            <option value="registered" {{($value->icon == 'registered') ? "selected":""}}>&#xf25d; Registered</option>
                                                                            <option value='remove' {{($value->icon == 'remove') ? "selected":""}}>&#xf00d; remove</option>
                                                                            <option value='renren' {{($value->icon == 'renren') ? "selected":""}}>&#xf18b; renren</option>
                                                                            <option value='reorder' {{($value->icon == 'reorder') ? "selected":""}}>&#xf0c9; reorder</option>
                                                                            <option value='repeat' {{($value->icon == 'repeat') ? "selected":""}}>&#xf01e; repeat</option>
                                                                            <option value='reply' {{($value->icon == 'reply') ? "selected":""}}>&#xf112; reply</option>
                                                                            <option value='reply-all' {{($value->icon == 'reply-all') ? "selected":""}}>&#xf122; reply all</option>
                                                                            <option value='resistance' {{($value->icon == 'resistance') ? "selected":""}}>&#xf1d0; resistance</option>
                                                                            <option value='retweet' {{($value->icon == 'retweet') ? "selected":""}}>&#xf079; retweet</option>
                                                                            <option value='rmb' {{($value->icon == 'rmb') ? "selected":""}}>&#xf157; rmb</option>
                                                                            <option value='road' {{($value->icon == 'road') ? "selected":""}}>&#xf018; road</option>
                                                                            <option value='rocket' {{($value->icon == 'rocket') ? "selected":""}}>&#xf135; rocket</option>
                                                                            <option value='rotate-left' {{($value->icon == 'rotate-left') ? "selected":""}}>&#xf0e2; rotate left</option>
                                                                            <option value='rotate-right' {{($value->icon == 'rotate-right') ? "selected":""}}>&#xf01e; rotate right</option>
                                                                            <option value='rouble' {{($value->icon == 'rouble') ? "selected":""}}>&#xf158; rouble</option>
                                                                            <option value='rss' {{($value->icon == 'rss') ? "selected":""}}>&#xf09e; rss</option>
                                                                            <option value='rss-square' {{($value->icon == 'rss-square') ? "selected":""}}>&#xf143; rss square</option>
                                                                            <option value='rub' {{($value->icon == 'rub') ? "selected":""}}>&#xf158; rub</option>
                                                                            <option value='ruble' {{($value->icon == 'ruble') ? "selected":""}}>&#xf158; ruble</option>
                                                                            <option value='rupee' {{($value->icon == 'rupee') ? "selected":""}}>&#xf156; rupee</option>


                                                                            <option value='s15' {{($value->icon == 's15') ? "selected":""}}>&#xf2cd; s15</option>
                                                                            <option value='safari' {{($value->icon == 'safari') ? "selected":""}}>&#xf267; safari</option>
                                                                            <option value="save" {{($value->icon == 'save') ? "selected":""}}>&#xf0c7; Save</option>
                                                                            <option value='scissors' {{($value->icon == 'scissors') ? "selected":""}}>&#xf0c4; scissors</option>
                                                                            <option value='scribd' {{($value->icon == 'scribd') ? "selected":""}}>&#xf28a; scribd</option>
                                                                            <option value='search' {{($value->icon == 'search') ? "selected":""}}>&#xf002; search</option>
                                                                            <option value='search-minus' {{($value->icon == 'search-minus') ? "selected":""}}>&#xf010; search minus</option>
                                                                            <option value='search-plus' {{($value->icon == 'search-plus') ? "selected":""}}>&#xf00e; search plus</option>
                                                                            <option value='sellsy' {{($value->icon == 'sellsy') ? "selected":""}}>&#xf213; sellsy</option>
                                                                            <option value='send' {{($value->icon == 'send') ? "selected":""}}>&#xf1d8; send</option>
                                                                            <option value='send-o' {{($value->icon == 'send-o') ? "selected":""}}>&#xf1d9; send o</option>
                                                                            <option value='server' {{($value->icon == 'server') ? "selected":""}}>&#xf233; server</option>
                                                                            <option value='share' {{($value->icon == 'share') ? "selected":""}}>&#xf064; share</option>
                                                                            <option value='share-alt' {{($value->icon == 'share-alt') ? "selected":""}}>&#xf1e0; share alt</option>
                                                                            <option value='share-alt-square' {{($value->icon == 'share-alt-square') ? "selected":""}}>&#xf1e1; share alt square</option>
                                                                            <option value="share-square" {{($value->icon == 'share-square') ? "selected":""}}>&#xf14d; Share square</option>
                                                                            <option value='share-square-o' {{($value->icon == 'share-square-o') ? "selected":""}}>&#xf045; share square o</option>
                                                                            <option value='shekel' {{($value->icon == 'shekel') ? "selected":""}}>&#xf20b; shekel</option>
                                                                            <option value='sheqel' {{($value->icon == 'sheqel') ? "selected":""}}>&#xf20b; sheqel</option>
                                                                            <option value='shield' {{($value->icon == 'shield') ? "selected":""}}>&#xf132; shield</option>
                                                                            <option value='ship' {{($value->icon == 'ship') ? "selected":""}}>&#xf21a; ship</option>
                                                                            <option value='shirtsinbulk' {{($value->icon == 'shirtsinbulk') ? "selected":""}}>&#xf214; shirtsinbulk</option>
                                                                            <option value='shopping-bag' {{($value->icon == 'shopping-bag') ? "selected":""}}>&#xf290; shopping bag</option>
                                                                            <option value='shopping-basket' {{($value->icon == 'shopping-basket') ? "selected":""}}>&#xf291; shopping basket</option>
                                                                            <option value='shopping-cart' {{($value->icon == 'shopping-cart') ? "selected":""}}>&#xf07a; shopping cart</option>
                                                                            <option value='shower' {{($value->icon == 'shower') ? "selected":""}}>&#xf2cc; shower</option>
                                                                            <option value='sign-in' {{($value->icon == 'sign-in') ? "selected":""}}>&#xf090; sign in</option>
                                                                            <option value='sign-language' {{($value->icon == 'sign-language') ? "selected":""}}>&#xf2a7; sign language</option>
                                                                            <option value='sign-out' {{($value->icon == 'sign-out') ? "selected":""}}>&#xf08b; sign out</option>
                                                                            <option value='signal' {{($value->icon == 'signal') ? "selected":""}}>&#xf012; signal</option>
                                                                            <option value='signing' {{($value->icon == 'signing') ? "selected":""}}>&#xf2a7; signing</option>
                                                                            <option value='simplybuilt' {{($value->icon == 'simplybuilt') ? "selected":""}}>&#xf215; simplybuilt</option>
                                                                            <option value='sitemap' {{($value->icon == 'sitemap') ? "selected":""}}>&#xf0e8; sitemap</option>
                                                                            <option value='skyatlas' {{($value->icon == 'skyatlas') ? "selected":""}}>&#xf216; skyatlas</option>
                                                                            <option value='skype' {{($value->icon == 'skype') ? "selected":""}}>&#xf17e; skype</option>
                                                                            <option value='slack' {{($value->icon == 'slack') ? "selected":""}}>&#xf198; slack</option>
                                                                            <option value='sliders' {{($value->icon == 'sliders') ? "selected":""}}>&#xf1de; sliders</option>
                                                                            <option value='slideshare' {{($value->icon == 'slideshare') ? "selected":""}}>&#xf1e7; slideshare</option>
                                                                            <option value="smile" {{($value->icon == 'smile') ? "selected":""}}>&#xf118; Smile</option>
                                                                            <option value="snowflake" {{($value->icon == 'snowflake') ? "selected":""}}>&#xf2dc; Snowflake</option>
                                                                            <option value='soccer-ball-o' {{($value->icon == 'soccer-ball-o') ? "selected":""}}>&#xf1e3; soccer ball o</option>
                                                                            <option value='soundcloud' {{($value->icon == 'soundcloud') ? "selected":""}}>&#xf1be; soundcloud</option>
                                                                            <option value='space-shuttle' {{($value->icon == 'space-shuttle') ? "selected":""}}>&#xf197; space shuttle</option>
                                                                            <option value='spinner' {{($value->icon == 'spinner') ? "selected":""}}>&#xf110; spinner</option>
                                                                            <option value='spoon' {{($value->icon == 'spoon') ? "selected":""}}>&#xf1b1; spoon</option>
                                                                            <option value="square" {{($value->icon == 'square') ? "selected":""}}>&#xf0c8; Square</option>
                                                                            <option value='square-o' {{($value->icon == 'square-o') ? "selected":""}}>&#xf096; square o</option>
                                                                            <option value='stack-exchange' {{($value->icon == 'stack-exchange') ? "selected":""}}>&#xf18d; stack exchange</option>
                                                                            <option value='stack-overflow' {{($value->icon == 'stack-overflow') ? "selected":""}}>&#xf16c; stack overflow</option>
                                                                            <option value="star" {{($value->icon == 'star') ? "selected":""}}>&#xf005; Star</option>
                                                                            <option value="star-half" {{($value->icon == 'star-half') ? "selected":""}}>&#xf089; Star half</option>
                                                                            <option value='star-half-empty' {{($value->icon == 'star-half-empty') ? "selected":""}}>&#xf123; star half empty</option>
                                                                            <option value='star-half-full' {{($value->icon == 'star-half-full') ? "selected":""}}>&#xf123; star half full</option>
                                                                            <option value='star-half-o' {{($value->icon == 'star-half-o') ? "selected":""}}>&#xf123; star half o</option>
                                                                            <option value='star-o' {{($value->icon == 'star-o') ? "selected":""}}>&#xf006; star o</option>
                                                                            <option value='steam' {{($value->icon == 'steam') ? "selected":""}}>&#xf1b6; steam</option>
                                                                            <option value='steam-square' {{($value->icon == 'steam-square') ? "selected":""}}>&#xf1b7; steam square</option>
                                                                            <option value='step-backward' {{($value->icon == 'step-backward') ? "selected":""}}>&#xf048; step backward</option>
                                                                            <option value='step-forward' {{($value->icon == 'step-forward') ? "selected":""}}>&#xf051; step forward</option>
                                                                            <option value='stethoscope' {{($value->icon == 'stethoscope') ? "selected":""}}>&#xf0f1; stethoscope</option>
                                                                            <option value="sticky-note" {{($value->icon == 'sticky-note') ? "selected":""}}>&#xf249; sticky note</option>
                                                                            <option value='sticky-note-o' {{($value->icon == 'sticky-note-o') ? "selected":""}}>&#xf24a; sticky note o</option>
                                                                            <option value='stop' {{($value->icon == 'stop') ? "selected":""}}>&#xf04d; stop</option>
                                                                            <option value="stop-circle" {{($value->icon == 'stop-circle') ? "selected":""}}>&#xf28d; Stop circle</option>
                                                                            <option value='stop-circle-o' {{($value->icon == 'stop-circle-o') ? "selected":""}}>&#xf28e; stop circle o</option>
                                                                            <option value='street-view' {{($value->icon == 'street-view') ? "selected":""}}>&#xf21d; street-view</option>
                                                                            <option value='strikethrough' {{($value->icon == 'strikethrough') ? "selected":""}}>&#xf0cc; strikethrough</option>
                                                                            <option value='stumbleupon' {{($value->icon == 'stumbleupon') ? "selected":""}}>&#xf1a4; stumbleupon</option>
                                                                            <option value='stumbleupon-circle' {{($value->icon == 'stumbleupon-circle') ? "selected":""}}>&#xf1a3; stumbleupon circle</option>
                                                                            <option value='subscript' {{($value->icon == 'subscript') ? "selected":""}}>&#xf12c; subscript</option>
                                                                            <option value='subway' {{($value->icon == 'subway') ? "selected":""}}>&#xf239; subway</option>
                                                                            <option value='suitcase' {{($value->icon == 'suitcase') ? "selected":""}}>&#xf0f2; suitcase</option>
                                                                            <option value="sun" {{($value->icon == 'sun') ? "selected":""}}>&#xf185; Sun</option>
                                                                            <option value='superpowers' {{($value->icon == 'superpowers') ? "selected":""}}>&#xf2dd; superpowers</option>
                                                                            <option value='superscript' {{($value->icon == 'superscript') ? "selected":""}}>&#xf12b; superscript</option>
                                                                            <option value='support' {{($value->icon == 'support') ? "selected":""}}>&#xf1cd; support</option>
                                                                            <option value="surprise" {{($value->icon == 'surprise') ? "selected":""}}>&#xf5c2; Surprise </option>


                                                                            <option value='table' {{($value->icon == 'table') ? "selected":""}}>&#xf0ce; table</option>
                                                                            <option value='tablet' {{($value->icon == 'tablet') ? "selected":""}}>&#xf10a; tablet</option>
                                                                            <option value='tachometer' {{($value->icon == 'tachometer') ? "selected":""}}>&#xf0e4; tachometer</option>
                                                                            <option value='tag' {{($value->icon == 'tag') ? "selected":""}}>&#xf02b; tag</option>
                                                                            <option value='tags' {{($value->icon == 'tags') ? "selected":""}}>&#xf02c; tags</option>
                                                                            <option value='tasks' {{($value->icon == 'tasks') ? "selected":""}}>&#xf0ae; tasks</option>
                                                                            <option value='taxi' {{($value->icon == 'taxi') ? "selected":""}}>&#xf1ba; taxi</option>
                                                                            <option value='telegram' {{($value->icon == 'telegram') ? "selected":""}}>&#xf2c6; telegram</option>
                                                                            <option value='television' {{($value->icon == 'television') ? "selected":""}}>&#xf26c; television</option>
                                                                            <option value='tencent-weibo' {{($value->icon == 'tencent-weibo') ? "selected":""}}>&#xf1d5; tencent weibo</option>
                                                                            <option value='terminal' {{($value->icon == 'terminal') ? "selected":""}}>&#xf120; terminal</option>
                                                                            <option value='themeisle' {{($value->icon == 'themeisle') ? "selected":""}}>&#xf2b2; themeisle</option>
                                                                            <option value='thermometer' {{($value->icon == 'thermometer') ? "selected":""}}>&#xf2c7; thermometer</option>
                                                                            <option value='thumb-tack' {{($value->icon == 'thumb-tack') ? "selected":""}}>&#xf08d; thumb tack</option>
                                                                            <option value="thumbs-down" {{($value->icon == 'thumbs-down') ? "selected":""}}>&#xf165; Thumbs down</option>
                                                                            <option value='thumbs-o-down' {{($value->icon == 'thumbs-o-down') ? "selected":""}}>&#xf088; thumbs o down</option>
                                                                            <option value='thumbs-o-up' {{($value->icon == 'thumbs-o-up') ? "selected":""}}>&#xf087; thumbs o up</option>
                                                                            <option value='thumbs-up' {{($value->icon == 'thumbs-up') ? "selected":""}}>&#xf164; thumbs up</option>
                                                                            <option value='ticket' {{($value->icon == 'ticket') ? "selected":""}}>&#xf145; ticket</option>
                                                                            <option value='times' {{($value->icon == 'times') ? "selected":""}}>&#xf00d; times</option>
                                                                            <option value="times-circle" {{($value->icon == 'times-circle') ? "selected":""}}>&#xf057; Times circle</option>
                                                                            <option value='times-circle-o' {{($value->icon == 'times-circle-o') ? "selected":""}}>&#xf05c; times circle o</option>
                                                                            <option value='times-rectangle' {{($value->icon == 'times-rectangle') ? "selected":""}}>&#xf2d3; times rectangle</option>
                                                                            <option value='times-rectangle-o' {{($value->icon == 'times-rectangle-o') ? "selected":""}}>&#xf2d4; times rectangle o</option>
                                                                            <option value='tint' {{($value->icon == 'tint') ? "selected":""}}>&#xf043; tint</option>
                                                                            <option value='trademark' {{($value->icon == 'trademark') ? "selected":""}}>&#xf25c; trademark</option>
                                                                            <option value='train' {{($value->icon == 'train') ? "selected":""}}>&#xf238; train</option>
                                                                            <option value='transgender' {{($value->icon == 'transgender') ? "selected":""}}>&#xf224; transgender</option>
                                                                            <option value='transgender-alt' {{($value->icon == 'transgender-alt') ? "selected":""}}>&#xf225; transgender alt</option>
                                                                            <option value='trash' {{($value->icon == 'trash') ? "selected":""}}>&#xf1f8; trash</option>
                                                                            <option value='trash-o' {{($value->icon == 'trash-o') ? "selected":""}}>&#xf014; trash o</option>
                                                                            <option value='tree' {{($value->icon == 'tree') ? "selected":""}}>&#xf1bb; tree</option>
                                                                            <option value='trello' {{($value->icon == 'trello') ? "selected":""}}>&#xf181; trello</option>
                                                                            <option value='tripadvisor' {{($value->icon == 'tripadvisor') ? "selected":""}}>&#xf262; tripadvisor</option>
                                                                            <option value='trophy' {{($value->icon == 'trophy') ? "selected":""}}>&#xf091; trophy</option>
                                                                            <option value='truck' {{($value->icon == 'truck') ? "selected":""}}>&#xf0d1; truck</option>
                                                                            <option value='try' {{($value->icon == 'try') ? "selected":""}}>&#xf195; try</option>
                                                                            <option value='tty' {{($value->icon == 'tty') ? "selected":""}}>&#xf1e4; tty</option>
                                                                            <option value='tumblr' {{($value->icon == 'tumblr') ? "selected":""}}>&#xf173; tumblr</option>
                                                                            <option value='turkish-lira' {{($value->icon == 'turkish-lira') ? "selected":""}}>&#xf195; turkish lira</option>
                                                                            <option value='tv' {{($value->icon == 'tv') ? "selected":""}}>&#xf26c; tv</option>
                                                                            <option value='twitch' {{($value->icon == 'twitch') ? "selected":""}}>&#xf1e8; twitch</option>
                                                                            <option value='twitter' {{($value->icon == 'twitter') ? "selected":""}}>&#xf099; twitter</option>


                                                                            <option value='umbrella' {{($value->icon == 'umbrella') ? "selected":""}}>&#xf0e9; umbrella</option>
                                                                            <option value='underline' {{($value->icon == 'underline') ? "selected":""}}>&#xf0cd; underline</option>
                                                                            <option value='undo' {{($value->icon == 'undo') ? "selected":""}}>&#xf0e2; undo</option>
                                                                            <option value='universal-access' {{($value->icon == 'universal-access') ? "selected":""}}>&#xf29a; universal access</option>
                                                                            <option value='university' {{($value->icon == 'university') ? "selected":""}}>&#xf19c; university</option>
                                                                            <option value='unlink' {{($value->icon == 'unlink') ? "selected":""}}>&#xf127; unlink</option>
                                                                            <option value='unlock' {{($value->icon == 'unlock') ? "selected":""}}>&#xf09c; unlock</option>
                                                                            <option value='unlock-alt' {{($value->icon == 'unlock-alt') ? "selected":""}}>&#xf13e; unlock alt</option>
                                                                            <option value='unsorted' {{($value->icon == 'unsorted') ? "selected":""}}>&#xf0dc; unsorted</option>
                                                                            <option value='upload' {{($value->icon == 'upload') ? "selected":""}}>&#xf093; upload</option>
                                                                            <option value='usb' {{($value->icon == 'usb') ? "selected":""}}>&#xf287; usb</option>
                                                                            <option value='usd' {{($value->icon == 'usd') ? "selected":""}}>&#xf155; usd</option>
                                                                            <option value="user" {{($value->icon == 'user') ? "selected":""}}>&#xf007; User</option>
                                                                            <option value="user-circle" {{($value->icon == 'user-circle') ? "selected":""}}>&#xf2bd; User circle</option>
                                                                            <option value='user-circle-o' {{($value->icon == 'user-circle-o') ? "selected":""}}>&#xf2be; user circle o</option>
                                                                            <option value='user-md' {{($value->icon == 'user-md') ? "selected":""}}>&#xf0f0; user md</option>
                                                                            <option value='user-o' {{($value->icon == 'user-o') ? "selected":""}}>&#xf2c0; user o</option>
                                                                            <option value='user-plus' {{($value->icon == 'user-plus') ? "selected":""}}>&#xf234; user plus</option>
                                                                            <option value='user-secret' {{($value->icon == 'user-secret') ? "selected":""}}>&#xf21b; user secret</option>
                                                                            <option value='user-times' {{($value->icon == 'user-times') ? "selected":""}}>&#xf235; user times</option>
                                                                            <option value='users' {{($value->icon == 'users') ? "selected":""}}>&#xf0c0; users</option>
                                                                            <option value='vcard' {{($value->icon == 'vcard') ? "selected":""}}>&#xf2bb; vcard</option>
                                                                            <option value='vcard-o' {{($value->icon == 'vcard-o') ? "selected":""}}>&#xf2bc; vcard-o</option>
                                                                            <option value='venus' {{($value->icon == 'venus') ? "selected":""}}>&#xf221; venus</option>
                                                                            <option value='venus-double' {{($value->icon == 'venus-double') ? "selected":""}}>&#xf226; venus double</option>
                                                                            <option value='venus-mars' {{($value->icon == 'venus-mars') ? "selected":""}}>&#xf228; venus mars</option>
                                                                            <option value='viacoin' {{($value->icon == 'viacoin') ? "selected":""}}>&#xf237; viacoin</option>
                                                                            <option value='viadeo' {{($value->icon == 'viadeo') ? "selected":""}}>&#xf2a9; viadeo</option>
                                                                            <option value='viadeo-square' {{($value->icon == 'viadeo-square') ? "selected":""}}>&#xf2aa; viadeo square</option>
                                                                            <option value='video-camera' {{($value->icon == 'video-camera') ? "selected":""}}>&#xf03d; video camera</option>
                                                                            <option value='vimeo' {{($value->icon == 'vimeo') ? "selected":""}}>&#xf27d; vimeo</option>
                                                                            <option value='vimeo-square' {{($value->icon == 'vimeo-square') ? "selected":""}}>&#xf194; vimeo square</option>
                                                                            <option value='vine' {{($value->icon == 'vine') ? "selected":""}}>&#xf1ca; vine</option>
                                                                            <option value='vk' {{($value->icon == 'vk') ? "selected":""}}>&#xf189; vk</option>
                                                                            <option value='volume-control-phone' {{($value->icon == 'volume-control-phone') ? "selected":""}}>&#xf2a0; volume control phone</option>
                                                                            <option value='volume-down' {{($value->icon == 'volume-down') ? "selected":""}}>&#xf027; volume down</option>
                                                                            <option value='volume-off' {{($value->icon == 'volume-off') ? "selected":""}}>&#xf026; volume off</option>
                                                                            <option value='volume-up' {{($value->icon == 'volume-up') ? "selected":""}}>&#xf028; volume up</option>
                                                                            <option value='warning' {{($value->icon == 'warning') ? "selected":""}}>&#xf071; warning</option>
                                                                            <option value='weibo' {{($value->icon == 'weibo') ? "selected":""}}>&#xf18a; weibo</option>
                                                                            <option value='weixin' {{($value->icon == 'weixin') ? "selected":""}}>&#xf1d7; weixin</option>
                                                                            <option value='whatsapp' {{($value->icon == 'whatsapp') ? "selected":""}}>&#xf232; whatsapp</option>
                                                                            <option value='wheelchair' {{($value->icon == 'wheelchair') ? "selected":""}}>&#xf193; wheelchair</option>
                                                                            <option value='wheelchair-alt' {{($value->icon == 'wheelchair-alt') ? "selected":""}}>&#xf29b; wheelchair alt</option>
                                                                            <option value='wifi' {{($value->icon == 'wifi') ? "selected":""}}>&#xf1eb; wifi</option>
                                                                            <option value='wikipedia-w' {{($value->icon == 'wikipedia-w') ? "selected":""}}>&#xf266; wikipedia w</option>
                                                                            <option value='window-close' {{($value->icon == 'window-close') ? "selected":""}}>&#xf2d3; window close</option>
                                                                            <option value='window-close-o' {{($value->icon == 'window-close-o') ? "selected":""}}>&#xf2d4; window close o</option>
                                                                            <option value='window-maximize' {{($value->icon == 'window-maximize') ? "selected":""}}>&#xf2d0; window maximize</option>
                                                                            <option value='window-minimize' {{($value->icon == 'window-minimize') ? "selected":""}}>&#xf2d1; window minimize</option>
                                                                            <option value='window-restore' {{($value->icon == 'window-restore') ? "selected":""}}>&#xf2d2; window restore</option>
                                                                            <option value='windows' {{($value->icon == 'windows') ? "selected":""}}>&#xf17a; windows</option>
                                                                            <option value='won' {{($value->icon == 'won') ? "selected":""}}>&#xf159; won</option>
                                                                            <option value='wordpress' {{($value->icon == 'wordpress') ? "selected":""}}>&#xf19a; wordpress</option>
                                                                            <option value='wpbeginner' {{($value->icon == 'wpbeginner') ? "selected":""}}>&#xf297; wpbeginner</option>
                                                                            <option value='wpexplorer' {{($value->icon == 'wpexplorer') ? "selected":""}}>&#xf2de; wpexplorer</option>
                                                                            <option value='wpforms' {{($value->icon == 'wpforms') ? "selected":""}}>&#xf298; wpforms</option>
                                                                            <option value='wrench' {{($value->icon == 'wrench') ? "selected":""}}>&#xf0ad; wrench</option>
                                                                            <option value='yahoo' {{($value->icon == 'yahoo') ? "selected":""}}>&#xf19e; yahoo</option>
                                                                            <option value='yc' {{($value->icon == 'yc') ? "selected":""}}>&#xf23b; yc</option>
                                                                            <option value='yelp' {{($value->icon == 'yelp') ? "selected":""}}>&#xf1e9; yelp</option>
                                                                            <option value='yen' {{($value->icon == 'yen') ? "selected":""}}>&#xf157; yen</option>
                                                                            <option value='youtube' {{($value->icon == 'youtube') ? "selected":""}}>&#xf167; youtube</option>

                                                                        </select>

                                                                        <button class="btn btn-danger remove-field"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>
                                                                        <div class="invalid-feedback">
                                                                            Please select the icons.
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3 attribute-values" id="addValues">
                                                                        <div class="col-md-12 col-6">
                                                                            <input type="hidden" class="form-control" name="id[]" value="{{$value->id}}"/>
                                                                            <label for="title" class="text-heading">Icon Title <span class="text-muted text-danger">*</span></label>
                                                                            <input type="text" class="form-control" id="title" name="title[]" value="{{$value->title}}"/>
                                                                            <div class="invalid-feedback">
                                                                                Please enter a icon title.
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 col-6">
                                                                            <label for="icon_description" class="text-heading">Icon Description <span class="text-muted text-danger">*</span></label>
                                                                            <textarea class="form-control" rows="6" maxlength="140" name="icon_description[]" id="icon_description" required>{{$value->icon_description}}</textarea>
                                                                            <div class="invalid-feedback">
                                                                                Please enter a icon description.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <div id="multi-fields">
                                                            <div class="multi-field custom-card" style="border-bottom: double #e3e3e3; ">
                                                                <label>Icon Type </label>
                                                                <div class="input-group mb-3">
                                                                    <select class="form-control shadow-none icons-select" name="icon[]" id="icon" required>
                                                                        <option value disabled readonly selected> Select Icons</option>
                                                                        <option value="address-book" >&#xf2b9; Address book</option>
                                                                        <option value='address-book-o' >&#xf2ba; Address book Light</option>
                                                                        <option value="address-card" >&#xf2bb; Address card</option>
                                                                        <option value='address-card-o'>&#xf2bc; Address Card Light</option>
                                                                        <option value='adjust' >&#xf042; Adjust</option>
                                                                        <option value='adn' >&#xf170; Adn</option>
                                                                        <option value='align-center' >&#xf037; Align Center</option>
                                                                        <option value='align-justify'>&#xf039; Align Justify</option>
                                                                        <option value='align-left' >&#xf036; Align Left</option>
                                                                        <option value='align-right'>&#xf038; Align Right</option>
                                                                        <option value='amazon' >&#xf270; Amazon</option>
                                                                        <option value='ambulance' >&#xf0f9; Ambulance</option>
                                                                        <option value='american-sign-language-interpreting' >&#xf2a3; American Sign Language Interpreting</option>
                                                                        <option value='anchor' >&#xf13d; Anchor</option>
                                                                        <option value='android' >&#xf17b; Android</option>
                                                                        <option value='angellist'>&#xf209; Angellist</option>
                                                                        <option value='angle-double-down' >&#xf103; Angle Double Down</option>
                                                                        <option value='angle-double-left' >&#xf100; Angle Double Left</option>
                                                                        <option value='angle-double-right'>&#xf101; Angle Double Right</option>
                                                                        <option value='angle-double-up' >&#xf102; Angle Double Up</option>
                                                                        <option value='angle-down' >&#xf107; Angle Down</option>
                                                                        <option value='angle-left' >&#xf104; Angle Left</option>
                                                                        <option value='angle-right' >&#xf105; Angle Right</option>
                                                                        <option value='angle-up' >&#xf106; Angle Up</option>
                                                                        <option value='apple' >&#xf179; Apple</option>
                                                                        <option value='archive'>&#xf187; Archive</option>
                                                                        <option value='area-chart' >&#xf1fe; Area-chart</option>
                                                                        <option value='arrow-circle-down'>&#xf0ab; Arrow Circle Down</option>
                                                                        <option value='arrow-circle-left' >&#xf0a8; Arrow Circle Left</option>
                                                                        <option value='arrow-circle-o-down'>&#xf01a; Arrow Circle O Down</option>
                                                                        <option value='arrow-circle-o-left'>&#xf190; Arrow Circle O Left</option>
                                                                        <option value='arrow-circle-o-right'>&#xf18e; Arrow Circle O Right</option>
                                                                        <option value='arrow-circle-o-up' >&#xf01b; Arrow Circle O Up</option>
                                                                        <option value='arrow-circle-right' >&#xf0a9; Arrow Circle Right</option>
                                                                        <option value='arrow-circle-up' >&#xf0aa; Arrow Circle Up</option>
                                                                        <option value='arrow-down' >&#xf063; Arrow Down</option>
                                                                        <option value='arrow-left' >&#xf060; Arrow Left</option>
                                                                        <option value='arrow-right' >&#xf061; Arrow Right</option>
                                                                        <option value='arrow-up' >&#xf062; Arrow Up</option>
                                                                        <option value='arrows' >&#xf047; Arrows</option>
                                                                        <option value='arrows-alt'>&#xf0b2; Arrows Alt</option>
                                                                        <option value='arrows-h' >&#xf07e; Arrows H</option>
                                                                        <option value='arrows-v' >&#xf07d; Arrows V</option>
                                                                        <option value='asl-interpreting' >&#xf2a3; Asl Interpreting</option>
                                                                        <option value='assistive-listening-systems'>&#xf2a2; Assistive Listening Systems</option>
                                                                        <option value='asterisk' >&#xf069; Asterisk</option>
                                                                        <option value='at' >&#xf1fa; At</option>
                                                                        <option value='audio-description' >&#xf29e; Audio Description</option>
                                                                        <option value='automobile' >&#xf1b9; Automobile</option>

                                                                        <option value='backward' >&#xf04a; Backward</option>
                                                                        <option value='balance-scale' >&#xf24e; Balance Scale</option>
                                                                        <option value='ban' >&#xf05e; Ban</option>
                                                                        <option value='bandcamp' >&#xf2d5; Bandcamp</option>
                                                                        <option value='bank' >&#xf19c; Bank</option>
                                                                        <option value='bar-chart' >&#xf080; Bar Chart</option>
                                                                        <option value='bar-chart-o' >&#xf080; Bar Chart O</option>
                                                                        <option value='barcode' >&#xf02a; barcode</option>
                                                                        <option value='bars'>&#xf0c9; bars</option>
                                                                        <option value='bath' >&#xf2cd; bath</option>
                                                                        <option value='bathtub' >&#xf2cd; bathtub</option>
                                                                        <option value='battery' >&#xf240; battery</option>
                                                                        <option value='battery-0' >&#xf244; battery 0</option>
                                                                        <option value='battery-1' >&#xf243; battery 1</option>
                                                                        <option value='battery-2' >&#xf242; battery 2</option>
                                                                        <option value='battery-3' >&#xf241; battery 3</option>
                                                                        <option value='battery-4' >&#xf240; battery 4</option>
                                                                        <option value='battery-empty' >&#xf244; battery empty</option>
                                                                        <option value='battery-full' >&#xf240; battery full</option>
                                                                        <option value='battery-half' >&#xf242; battery half</option>
                                                                        <option value='battery-quarter' >&#xf243; battery quarter</option>
                                                                        <option value='battery-three-quarters' >&#xf241; battery three quarters</option>
                                                                        <option value='bed' >&#xf236; bed</option>
                                                                        <option value='beer' >&#xf0fc; beer</option>
                                                                        <option value='behance' >&#xf1b4; behance</option>
                                                                        <option value='behance-square' >&#xf1b5; behance square</option>
                                                                        <option value='bell' >&#xf0f3; bell</option>
                                                                        <option value='bell-o' >&#xf0a2; bell o</option>
                                                                        <option value='bell-slash' >&#xf1f6; bell slash</option>
                                                                        <option value='bell-slash-o' >&#xf1f7; bell slash o</option>
                                                                        <option value='bicycle' >&#xf206; bicycle</option>
                                                                        <option value='binoculars' >&#xf1e5; binoculars</option>
                                                                        <option value='birthday-cake' >&#xf1fd; birthday cake</option>
                                                                        <option value='bitbucket' >&#xf171; bitbucket</option>
                                                                        <option value='bitbucket-square' >&#xf172; bitbucket square</option>
                                                                        <option value='bitcoin' >&#xf15a; bitcoin</option>
                                                                        <option value='black-tie' >&#xf27e; black-tie</option>
                                                                        <option value='blind' >&#xf29d; blind</option>
                                                                        <option value='bluetooth' >&#xf293; bluetooth</option>
                                                                        <option value='bluetooth-b' >&#xf294; bluetooth b</option>
                                                                        <option value='bold' >&#xf032; bold</option>
                                                                        <option value='bolt'>&#xf0e7; bolt</option>
                                                                        <option value='bomb' >&#xf1e2; bomb</option>
                                                                        <option value='book'>&#xf02d; book</option>
                                                                        <option value='bookmark' >&#xf02e; bookmark</option>
                                                                        <option value='bookmark-o' >&#xf097; bookmark o</option>
                                                                        <option value='braille' >&#xf2a1; braille</option>
                                                                        <option value='briefcase' >&#xf0b1; briefcase</option>
                                                                        <option value='btc' >&#xf15a; btc</option>
                                                                        <option value='bug' >&#xf188; bug</option>
                                                                        <option value='building' >&#xf1ad; building</option>
                                                                        <option value='building-o' >&#xf0f7; building o</option>
                                                                        <option value='bullhorn' >&#xf0a1; bullhorn</option>
                                                                        <option value='bullseye' >&#xf140; bullseye</option>
                                                                        <option value='bus' >&#xf207; bus</option>
                                                                        <option value='buysellads' >&#xf20d; buysellads</option>


                                                                        <option value='cab' >&#xf1ba; cab</option>
                                                                        <option value='calculator' >&#xf1ec; calculator</option>
                                                                        <option value="calendar" >&#xf133; Calendar</option>
                                                                        <option value="calendar-alt" >&#xf073; calendar alt</option>
                                                                        <option value="calendar-check" >&#xf274; Calendar check</option>
                                                                        <option value="calendar-minus" >&#xf272; calendar minus</option>
                                                                        <option value="calendar-plus" >&#xf271; Calendar plus</option>
                                                                        <option value="calendar-times" >&#xf273; Calendar times</option>
                                                                        <option value='camera' >&#xf030; camera</option>
                                                                        <option value='camera-retro' >&#xf083; camera retro</option>
                                                                        <option value='car' >&#xf1b9; car</option>
                                                                        <option value='caret-down'>&#xf0d7; caret down</option>
                                                                        <option value='caret-left' >&#xf0d9; caret left</option>
                                                                        <option value='caret-right' >&#xf0da; caret right</option>
                                                                        <option value='caret-up' >&#xf0d8; caret up</option>
                                                                        <option value="caret-square-down" >&#xf150; Caret square down</option>
                                                                        <option value="caret-square-left" >&#xf191; caret square left</option>
                                                                        <option value="caret-square-right" >&#xf152; Caret square right</option>
                                                                        <option value="caret-square-up" >&#xf151; Caret square up</option>
                                                                        <option value='cart-arrow-down' >&#xf218; cart arrow down</option>
                                                                        <option value='cart-plus' >&#xf217; cart plus</option>
                                                                        <option value='cc' >&#xf20a; cc</option>
                                                                        <option value='cc-amex' >&#xf1f3; cc amex</option>
                                                                        <option value='cc-diners-club' >&#xf24c; cc diners club</option>
                                                                        <option value='cc-discover' >&#xf1f2; cc discover</option>
                                                                        <option value='cc-jcb' >&#xf24b; cc jcb</option>
                                                                        <option value='cc-mastercard' >&#xf1f1; cc mastercard</option>
                                                                        <option value='cc-paypal' >&#xf1f4; cc paypal</option>
                                                                        <option value='cc-stripe' >&#xf1f5; cc stripe</option>
                                                                        <option value='cc-visa'>&#xf1f0; cc visa</option>
                                                                        <option value='certificate' >&#xf0a3; certificate</option>
                                                                        <option value='chain' >&#xf0c1; chain</option>
                                                                        <option value='chain-broken' >&#xf127; chain broken</option>
                                                                        <option value="chart-bar" >&#xf080; Chart bar</option>
                                                                        <option value='check' >&#xf00c; check</option>
                                                                        <option value="check-circle" >&#xf058; Check circle</option>
                                                                        <option value='check-circle-o' >&#xf05d; check circle o</option>
                                                                        <option value="check-square" >&#xf14a; Check square</option>
                                                                        <option value='check-square-o'>&#xf046; check square o</option>
                                                                        <option value='chevron-circle-down' >&#xf13a; chevron circle down</option>
                                                                        <option value='chevron-circle-left' >&#xf137; chevron circle left</option>
                                                                        <option value='chevron-circle-right' >&#xf138; chevron circle right</option>
                                                                        <option value='chevron-circle-up' >&#xf139; chevron circle up</option>
                                                                        <option value='chevron-down' >&#xf078; chevron down</option>
                                                                        <option value='chevron-left' >&#xf053; chevron left</option>
                                                                        <option value='chevron-right' >&#xf054; chevron right</option>
                                                                        <option value='chevron-up' >&#xf077; chevron up</option>
                                                                        <option value='child' >&#xf1ae; child</option>
                                                                        <option value='chrome' >&#xf268; chrome</option>
                                                                        <option value="circle" >&#xf111; Circle</option>
                                                                        <option value='circle-o' >&#xf10c; circle o</option>
                                                                        <option value='circle-o-notch' >&#xf1ce; circle o notch</option>
                                                                        <option value='circle-thin' >&#xf1db; circle thin</option>
                                                                        <option value='clipboard' >&#xf0ea; clipboard</option>
                                                                        <option value="clock">&#xf017; Clock</option>
                                                                        <option value="clone" >&#xf24d; Clone</option>
                                                                        <option value='close'>&#xf00d; close</option>
                                                                        <option value="closed-captioning">&#xf20a; Closed captioning</option>
                                                                        <option value='cloud' >&#xf0c2; cloud</option>
                                                                        <option value='cloud-download' >&#xf0ed; cloud download</option>
                                                                        <option value='cloud-upload' >&#xf0ee; cloud upload</option>
                                                                        <option value='cny' >&#xf157; cny</option>
                                                                        <option value='code' >&#xf121; code</option>
                                                                        <option value='code-fork' >&#xf126; code fork</option>
                                                                        <option value='codiepie'>&#xf284; codiepie</option>
                                                                        <option value='coffee' >&#xf0f4; coffee</option>
                                                                        <option value='cog' >&#xf013; cog</option>
                                                                        <option value='cogs' >&#xf085; cogs</option>
                                                                        <option value='columns' >&#xf0db; columns</option>
                                                                        <option value="comment" >&#xf075; Comment</option>
                                                                        <option value='comment-o'>&#xf0e5; comment o</option>
                                                                        <option value="comment-alt" >&#xf27a; Comment alt</option>
                                                                        <option value='commenting-o' >&#xf27b; commenting o</option>
                                                                        <option value="comments" >&#xf086; Comments</option>
                                                                        <option value='comments-o' >&#xf0e6; comments o</option>
                                                                        <option value="compass" >&#xf14e; Compass</option>
                                                                        <option value='compress'>&#xf066; compress</option>
                                                                        <option value='connectdevelop' >&#xf20e; connectdevelop</option>
                                                                        <option value='contao'>&#xf26d; contao</option>
                                                                        <option value="copy" >&#xf0c5; Copy</option>
                                                                        <option value="copyright" >&#xf1f9; Copyright</option>
                                                                        <option value='creative-commons'>&#xf25e; creative commons</option>
                                                                        <option value="credit-card" >&#xf09d; Credit card</option>
                                                                        <option value='credit-card-alt' >&#xf283; credit card alt</option>
                                                                        <option value='crop' >&#xf125; crop</option>
                                                                        <option value='crosshairs' >&#xf05b; crosshairs</option>
                                                                        <option value='css3' >&#xf13c; css3</option>
                                                                        <option value='cube' >&#xf1b2; cube</option>
                                                                        <option value='cubes' >&#xf1b3; cubes</option>
                                                                        <option value='cut' >&#xf0c4; cut</option>
                                                                        <option value='cutlery' >&#xf0f5; cutlery</option>


                                                                        <option value='dashboard' >&#xf0e4; dashboard</option>
                                                                        <option value='dashcube' >&#xf210; dashcube</option>
                                                                        <option value='database' >&#xf1c0; database</option>
                                                                        <option value='deaf' >&#xf2a4; deaf</option>
                                                                        <option value='deafness' >&#xf2a4; deafness</option>
                                                                        <option value='dedent' >&#xf03b; dedent</option>
                                                                        <option value='delicious' >&#xf1a5; delicious</option>
                                                                        <option value='desktop' >&#xf108; desktop</option>
                                                                        <option value='deviantart' >&#xf1bd; deviantart</option>
                                                                        <option value='diamond' >&#xf219; diamond</option>
                                                                        <option value='digg' >&#xf1a6; digg</option>
                                                                        <option value='dollar' >&#xf155; dollar</option>
                                                                        <option value="dot-circle" >&#xf192; Dot circle</option>
                                                                        <option value='download' >&#xf019; download</option>
                                                                        <option value='dribbble' >&#xf17d; dribbble</option>
                                                                        <option value='drivers-license' >&#xf2c2; drivers license</option>
                                                                        <option value='drivers-license-o' >&#xf2c3; drivers license-o</option>
                                                                        <option value='dropbox' >&#xf16b; dropbox</option>
                                                                        <option value='drupal' >&#xf1a9; drupal</option>



                                                                        <option value='edge' >&#xf282; edge</option>
                                                                        <option value="edit">&#xf044; Edit</option>
                                                                        <option value='eercast' >&#xf2da; eercast</option>
                                                                        <option value='eject' >&#xf052; eject</option>
                                                                        <option value='ellipsis-h' >&#xf141; ellipsis h</option>
                                                                        <option value='ellipsis-v'>&#xf142; ellipsis v</option>
                                                                        <option value='empire'>&#xf1d1; empire</option>
                                                                        <option value='envelope' >&#xf0e0; envelope</option>
                                                                        <option value='envelope-o' >&#xf003; envelope o</option>
                                                                        <option value="envelope-open" >&#xf2b6; Envelope open</option>

                                                                        <option value='envelope-open-o' >&#xf2b7; envelope open o</option>
                                                                        <option value='envelope-square' >&#xf199; envelope square</option>
                                                                        <option value='envira' >&#xf299; envira</option>
                                                                        <option value='eraser' >&#xf12d; eraser</option>
                                                                        <option value='etsy'>&#xf2d7; etsy</option>
                                                                        <option value='eur'>&#xf153; eur</option>
                                                                        <option value='euro' >&#xf153; euro</option>
                                                                        <option value='exchange' >&#xf0ec; exchange</option>
                                                                        <option value='exclamation' >&#xf12a; exclamation</option>
                                                                        <option value='exclamation-circle' >&#xf06a; exclamation circle</option>
                                                                        <option value='exclamation-triangle' >&#xf071; exclamation triangle</option>
                                                                        <option value='expand'>&#xf065; expand</option>
                                                                        <option value='expeditedssl' >&#xf23e; expeditedssl</option>
                                                                        <option value='external-link' >&#xf08e; external link</option>
                                                                        <option value='external-link-square' >&#xf14c; external link square</option>
                                                                        <option value="eye" >&#xf06e; Eye</option>
                                                                        <option value="eye-slash" >&#xf070; Eye slash</option>
                                                                        <option value='eyedropper' >&#xf1fb; eyedropper</option>


                                                                        <option value="flag" >&#xf024; Flag</option>
                                                                        <option value="flushed">&#xf579; Flushed</option>
                                                                        <option value="folder">&#xf07b; Folder</option>
                                                                        <option value="folder-open" >&#xf07c; Folder open </option>
                                                                        <option value="frown" >&#xf119; Frown</option>
                                                                        <option value="futbol" >&#xf1e3; Futbol</option>
                                                                        <option value='fa' >&#xf2b4; fa</option>
                                                                        <option value='facebook' >&#xf09a; facebook</option>
                                                                        <option value='facebook-f' >&#xf09a; facebook-f</option>
                                                                        <option value='facebook-official'>&#xf230; facebook-official</option>
                                                                        <option value='facebook-square' >&#xf082; facebook-square</option>
                                                                        <option value='fast-backward'>&#xf049; fast-backward</option>
                                                                        <option value='fast-forward' >&#xf050; fast-forward</option>
                                                                        <option value='fax' >&#xf1ac; fax</option>
                                                                        <option value='feed'>&#xf09e; feed</option>
                                                                        <option value='female'>&#xf182; female</option>
                                                                        <option value='fighter-jet'>&#xf0fb; fighter-jet</option>
                                                                        <option value="file" >&#xf15b; File</option>
                                                                        <option value="file-archive">&#xf1c6; File archive</option>
                                                                        <option value="file-audio">&#xf1c7; File audio</option>
                                                                        <option value="file-code" >&#xf1c9; File code</option>
                                                                        <option value="file-excel" >&#xf1c3; File excel </option>
                                                                        <option value="file-image" >&#xf1c5; File image</option>
                                                                        <option value='file-movie-o' >&#xf1c8; file movie o</option>
                                                                        <option value='file-o' >&#xf016; file o</option>
                                                                        <option value="file-pdf" >&#xf1c1; File pdf</option>
                                                                        <option value='file-photo-o' >&#xf1c5; file photo o</option>
                                                                        <option value='file-picture-o' >&#xf1c5; file picture o</option>
                                                                        <option value="file-powerpoint" >&#xf1c4; File powerpoint</option>
                                                                        <option value='file-sound-o'>&#xf1c7; file sound o</option>
                                                                        <option value='file-text'>&#xf15c; file text</option>
                                                                        <option value='file-text-o' >&#xf0f6; file text o</option>
                                                                        <option value="file-video">&#xf1c8; File video</option>
                                                                        <option value="file-word">&#xf1c2; File word</option>
                                                                        <option value='file-zip-o' >&#xf1c6; file zip o</option>
                                                                        <option value='files-o'>&#xf0c5; files o</option>
                                                                        <option value='film' >&#xf008; film</option>
                                                                        <option value='filter' >&#xf0b0; filter</option>
                                                                        <option value='fire' >&#xf06d; fire</option>
                                                                        <option value='fire-extinguisher' >&#xf134; fire extinguisher</option>
                                                                        <option value='firefox' >&#xf269; firefox</option>
                                                                        <option value='first-order' >&#xf2b0; first order</option>
                                                                        <option value='flag' >&#xf024; flag</option>
                                                                        <option value='flag-checkered' >&#xf11e; flag checkered</option>
                                                                        <option value='flag-o' >&#xf11d; flag o</option>
                                                                        <option value='flash' >&#xf0e7; flash</option>
                                                                        <option value='flask'>&#xf0c3; flask</option>
                                                                        <option value='flickr' >&#xf16e; flickr</option>
                                                                        <option value='floppy-o' >&#xf0c7; floppy o</option>
                                                                        <option value='folder' >&#xf07b; folder</option>
                                                                        <option value='folder-o' >&#xf114; folder o</option>
                                                                        <option value='folder-open' >&#xf07c; folder open</option>
                                                                        <option value='folder-open-o' >&#xf115; folder open o</option>
                                                                        <option value='font' >&#xf031; font</option>
                                                                        <option value='font-awesome' >&#xf2b4; font awesome</option>
                                                                        <option value='fonticons' >&#xf280; fonticons</option>
                                                                        <option value='fort-awesome' >&#xf286; fort awesome</option>
                                                                        <option value='forumbee' >&#xf211; forumbee</option>
                                                                        <option value='forward' >&#xf04e; forward</option>
                                                                        <option value='foursquare'>&#xf180; foursquare</option>
                                                                        <option value='free-code-camp'>&#xf2c5; free code camp</option>
                                                                        <option value='frown-o' >&#xf119; frown o</option>
                                                                        <option value='futbol-o' >&#xf1e3; futbol o</option>

                                                                        <option value='gamepad' >&#xf11b; gamepad</option>
                                                                        <option value='gavel' >&#xf0e3; gavel</option>
                                                                        <option value='gbp' >&#xf154; gbp</option>
                                                                        <option value='ge'>&#xf1d1; ge</option>
                                                                        <option value='gear'>&#xf013; gear</option>
                                                                        <option value='gears' >&#xf085; gears</option>
                                                                        <option value='genderless' >&#xf22d; genderless</option>
                                                                        <option value='get-pocket' >&#xf265; get-pocket</option>
                                                                        <option value='gg' >&#xf260; gg</option>
                                                                        <option value='gg-circle' >&#xf261; gg circle</option>
                                                                        <option value='gift'>&#xf06b; gift</option>
                                                                        <option value='git' >&#xf1d3; git</option>
                                                                        <option value='git-square' >&#xf1d2; git square</option>
                                                                        <option value='github' >&#xf09b; github</option>
                                                                        <option value='github-alt'>&#xf113; github alt</option>
                                                                        <option value='github-square'>&#xf092; github square</option>
                                                                        <option value='gitlab' >&#xf296; gitlab</option>
                                                                        <option value='gittip'>&#xf184; gittip</option>
                                                                        <option value='glass' >&#xf000; glass</option>
                                                                        <option value='glide' >&#xf2a5; glide</option>
                                                                        <option value='glide-g' >&#xf2a6; glide g</option>
                                                                        <option value='globe'>&#xf0ac; globe</option>
                                                                        <option value='google' >&#xf1a0; google</option>
                                                                        <option value='google-plus' >&#xf0d5; google plus</option>
                                                                        <option value='google-plus-circle' >&#xf2b3; google plus circle</option>
                                                                        <option value='google-plus-official' >&#xf2b3; google plus official</option>
                                                                        <option value='google-plus-square'>&#xf0d4; google plus square</option>
                                                                        <option value='google-wallet' >&#xf1ee; google wallet</option>
                                                                        <option value='graduation-cap' >&#xf19d; graduation cap</option>
                                                                        <option value='gratipay'>&#xf184; gratipay</option>
                                                                        <option value='grav' >&#xf2d6; grav</option>
                                                                        <option value='group' >&#xf0c0; group</option>

                                                                        <option value='h-square' >&#xf0fd; h-square</option>
                                                                        <option value='hacker-news' >&#xf1d4; hacker news</option>
                                                                        <option value='hand-grab-o'>&#xf255; hand grab o</option>
                                                                        <option value="hand-lizard" >&#xf258; Hand lizard</option>
                                                                        <option value="hand-point-down" >&#xf0a7; Hand point down</option>
                                                                        <option value="hand-point-left" >&#xf0a5; Hand point left</option>
                                                                        <option value="hand-point-right" >&#xf0a4; Hand point right</option>
                                                                        <option value="hand-point-up" >&#xf0a6; Hand point up</option>
                                                                        <option value="hand-paper" >&#xf256; Hand paper</option>
                                                                        <option value="hand-peace" >&#xf25b; Hand peace</option>
                                                                        <option value="hand-pointer" >&#xf25a; Hand pointer</option>
                                                                        <option value="hand-rock" >&#xf255; Hand rock </option>
                                                                        <option value="hand-scissors" >&#xf257; Hand scissors</option>
                                                                        <option value="hand-spock">&#xf259; Hand spock</option>
                                                                        <option value='hand-stop-o' >&#xf256; hand stop o</option>
                                                                        <option value="handshake" >&#xf2b5; Handshake</option>
                                                                        <option value='hard-of-hearing'>&#xf2a4; hard of hearing</option>
                                                                        <option value='hashtag' >&#xf292; hashtag</option>
                                                                        <option value="hdd" >&#xf0a0; Hdd</option>
                                                                        <option value='header'>&#xf1dc; header</option>
                                                                        <option value='headphones' >&#xf025; headphones</option>
                                                                        <option value="heart" >&#xf004; Heart</option>
                                                                        <option value='heart-o' >&#xf08a; heart o</option>
                                                                        <option value='heartbeat' >&#xf21e; heartbeat</option>
                                                                        <option value='history'>&#xf1da; history</option>
                                                                        <option value="home" >&#xf015; Home</option>
                                                                        <option value="hospital" >&#xf0f8; Hospital</option>
                                                                        <option value='hotel' >&#xf236; hotel</option>
                                                                        <option value="hourglass" >&#xf254; Hourglass</option>
                                                                        <option value='hourglass-1' >&#xf251; hourglass 1</option>
                                                                        <option value='hourglass-2' >&#xf252; hourglass 2</option>
                                                                        <option value='hourglass-3' >&#xf253; hourglass 3</option>
                                                                        <option value='hourglass-end' >&#xf253; hourglass end</option>
                                                                        <option value='hourglass-half' >&#xf252; hourglass half</option>
                                                                        <option value='hourglass-o' >&#xf250; hourglass o</option>
                                                                        <option value='hourglass-start' >&#xf251; hourglass start</option>
                                                                        <option value='houzz' >&#xf27c; houzz</option>
                                                                        <option value='html5' >&#xf13b; html5</option>

                                                                        <option value='i-cursor' >&#xf246; i cursor</option>
                                                                        <option value='id-badge'>&#xf2c1; id badge</option>
                                                                        <option value="id-card" >&#xf2c2; Id card </option>
                                                                        <option value='id-card-o' >&#xf2c3; id card o</option>
                                                                        <option value='ils'>&#xf20b; ils</option>
                                                                        <option value="image" >&#xf03e; Image</option>
                                                                        <option value='imdb' >&#xf2d8; imdb</option>
                                                                        <option value='inbox' >&#xf01c; inbox</option>
                                                                        <option value='indent' >&#xf03c; indent</option>
                                                                        <option value='industry' >&#xf275; industry</option>
                                                                        <option value='info' >&#xf129; info</option>
                                                                        <option value='info-circle' >&#xf05a; info circle</option>
                                                                        <option value='inr' >&#xf156; inr</option>
                                                                        <option value='instagram' >&#xf16d; instagram</option>
                                                                        <option value='institution' >&#xf19c; institution</option>
                                                                        <option value='internet-explorer' >&#xf26b; internet explorer</option>
                                                                        <option value='intersex' >&#xf224; intersex</option>
                                                                        <option value='ioxhost' >&#xf208; ioxhost</option>
                                                                        <option value='italic' >&#xf033; italic</option>

                                                                        <option value='joomla' >&#xf1aa; joomla</option>
                                                                        <option value='jpy'>&#xf157; jpy</option>
                                                                        <option value='jsfiddle' >&#xf1cc; jsfiddle</option>

                                                                        <option value='key' >&#xf084; key</option>
                                                                        <option value="keyboard">&#xf11c; Keyboard</option>
                                                                        <option value='krw' >&#xf159; krw</option>

                                                                        <option value='language' >&#xf1ab; language</option>
                                                                        <option value='laptop' >&#xf109; laptop</option>
                                                                        <option value='lastfm' >&#xf202; lastfm</option>
                                                                        <option value='lastfm-square' >&#xf203; lastfm square</option>
                                                                        <option value='leaf' >&#xf06c; leaf</option>
                                                                        <option value='leanpub' >&#xf212; leanpub</option>
                                                                        <option value='legal' >&#xf0e3; legal</option>
                                                                        <option value="lemon" >&#xf094; Lemon</option>
                                                                        <option value='level-down' >&#xf149; level down</option>
                                                                        <option value='level-up' >&#xf148; level up</option>
                                                                        <option value="life-ring" >&#xf1cd; Life ring</option>
                                                                        <option value="lightbulb" >&#xf0eb; Lightbulb</option>
                                                                        <option value='line-chart' >&#xf201; line chart</option>
                                                                        <option value='link' >&#xf0c1; link</option>
                                                                        <option value='linkedin' >&#xf0e1; linkedin</option>
                                                                        <option value='linkedin-square' >&#xf08c; linkedin square</option>
                                                                        <option value='linode' >&#xf2b8; linode</option>
                                                                        <option value='linux' >&#xf17c; linux</option>
                                                                        <option value='list' >&#xf03a; list</option>
                                                                        <option value="list-alt">&#xf022; List alt</option>
                                                                        <option value='list-ol' >&#xf0cb; list ol</option>
                                                                        <option value='list-ul' >&#xf0ca; list ul</option>
                                                                        <option value='location-arrow' >&#xf124; location arrow</option>
                                                                        <option value='lock' >&#xf023; lock</option>
                                                                        <option value='long-arrow-down' >&#xf175; long arrow down</option>
                                                                        <option value='long-arrow-left' >&#xf177; long arrow left</option>
                                                                        <option value='long-arrow-right'>&#xf178; long arrow right</option>
                                                                        <option value='long-arrow-up' >&#xf176; long arrow up</option>
                                                                        <option value='low-vision' >&#xf2a8; low vision</option>

                                                                        <option value='magic'>&#xf0d0; magic</option>
                                                                        <option value='magnet'>&#xf076; magnet</option>
                                                                        <option value='mail-forward' >&#xf064; mail forward</option>
                                                                        <option value='mail-reply' >&#xf112; mail reply</option>
                                                                        <option value='mail-reply-all' >&#xf122; mail reply all</option>
                                                                        <option value='male' >&#xf183; male</option>
                                                                        <option value="map" >&#xf279; Map</option>
                                                                        <option value='map-marker'>&#xf041; map marker</option>
                                                                        <option value='map-o'>&#xf278; map o</option>
                                                                        <option value='map-pin' >&#xf276; map pin</option>
                                                                        <option value='map-signs'>&#xf277; map signs</option>
                                                                        <option value='mars' >&#xf222; mars</option>
                                                                        <option value='mars-double'>&#xf227; mars double</option>
                                                                        <option value='mars-stroke' >&#xf229; mars stroke</option>
                                                                        <option value='mars-stroke-h'>&#xf22b; mars stroke h</option>
                                                                        <option value='mars-stroke-v' >&#xf22a; mars stroke v</option>
                                                                        <option value='maxcdn' >&#xf136; maxcdn</option>
                                                                        <option value='meanpath'>&#xf20c; meanpath</option>
                                                                        <option value='medium' >&#xf23a; medium</option>
                                                                        <option value='medkit'>&#xf0fa; medkit</option>
                                                                        <option value='meetup' >&#xf2e0; meetup</option>
                                                                        <option value="meh" >&#xf11a; Meh</option>
                                                                        <option value='mercury'>&#xf223; mercury</option>
                                                                        <option value='microchip' >&#xf2db; microchip</option>
                                                                        <option value='microphone' >&#xf130; microphone</option>
                                                                        <option value='microphone-slash' >&#xf131; microphone slash</option>
                                                                        <option value='minus'>&#xf068; minus</option>
                                                                        <option value='minus-circle' >&#xf056; minus circle</option>
                                                                        <option value="minus-square" >&#xf146; Minus square</option>
                                                                        <option value='minus-square-o'>&#xf147; minus square o</option>
                                                                        <option value='mixcloud' >&#xf289; mixcloud</option>
                                                                        <option value='mobile' >&#xf10b; mobile</option>
                                                                        <option value='mobile-phone'>&#xf10b; mobile phone</option>
                                                                        <option value='modx' >&#xf285; modx</option>
                                                                        <option value='money' >&#xf0d6; money</option>
                                                                        <option value="moon" >&#xf186; Moon</option>
                                                                        <option value='mortar-board' >&#xf19d; mortar board</option>
                                                                        <option value='motorcycle' >&#xf21c; motorcycle</option>
                                                                        <option value='mouse-pointer' >&#xf245; mouse pointer</option>
                                                                        <option value='music' >&#xf001; music</option>

                                                                        <option value='navicon' >&#xf0c9; navicon</option>
                                                                        <option value='neuter'>&#xf22c; neuter</option>
                                                                        <option value="newspaper" >&#xf1ea; Newspaper</option>

                                                                        <option value="object-group" >&#xf247; Object group</option>
                                                                        <option value="object-upgroup" >&#xf248; Object upgroup</option>
                                                                        <option value='odnoklassniki'>&#xf263; odnoklassniki</option>
                                                                        <option value='odnoklassniki-square' >&#xf264; odnoklassniki square</option>
                                                                        <option value='opencart' >&#xf23d; opencart</option>
                                                                        <option value='openid' >&#xf19b; openid</option>
                                                                        <option value='opera'>&#xf26a; opera</option>
                                                                        <option value='optin-monster' >&#xf23c; optin monster</option>
                                                                        <option value='outdent' >&#xf03b; outdent</option>

                                                                        <option value='pagelines' >&#xf18c; pagelines</option>
                                                                        <option value='paint-brush' >&#xf1fc; paint brush</option>
                                                                        <option value="paper-plane" >&#xf1d8; Paper plane</option>
                                                                        <option value='paper-plane-o' >&#xf1d9; paper plane o</option>
                                                                        <option value='paperclip' >&#xf0c6; paperclip</option>
                                                                        <option value='paragraph' >&#xf1dd; paragraph</option>
                                                                        <option value='paste' >&#xf0ea; paste</option>
                                                                        <option value='pause'>&#xf04c; pause</option>
                                                                        <option value="pause-circle">&#xf28b; Pause circle</option>
                                                                        <option value='pause-circle-o'>&#xf28c; pause circle o</option>
                                                                        <option value='paw' >&#xf1b0; paw</option>
                                                                        <option value='paypal' >&#xf1ed; paypal</option>
                                                                        <option value='pencil' >&#xf040; pencil</option>
                                                                        <option value='pencil-square' >&#xf14b; pencil square</option>
                                                                        <option value='pencil-square-o' >&#xf044; pencil square o</option>
                                                                        <option value='percent' >&#xf295; percent</option>
                                                                        <option value='phone' >&#xf095; phone</option>
                                                                        <option value='phone-square' >&#xf098; phone square</option>
                                                                        <option value='photo' >&#xf03e; photo</option>
                                                                        <option value='picture-o'>&#xf03e; picture o</option>
                                                                        <option value='pie-chart'>&#xf200; pie chart</option>
                                                                        <option value='pied-piper' >&#xf2ae; pied piper</option>
                                                                        <option value='pied-piper-alt' >&#xf1a8; pied piper alt</option>
                                                                        <option value='pied-piper-pp' >&#xf1a7; pied piper pp</option>
                                                                        <option value='pinterest' >&#xf0d2; pinterest</option>
                                                                        <option value='pinterest-p' >&#xf231; pinterest p</option>
                                                                        <option value='pinterest-square' >&#xf0d3; pinterest square</option>
                                                                        <option value='plane' >&#xf072; plane</option>
                                                                        <option value='play'>&#xf04b; play</option>
                                                                        <option value="play-circle" >&#xf144; Play circle </option>
                                                                        <option value='play-circle-o' >&#xf01d; play circle o</option>
                                                                        <option value='plug' >&#xf1e6; plug</option>
                                                                        <option value='plus' >&#xf067; plus</option>
                                                                        <option value='plus-circle' >&#xf055; plus circle</option>
                                                                        <option value="plus-square" >&#xf0fe; Plus square</option>
                                                                        <option value='plus-square-o' >&#xf196; plus square o</option>
                                                                        <option value='podcast' >&#xf2ce; podcast</option>
                                                                        <option value='power-off' >&#xf011; power off</option>
                                                                        <option value='print' >&#xf02f; print</option>
                                                                        <option value='product-hunt' >&#xf288; product hunt</option>
                                                                        <option value='puzzle-piece' >&#xf12e; puzzle piece</option>

                                                                        <option value='qq' >&#xf1d6; qq</option>
                                                                        <option value='qrcode' >&#xf029; qrcode</option>
                                                                        <option value='question' >&#xf128; question</option>
                                                                        <option value="question-circle" >&#xf059; Question circle</option>
                                                                        <option value='question-circle-o' >&#xf29c; question circle o</option>
                                                                        <option value='quora' >&#xf2c4; quora</option>
                                                                        <option value='quote-left'>&#xf10d; quote left</option>
                                                                        <option value='quote-right' >&#xf10e; quote right</option>

                                                                        <option value='ra' >&#xf1d0; ra</option>
                                                                        <option value='random' >&#xf074; random</option>
                                                                        <option value='ravelry' >&#xf2d9; ravelry</option>
                                                                        <option value='rebel' >&#xf1d0; rebel</option>
                                                                        <option value='recycle' >&#xf1b8; recycle</option>
                                                                        <option value='reddit' >&#xf1a1; reddit</option>
                                                                        <option value='reddit-alien' >&#xf281; reddit alien</option>
                                                                        <option value='reddit-square' >&#xf1a2; reddit square</option>
                                                                        <option value='refresh' >&#xf021; refresh</option>
                                                                        <option value="registered" >&#xf25d; Registered</option>
                                                                        <option value='remove'>&#xf00d; remove</option>
                                                                        <option value='renren' >&#xf18b; renren</option>
                                                                        <option value='reorder' >&#xf0c9; reorder</option>
                                                                        <option value='repeat' >&#xf01e; repeat</option>
                                                                        <option value='reply' >&#xf112; reply</option>
                                                                        <option value='reply-all' >&#xf122; reply all</option>
                                                                        <option value='resistance' >&#xf1d0; resistance</option>
                                                                        <option value='retweet'>&#xf079; retweet</option>
                                                                        <option value='rmb' >&#xf157; rmb</option>
                                                                        <option value='road' >&#xf018; road</option>
                                                                        <option value='rocket' >&#xf135; rocket</option>
                                                                        <option value='rotate-left' >&#xf0e2; rotate left</option>
                                                                        <option value='rotate-right'>&#xf01e; rotate right</option>
                                                                        <option value='rouble' >&#xf158; rouble</option>
                                                                        <option value='rss' >&#xf09e; rss</option>
                                                                        <option value='rss-square' >&#xf143; rss square</option>
                                                                        <option value='rub' >&#xf158; rub</option>
                                                                        <option value='ruble' >&#xf158; ruble</option>
                                                                        <option value='rupee' >&#xf156; rupee</option>


                                                                        <option value='s15' >&#xf2cd; s15</option>
                                                                        <option value='safari' >&#xf267; safari</option>
                                                                        <option value="save" >&#xf0c7; Save</option>
                                                                        <option value='scissors' >&#xf0c4; scissors</option>
                                                                        <option value='scribd'>&#xf28a; scribd</option>
                                                                        <option value='search' >&#xf002; search</option>
                                                                        <option value='search-minus' >&#xf010; search minus</option>
                                                                        <option value='search-plus' >&#xf00e; search plus</option>
                                                                        <option value='sellsy' >&#xf213; sellsy</option>
                                                                        <option value='send' >&#xf1d8; send</option>
                                                                        <option value='send-o' >&#xf1d9; send o</option>
                                                                        <option value='server' >&#xf233; server</option>
                                                                        <option value='share' >&#xf064; share</option>
                                                                        <option value='share-alt' >&#xf1e0; share alt</option>
                                                                        <option value='share-alt-square' >&#xf1e1; share alt square</option>
                                                                        <option value="share-square" >&#xf14d; Share square</option>
                                                                        <option value='share-square-o'>&#xf045; share square o</option>
                                                                        <option value='shekel' >&#xf20b; shekel</option>
                                                                        <option value='sheqel'>&#xf20b; sheqel</option>
                                                                        <option value='shield' >&#xf132; shield</option>
                                                                        <option value='ship'>&#xf21a; ship</option>
                                                                        <option value='shirtsinbulk' >&#xf214; shirtsinbulk</option>
                                                                        <option value='shopping-bag' >&#xf290; shopping bag</option>
                                                                        <option value='shopping-basket' >&#xf291; shopping basket</option>
                                                                        <option value='shopping-cart' >&#xf07a; shopping cart</option>
                                                                        <option value='shower' >&#xf2cc; shower</option>
                                                                        <option value='sign-in'>&#xf090; sign in</option>
                                                                        <option value='sign-language' >&#xf2a7; sign language</option>
                                                                        <option value='sign-out' >&#xf08b; sign out</option>
                                                                        <option value='signal' >&#xf012; signal</option>
                                                                        <option value='signing' >&#xf2a7; signing</option>
                                                                        <option value='simplybuilt' >&#xf215; simplybuilt</option>
                                                                        <option value='sitemap' >&#xf0e8; sitemap</option>
                                                                        <option value='skyatlas' >&#xf216; skyatlas</option>
                                                                        <option value='skype' >&#xf17e; skype</option>
                                                                        <option value='slack' >&#xf198; slack</option>
                                                                        <option value='sliders' >&#xf1de; sliders</option>
                                                                        <option value='slideshare' >&#xf1e7; slideshare</option>
                                                                        <option value="smile" >&#xf118; Smile</option>
                                                                        <option value="snowflake" >&#xf2dc; Snowflake</option>
                                                                        <option value='soccer-ball-o' >&#xf1e3; soccer ball o</option>
                                                                        <option value='soundcloud' >&#xf1be; soundcloud</option>
                                                                        <option value='space-shuttle' >&#xf197; space shuttle</option>
                                                                        <option value='spinner' >&#xf110; spinner</option>
                                                                        <option value='spoon'>&#xf1b1; spoon</option>
                                                                        <option value="square" >&#xf0c8; Square</option>
                                                                        <option value='square-o' >&#xf096; square o</option>
                                                                        <option value='stack-exchange' >&#xf18d; stack exchange</option>
                                                                        <option value='stack-overflow'>&#xf16c; stack overflow</option>
                                                                        <option value="star" >&#xf005; Star</option>
                                                                        <option value="star-half" >&#xf089; Star half</option>
                                                                        <option value='star-half-empty' >&#xf123; star half empty</option>
                                                                        <option value='star-half-full' >&#xf123; star half full</option>
                                                                        <option value='star-half-o' >&#xf123; star half o</option>
                                                                        <option value='star-o' >&#xf006; star o</option>
                                                                        <option value='steam' >&#xf1b6; steam</option>
                                                                        <option value='steam-square' >&#xf1b7; steam square</option>
                                                                        <option value='step-backward' >&#xf048; step backward</option>
                                                                        <option value='step-forward' >&#xf051; step forward</option>
                                                                        <option value='stethoscope' >&#xf0f1; stethoscope</option>
                                                                        <option value="sticky-note" >&#xf249; sticky note</option>
                                                                        <option value='sticky-note-o' >&#xf24a; sticky note o</option>
                                                                        <option value='stop' >&#xf04d; stop</option>
                                                                        <option value="stop-circle"> &#xf28d; Stop circle</option>
                                                                        <option value='stop-circle-o' >&#xf28e; stop circle o</option>
                                                                        <option value='street-view'>&#xf21d; street-view</option>
                                                                        <option value='strikethrough'>&#xf0cc; strikethrough</option>
                                                                        <option value='stumbleupon' >&#xf1a4; stumbleupon</option>
                                                                        <option value='stumbleupon-circle' >&#xf1a3; stumbleupon circle</option>
                                                                        <option value='subscript' >&#xf12c; subscript</option>
                                                                        <option value='subway' >&#xf239; subway</option>
                                                                        <option value='suitcase' >&#xf0f2; suitcase</option>
                                                                        <option value="sun" >&#xf185; Sun</option>
                                                                        <option value='superpowers' >&#xf2dd; superpowers</option>
                                                                        <option value='superscript' >&#xf12b; superscript</option>
                                                                        <option value='support'>&#xf1cd; support</option>
                                                                        <option value="surprise" >&#xf5c2; Surprise </option>


                                                                        <option value='table' >&#xf0ce; table</option>
                                                                        <option value='tablet' >&#xf10a; tablet</option>
                                                                        <option value='tachometer' >&#xf0e4; tachometer</option>
                                                                        <option value='tag' >&#xf02b; tag</option>
                                                                        <option value='tags' >&#xf02c; tags</option>
                                                                        <option value='tasks'>&#xf0ae; tasks</option>
                                                                        <option value='taxi'>&#xf1ba; taxi</option>
                                                                        <option value='telegram' >&#xf2c6; telegram</option>
                                                                        <option value='television'>&#xf26c; television</option>
                                                                        <option value='tencent-weibo' >&#xf1d5; tencent weibo</option>
                                                                        <option value='terminal' >&#xf120; terminal</option>
                                                                        <option value='themeisle' >&#xf2b2; themeisle</option>
                                                                        <option value='thermometer' >&#xf2c7; thermometer</option>
                                                                        <option value='thumb-tack' >&#xf08d; thumb tack</option>
                                                                        <option value="thumbs-down" >&#xf165; Thumbs down</option>
                                                                        <option value='thumbs-o-down' >&#xf088; thumbs o down</option>
                                                                        <option value='thumbs-o-up' >&#xf087; thumbs o up</option>
                                                                        <option value='thumbs-up' >&#xf164; thumbs up</option>
                                                                        <option value='ticket'>&#xf145; ticket</option>
                                                                        <option value='times' >&#xf00d; times</option>
                                                                        <option value="times-circle" >&#xf057; Times circle</option>
                                                                        <option value='times-circle-o' >&#xf05c; times circle o</option>
                                                                        <option value='times-rectangle'>&#xf2d3; times rectangle</option>
                                                                        <option value='times-rectangle-o' >&#xf2d4; times rectangle o</option>
                                                                        <option value='tint' >&#xf043; tint</option>
                                                                        <option value='trademark' >&#xf25c; trademark</option>
                                                                        <option value='train'>&#xf238; train</option>
                                                                        <option value='transgender'>&#xf224; transgender</option>
                                                                        <option value='transgender-alt' >&#xf225; transgender alt</option>
                                                                        <option value='trash' >&#xf1f8; trash</option>
                                                                        <option value='trash-o' >&#xf014; trash o</option>
                                                                        <option value='tree' >&#xf1bb; tree</option>
                                                                        <option value='trello' >&#xf181; trello</option>
                                                                        <option value='tripadvisor' >&#xf262; tripadvisor</option>
                                                                        <option value='trophy'>&#xf091; trophy</option>
                                                                        <option value='truck' >&#xf0d1; truck</option>
                                                                        <option value='try' >&#xf195; try</option>
                                                                        <option value='tty' >&#xf1e4; tty</option>
                                                                        <option value='tumblr'>&#xf173; tumblr</option>
                                                                        <option value='turkish-lira' >&#xf195; turkish lira</option>
                                                                        <option value='tv' >&#xf26c; tv</option>
                                                                        <option value='twitch'>&#xf1e8; twitch</option>
                                                                        <option value='twitter' >&#xf099; twitter</option>


                                                                        <option value='umbrella' >&#xf0e9; umbrella</option>
                                                                        <option value='underline' >&#xf0cd; underline</option>
                                                                        <option value='undo' >&#xf0e2; undo</option>
                                                                        <option value='universal-access' >&#xf29a; universal access</option>
                                                                        <option value='university' >&#xf19c; university</option>
                                                                        <option value='unlink' >&#xf127; unlink</option>
                                                                        <option value='unlock' >&#xf09c; unlock</option>
                                                                        <option value='unlock-alt' >&#xf13e; unlock alt</option>
                                                                        <option value='unsorted' >&#xf0dc; unsorted</option>
                                                                        <option value='upload' >&#xf093; upload</option>
                                                                        <option value='usb' >&#xf287; usb</option>
                                                                        <option value='usd' >&#xf155; usd</option>
                                                                        <option value="user" >&#xf007; User</option>
                                                                        <option value="user-circle" >&#xf2bd; User circle</option>
                                                                        <option value='user-circle-o' >&#xf2be; user circle o</option>
                                                                        <option value='user-md' >&#xf0f0; user md</option>
                                                                        <option value='user-o' >&#xf2c0; user o</option>
                                                                        <option value='user-plus' >&#xf234; user plus</option>
                                                                        <option value='user-secret'>&#xf21b; user secret</option>
                                                                        <option value='user-times' >&#xf235; user times</option>
                                                                        <option value='users' >&#xf0c0; users</option>
                                                                        <option value='vcard' >&#xf2bb; vcard</option>
                                                                        <option value='vcard-o' >&#xf2bc; vcard-o</option>
                                                                        <option value='venus' >&#xf221; venus</option>
                                                                        <option value='venus-double' >&#xf226; venus double</option>
                                                                        <option value='venus-mars'>&#xf228; venus mars</option>
                                                                        <option value='viacoin' >&#xf237; viacoin</option>
                                                                        <option value='viadeo'>&#xf2a9; viadeo</option>
                                                                        <option value='viadeo-square' >&#xf2aa; viadeo square</option>
                                                                        <option value='video-camera' >&#xf03d; video camera</option>
                                                                        <option value='vimeo' >&#xf27d; vimeo</option>
                                                                        <option value='vimeo-square' >&#xf194; vimeo square</option>
                                                                        <option value='vine' >&#xf1ca; vine</option>
                                                                        <option value='vk' >&#xf189; vk</option>
                                                                        <option value='volume-control-phone' >&#xf2a0; volume control phone</option>
                                                                        <option value='volume-down' >&#xf027; volume down</option>
                                                                        <option value='volume-off' >&#xf026; volume off</option>
                                                                        <option value='volume-up'>&#xf028; volume up</option>
                                                                        <option value='warning' >&#xf071; warning</option>
                                                                        <option value='weibo'>&#xf18a; weibo</option>
                                                                        <option value='weixin' >&#xf1d7; weixin</option>
                                                                        <option value='whatsapp' >&#xf232; whatsapp</option>
                                                                        <option value='wheelchair'>&#xf193; wheelchair</option>
                                                                        <option value='wheelchair-alt' >&#xf29b; wheelchair alt</option>
                                                                        <option value='wifi' >&#xf1eb; wifi</option>
                                                                        <option value='wikipedia-w' >&#xf266; wikipedia w</option>
                                                                        <option value='window-close'>&#xf2d3; window close</option>
                                                                        <option value='window-close-o' >&#xf2d4; window close o</option>
                                                                        <option value='window-maximize' >&#xf2d0; window maximize</option>
                                                                        <option value='window-minimize' >&#xf2d1; window minimize</option>
                                                                        <option value='window-restore' >&#xf2d2; window restore</option>
                                                                        <option value='windows' >&#xf17a; windows</option>
                                                                        <option value='won' >&#xf159; won</option>
                                                                        <option value='wordpress' >&#xf19a; wordpress</option>
                                                                        <option value='wpbeginner' >&#xf297; wpbeginner</option>
                                                                        <option value='wpexplorer' >&#xf2de; wpexplorer</option>
                                                                        <option value='wpforms' >&#xf298; wpforms</option>
                                                                        <option value='wrench' >&#xf0ad; wrench</option>
                                                                        <option value='yahoo' >&#xf19e; yahoo</option>
                                                                        <option value='yc' >&#xf23b; yc</option>
                                                                        <option value='yelp' >&#xf1e9; yelp</option>
                                                                        <option value='yen' >&#xf157; yen</option>
                                                                        <option value='youtube' >&#xf167; youtube</option>
                                                                    </select>

                                                                    <button class="btn btn-danger remove-field"><i class="ri-delete-bin-line" aria-hidden="true"></i></button>
                                                                </div>
                                                                <div class="row mb-3 attribute-values" id="addValues">
                                                                    <div class="col-md-12 col-6">
                                                                        <label for="title" class="text-heading">Icon Title <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control " id="title" name="title[]"/>
                                                                        <div class="invalid-feedback">
                                                                            Please enter a icon title.
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 col-6 mt-4">
                                                                        <label for="icon_description" class="text-heading">Icon Description<span class="text-muted text-danger">*</span></label>
                                                                        <textarea class="form-control" rows="6" maxlength="140" name="icon_description[]" id="icon_description" required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Please enter a icon description.
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="text-end mt-3 mb-3">
                                                        <a href="javascript:void(0)" class="btn btn-success btn-sm" id="add-field"><i class="ri-add-line" aria-hidden="true"></i> Add More </a>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3 mb-3">
                                    <button type="submit" class="btn btn-success w-sm">{{(count($recruitment)>0) ? 'Update Process':'Add Process'}}</button>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="tab-pane fade" id="status-overview" role="tabpanel">

                                {!! Form::open(['url'=>route('homepage.grievance', @$settings->id),'id'=>'status-terms-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                <div class="row  mb-4">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label class="form-label" for="website-name-input">Heading</label>
                                                    <input type="text" class="form-control" id="website-name-input" name="grievance_heading" value="{{@$settings->grievance_heading}}"
                                                           placeholder="Enter grievance heading" required>
                                                </div>
                                                <div class="position-relative mb-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control" maxlength="880" id="ckeditor-classic" name="grievance_description" placeholder="Enter grievance description" rows="6" required>{{@$settings->grievance_description}}</textarea>
                                                    <div class="invalid-tooltip">
                                                        Please enter the website summary.
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" name="grievance_button" value="{{@$settings->grievance_button}}"
                                                           placeholder="Enter grievance button text" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Link</label>
                                                    <input type="text" class="form-control" name="grievance_link" value="{{@$settings->grievance_link}}"
                                                           placeholder="Enter grievance button link" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end mb-3">
                                            <button type="submit" class="btn btn-success w-sm">{{(@$settings->grievance_heading !== null) ? "Update Grievance":"Save Grievance"}}</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}


                            </div>

                        @endif

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


    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{asset('assets/backend/custom_js/homepage.js')}}"></script>
    <script type="text/javascript">
        var all_process = [];
        <?php foreach(@$recruitment as $key => $val){ ?>
        all_process.push('<?php echo $val->id; ?>');
        <?php } ?>

        $(document).ready(function () {
            if(all_process.length==9){
                $('#add-field').addClass('add-disabled');
            }else{
                $('#add-field').removeClass('add-disabled');
            }
        });

        var counter = 0;
        $('#multi-field-wrapper').each(function() {
            var $wrapper = $('#multi-fields', this);

            //disable the delete button if the cloned div is just one
            clonecount = $('.multi-field').length;
            if(clonecount == 1){
                $('.remove-field').addClass('add-disabled');
            }

            $("#add-field", $(this)).click(function(e) {
                counter++;
                clonecount = clonecount + 1;
                //remove the disable option for button once the cloned div is more than 1
                if(clonecount > 1){
                    $('.remove-field').removeClass('add-disabled');
                }
                if(clonecount > 8){
                    $('#add-field').addClass('add-disabled');
                }
                //clone the element and add the id to div to make select field unique.
                var newElem = $('.multi-field:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-' + counter).find("input").val("");
                //remove the initial id from select and add new ID
                $('.multi-field').find('select').last().removeAttr('id').attr('id', 'icon_clone_' + counter).find('option').focus();
                $('.multi-field').find('textarea').last().val('');

                $('.multi-field').find('select').last().val('');
            });

            $('.multi-field .remove-field', $wrapper).click(function() {
                clonecount = clonecount - 1;
                if(clonecount < 9){
                    $('#add-field').removeClass('add-disabled');
                }
                if(clonecount == 1){
                    $('.remove-field').addClass('add-disabled');
                }else if (clonecount > 1){
                    $('.remove-field').removeClass('add-disabled');
                }
                if ($('.multi-field', $wrapper).length > 1){
                    $(this).parent('.input-group').parent('.multi-field').remove();
                }
            });

        });

    </script>


@endsection
