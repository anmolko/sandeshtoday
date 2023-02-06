@extends('backend.layouts.master')
@section('title', "Edit Blog")
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .cke_contents {
            height: 900px!important;
        }

            .blog-feature-image{
            }
            .feature-image-button{
                position: absolute;
                top: 25%;
            }
            .profile-foreground-img-file-input {
                display: none;
            }
            input.large {
                width: 25px;
                height: 25px;
            }
            .check-label{
                line-height: 2rem;
                padding-left: 5px;
                display: inline-block;
                text-transform: lowercase
            }
            .check-label:first-letter {
                text-transform: uppercase
            }
            .most-used-list ul {
                margin: 0;
                padding: 0;
            }
            .most-used-list ul li{
                display: inline-block;
                margin-right: 8px;
            }

            .suggestions button{
                font-size: 12px;
                margin: 0;
                padding: 0;
                box-shadow: none;
                border: 0;
                border-radius: 0;
                background: none;
                outline: none;
                text-align: left;
                color: #007cba;
                text-decoration: underline;
                transition-property: border,background,color;
                transition-duration: .05s;
                transition-timing-function: ease-in-out;
                height: auto;
            }
    </style>
@endsection
@section('content')


    <div class="page-content">
        <div class="container-fluid" style="position:relative;">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Blog
                        </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('blog.index')}}">Blog</a></li>
                                <li class="breadcrumb-item active">Edit Blog</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            {!! Form::open(['url'=>route('blog.update', @$edit->id),'method'=>'put','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

            <div class="row">

                <div class="col-lg-8">
                    <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">General</h4>
                        <div class="flex-shrink-0">
                            <a  href="{{ url($edit->url()) }}" target="_blank" class="btn btn-soft-primary btn-sm"">
                               <i class=" ri-eye-line align-middle"></i> View in frontend
                            </a>
                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="blog-title-input">Blog Title <span class="text-danger">*</span></label>
                                    <input type="text" class="mukta form-control" name="title" id="blog-title-input"
                                           value="{{@$edit->title}}" required>
                                        <div class="invalid-feedback">
                                            Please enter the blog title.
                                        </div>
                                </div>
                                <div  class="mb-3">
                                    <label class="form-label" for="meta-excerpt-input">Excerpt</label>
                                    <textarea class="mukta form-control" id="meta-excerpt-input" maxlength="260" name="excerpt" rows="6">{{@$edit->excerpt}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Post Description  <span class="text-danger">*</span></label>

                                    <textarea class="mukta form-control" id="ckeditor-classic" name="description" rows="3" required>{!! @$edit->description !!}</textarea>
                                    <div class="invalid-tooltip">
                                        Please enter the post description.
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end card -->


                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#addblog-metadata"
                                            role="tab">
                                            Meta Data
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="addblog-metadata" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="meta-title-input">Meta title</label>
                                                    <input type="text" class="form-control" name="meta_title" id="meta-title-input" value="{{@$edit->meta_title}}">
                                                </div>
                                            </div>
                                            <!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="meta-keywords-input">Meta Keywords <span class="text-muted fs-10">Press enter after each keyword.</span></label>
                                                    <input type="text" class="mukta form-control" name="meta_tags" id="meta-keywords-input" value="{{@$edit->meta_tags}}" data-choices data-choices-text-unique-true>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div>
                                            <label class="form-label" for="meta-description-input">Meta Description</label>
                                            <textarea class="mukta form-control" id="meta-description-input" name="meta_description" rows="3">{{@$edit->meta_description}}</textarea>
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
                            <button type="submit" class="btn btn-success w-sm">Update</button>
                        </div>



                </div>
                <!-- end col -->

                <div class="col-lg-4 ">
                    <div class="sticky-side-div">

                        <div class="card ">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Status</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="choices-publish-status-input" class="form-label">Status</label>

                                    <select class="form-select" id="choices-publish-status-input" name="status" data-choices data-choices-search-false>
                                        <option value="publish" @if(@$edit->status == "publish") selected @endif >Published</option>
                                        <option value="draft" @if(@$edit->status == "draft") selected @endif>Draft</option>
                                    </select>
                                </div>


                            </div>
                            <!-- end card body -->
                        </div>

                        {{--Feature post--}}
                        <div class="card ">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Feature Post</h5>
                                <span class="text-muted">Choose start/end date for post to be featured.</span>

                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="start_date" class="form-label">Start Date </label>
                                    <input type="text" class="mukta form-control" name="featured_from" id="featured_from" value="{{@$start}}">
                                    <div class="invalid-feedback">
                                        Please Select the start date.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="end_date" class="form-label">End Date </label>
                                    <input type="text" class="mukta form-control" name="featured_to" id="featured_to" value="{{@$end}}">
                                    <div class="invalid-feedback">
                                        Please Select the end date.
                                    </div>
                                </div>
                                <div class="form-check form-check-info">
                                    <input class="form-check-input large" name="show_featured_image" type="checkbox" value="yes"
                                           id="show_featured_image" {{ (@$edit->show_featured_image !== null) ? "checked":"" }}>
                                    <label class="mukta form-check-label check-label" for="show_featured_image">
                                        Show Featured Image
                                    </label>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#author-metadata"
                                           role="tab">
                                            Author details
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="author-metadata" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="authors-keywords-input">Author name(s) <span class="text-muted fs-10">Press enter after each name.</span></label>
                                                    <input type="text" class="mukta form-control" name="authors" value="{{@$edit->authors}}" id="authors-keywords-input" data-choices data-choices-text-unique-true>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end card body -->
                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Categories</h4>
                                <div class="flex-shrink-0">
                                    <button type="button" class="btn btn-soft-primary btn-sm cs-category-add"  cs-create-route="{{route('blogcategory.store')}}">
                                        Add New
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mx-n3">
                                    <div data-simplebar data-simplebar-auto-hide="false" data-simplebar-track="secondary" style="max-height: 600px; padding: 0px 16px;" >
                                        <div class="list-group list-group-flush" id="category-list">
                                            @if(!empty(@$categories))
                                                @foreach(@$categories as $categoryList)
                                                    <div class="form-check form-check-info">
                                                        <input class="form-check-input large" name="category_id[]" type="checkbox" value="{{$categoryList->id}}" id="formCheck{{$categoryList->id}}" {{ ($edit->hasCategory($categoryList->id)) ? "checked":"" }} >
                                                        <label class="mukta form-check-label check-label" for="formCheck{{$categoryList->id}}">
                                                            {{ ucwords(@$categoryList->name) }}
                                                        </label>
                                                        <div id="subcategory-list-{{$categoryList->id}}">
                                                            @if($categoryList->hasChildren())
                                                                @foreach($categoryList->children() as $subcategory)
                                                                    <div class="form-check form-check-info">
                                                                        <input class="form-check-input large" name="category_id[]" id="formsubCheck{{$subcategory->id}}" type="checkbox"
                                                                               value="{{ $subcategory->id }}" {{ ($edit->hasCategory($subcategory->id)) ? "checked":"" }}>
                                                                        <label class="mukta form-check-label check-label" for="formsubCheck{{$subcategory->id}}">
                                                                            {{ ucwords(@$subcategory->name) }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>

                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>

                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Tags</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <select
                                        class="mukta form-control"
                                        name="tags[]"
                                        id="tags_list"
                                        multiple="multiple">
                                        @if(!empty(@$tags))
                                            @foreach(@$tags as $tag)
                                                <option value="{{$tag->id}}" {{ ($edit->hasTag($tag->id)) ? "selected":"" }}>{{$tag->name}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Feature Image</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <img  id="current-img"  src="{{ ($edit->image !== null) ? asset('images/blog/'.$edit->image) :  asset('images/default-image.jpg') }}"  class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                    <input  type="file" accept="image/png, image/jpeg" hidden
                                        id="profile-foreground-img-file-input" onchange="loadFile(event)" name="image"
                                       class="profile-foreground-img-file-input" >

                                    <figcaption class="figure-caption">*use image minimum of 1230 x 790px </figcaption>
                                    <div class="invalid-feedback" >
                                            Please select a image.
                                        </div>
                                    <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                        <i class="ri-image-edit-line align-bottom me-1"></i> Add Feature Image
                                    </label>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>

            </div>
            {!! Form::close() !!}

            <!-- end row -->

        <!-- container-fluid -->
        </div>
    </div>

    @include('backend.blog.category_modal')

@endsection

@section('js')
{{--@include('backend.ckeditor')--}}
<script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--}}
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <!-- Sweet Alerts js -->
<script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('assets/backend/custom_js/blog_credit.js')}}"></script>

<script type="text/javascript">
    $(function() {
        $('#featured_from').datepicker({
            autoclose: "true",
            clearBtn:"true",
            format:"dd/mm/yyyy",
            todayHighlight: "true",
        });
        $('#featured_to').datepicker({
            autoclose: "true",
            clearBtn:"true",
            format:"dd/mm/yyyy",
            todayHighlight: "true",
        });
        var options = {
            filebrowserImageBrowseUrl: '/auth/darpan-filemanager?type=Images',
            filebrowserImageUploadUrl: '/auth/darpan-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/auth/darpan-filemanager?type=Files',
            filebrowserUploadUrl: '/auth/darpan-filemanager/upload?type=Files&_token={{csrf_token()}}',
            filebrowserWindowWidth: '640',
            filebrowserWindowHeight: '480'
        };
        CKEDITOR.replace( 'ckeditor-classic', options );

        $('.cke_editable').css('font-size','16px');

    });
</script>
@endsection
