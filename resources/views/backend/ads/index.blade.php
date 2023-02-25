@extends('backend.layouts.master')
@section('title', "Advertisements")
@section('css')

    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>

    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Advertisements</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Advertisements</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">


                <div class="col-xl-12 col-lg-8">
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold active" data-bs-toggle="tab" href="#site-advert" role="tab" aria-selected="true">
                                                    Website Advertisement <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{count($ads)}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#property-advert" role="tab" aria-selected="false">
                                                    Property Advertisement <span class="badge badge-soft-danger align-middle rounded-pill ms-1">{{count($property_ads)}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <div id="selection-element" style="display: none;">
                                            <div class="my-n1 d-flex align-items-center text-muted">
                                                Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="site-advert" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row g-4">
                                                            <div class="col-sm-auto">
                                                                <h4 class="card-title mb-0"> Add New </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! Form::open(['route' => 'ads.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                                        <div class="mb-3">
                                                            <label class="form-label" for="ads-title-input">Name</label>
                                                            <input type="text" name="name" class="form-control" id="ads-title-input"
                                                                   required>
                                                            <div class="invalid-feedback">
                                                                Please enter the title.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="url-input">URL</label>
                                                            <input type="text" name="url" class="form-control" id="url-input">
                                                            <div class="invalid-feedback">
                                                                Please enter the url.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="choices-publish-placement-input">Placement</label>
                                                            <select class="form-select" id="choices-publish-placement-input" name="placement" >
                                                                <optgroup label="Post Single Page">
                                                                    <option value="above-post-featured"> Above Post Featured</option>
                                                                    <option value="below-post-featured">Below Post Featured</option>
                                                                    <option value="in-between-post">In Between Post (use 250 x 250px size)  </option>
                                                                    <option value="post-side-bar-banner">Post SideBar Banner</option>
                                                                    <option value="post-end">Post End</option>
                                                                </optgroup>
                                                                <optgroup label="Home Page">
                                                                    <option value="home-besides-logo">Home Besides Logo</option>
                                                                    <option value="home-above-featured-post">Home Above Featured Post</option>
                                                                    <option value="home-below-featured-post">Home Below Featured Post</option>
                                                                    <option value="home-sidebar-banner">Home Sidebar Banner (use 300 x 250px size)</option>
                                                                    <option value="home-banner">Home Banner</option>
                                                                </optgroup>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select the ad placement.
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <img  id="current-advert-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                            <input  type="file" accept="image/png, image/jpeg, image/gif" hidden
                                                                    id="advert-foreground-img-file-input"
                                                                    onchange="loadbasicFile('advert-foreground-img-file-input','current-advert-img',event)"
                                                                    name="image" required
                                                                    class="profile-foreground-img-file-input">
                                                            <div class="invalid-feedback" >
                                                                Please select a image.
                                                            </div>
                                                            <label for="advert-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                                                <i class="ri-image-edit-line align-bottom me-1"></i> Add Image/Gif
                                                            </label>
                                                        </div>
                                                        <div class="text-end mb-3">
                                                            <button type="submit" class="btn btn-success w-sm form-control" id="ads-add-button">Submit</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row g-4">
                                                            <div class="col-sm-auto">
                                                                <h4 class="card-title mb-0"> List </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row" >

                                                            <div class="table-responsive  mt-3 mb-1">
                                                                <table id="ads-index" class="table align-middle table-nowrap table-striped">
                                                                    <thead class="table-light">
                                                                    <tr>
                                                                        <th>Ad Name</th>
                                                                        <th>URL</th>
                                                                        <th>Placement</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="ads-list">
                                                                    @if(!empty($ads))
                                                                        @sandeshloop($ads as $ad)
                                                                        <tr>
                                                                            <td>
                                                                                <span class="title"> {{ ucwords( @$ad->name) }} </span>
                                                                            </td>
                                                                            <td>
                                                                                {{  @$ad->url}}
                                                                            </td><td>
                                                                                {{  ucfirst(str_replace('-',' ',@$ad->placement))}}
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group view-btn" id="ads-status-button-{{$ad->id}}">
                                                                                    <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                        {{ucwords(@$ad->status)}}
                                                                                    </button>
                                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                                        @if($ad->status == "inactive")
                                                                                            <li><a class="dropdown-item change-status" data-value="ads" cs-update-route="{{route('ads-status.update',$ad->id)}}" href="#" cs-status-value="active">Active</a></li>
                                                                                        @else
                                                                                            <li><a class="dropdown-item change-status" data-value="ads" cs-update-route="{{route('ads-status.update',$ad->id)}}" href="#" cs-status-value="inactive">Inactive</a></li>
                                                                                        @endif
                                                                                    </ul>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="row">
                                                                                    <div class="col text-center dropdown">
                                                                                        <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                            <i class="ri-more-fill fs-17"></i>
                                                                                        </a>
                                                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                                            <li><a class="dropdown-item cs-ads-edit" data-value="ads" cs-update-route="{{route('ads.update',$ad->id)}}" cs-edit-route="{{route('ads.edit',$ad->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                                            <li><a class="dropdown-item cs-ads-remove" data-value="ads" cs-delete-route="{{route('ads.destroy',$ad->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        @endsandeshloop
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div><!--end row-->
                                                        <form action="#" method="post" id="deleted-form">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="property-advert" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row g-4">
                                                            <div class="col-sm-auto">
                                                                <h4 class="card-title mb-0">Add New </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        {!! Form::open(['route' => 'property-advertisement.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                                        <div class="mb-3">
                                                            <label class="form-label" for="ads-title-input">Name</label>
                                                            <input type="text" name="name" class="form-control" id="ads-title-input"
                                                                   required>
                                                            <div class="invalid-feedback">
                                                                Please enter the title.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="url-input">URL</label>
                                                            <input type="text" name="url" class="form-control" id="url-input">
                                                            <div class="invalid-feedback">
                                                                Please enter the url.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="url-input">Amount</label>
                                                            <input type="text" name="amount" class="form-control" id="amount-input">
                                                            <div class="invalid-feedback">
                                                                Please enter the amount.
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <img  id="current-property-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                                            <input  type="file" accept="image/png, image/jpeg, image/gif" hidden
                                                                    id="property-foreground-img-file-input"
                                                                    onchange="loadbasicFile('property-foreground-img-file-input','current-property-img',event)"
                                                                    name="image" required
                                                                    class="profile-foreground-img-file-input" >
                                                            <div class="invalid-feedback" >
                                                                Please select a image.
                                                            </div>
                                                            <label for="property-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                                                <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                                            </label>
                                                        </div>
                                                        <div class="text-end mb-3">
                                                            <button type="submit" class="btn btn-success w-sm form-control" id="ads-add-button">Submit</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="row g-4">
                                                            <div class="col-sm-auto">
                                                                <h4 class="card-title mb-0">List </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row" >

                                                            <div class="table-responsive  mt-3 mb-1">
                                                                <table id="property-ads-index" class="table align-middle table-nowrap table-striped">
                                                                    <thead class="table-light">
                                                                    <tr>
                                                                        <th>Ad Name</th>
                                                                        <th>URL</th>
                                                                        <th>Amount</th>
                                                                        <th>Status</th>
                                                                        <th class="text-right">Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="ads-list">
                                                                    @if(!empty($property_ads))
                                                                        @sandeshloop($property_ads as $ad)
                                                                        <tr>
                                                                            <td>
                                                                                <span class="title"> {{ ucwords( @$ad->name) }} </span>
                                                                            </td>
                                                                            <td>
                                                                                <span><a href="{{@$ad->url}}"> Go to URL</a></span>
                                                                            </td><td>
                                                                                {{ @$ad->amount }}
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group view-btn" id="ads-prop-status-button-{{$ad->id}}">
                                                                                    <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                                        {{ucwords(@$ad->status)}}
                                                                                    </button>
                                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                                        @if($ad->status == "inactive")
                                                                                            <li><a class="dropdown-item change-status" data-value="property" cs-update-route="{{route('property-advertisement.status-update',$ad->id)}}" href="#" cs-status-value="active">Active</a></li>
                                                                                        @else
                                                                                            <li><a class="dropdown-item change-status" data-value="property" cs-update-route="{{route('property-advertisement.status-update',$ad->id)}}" href="#" cs-status-value="inactive">Inactive</a></li>
                                                                                        @endif
                                                                                    </ul>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="row">
                                                                                    <div class="col text-center dropdown">
                                                                                        <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                            <i class="ri-more-fill fs-17"></i>
                                                                                        </a>
                                                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                                            <li><a class="dropdown-item cs-ads-edit" data-value="property" cs-update-route="{{route('property-advertisement.update',$ad->id)}}" cs-edit-route="{{route('property-advertisement.edit',$ad->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                                            <li><a class="dropdown-item cs-ads-remove" data-value="property" cs-delete-route="{{route('property-advertisement.destroy',$ad->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>

                                                                            </td>
                                                                        </tr>
                                                                        @endsandeshloop
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div><!--end row-->
                                                        <form action="#" method="post" id="deleted-form">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    @include('backend.ads.modals.edit')
    @include('backend.ads.modals.property_edit')


@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };
        $(document).ready(function () {
           $('#ads-index,#property-ads-index').DataTable({
                paging: true,
                searching: true,
                ordering:  false,
                lengthMenu: [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]],
            });

        });
        $(document).on('click','.change-status', function (e) {
            e.preventDefault();
            var status = $(this).attr('cs-status-value');
            var url    = $(this).attr('cs-update-route');
            var value  = $(this).attr('data-value');
            if(status !== 'active'){
                Swal.fire({
                    imageUrl: "/assets/backend/images/canosoft-logo.png",
                    imageHeight: 60,
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                        'style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Are your sure? </h4>' +
                        '<p class="text-muted mx-4 mb-0">' +
                        'This item cannot be viewed by users if status is set to inactive</p>' +
                        '</div>' +
                        '</div>',
                    showCancelButton: !0,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: "Yes!",
                    buttonsStyling: !1,
                    showCloseButton: !0
                }).then(function(t)
                {
                    t.value
                        ?
                        statusupdate(url,status,value)
                        :
                        t.dismiss === Swal.DismissReason.cancel &&
                        Swal.fire({
                            title: "Cancelled",
                            text: "Advertisement status was not changed.",
                            icon: "error",
                            confirmButtonClass: "btn btn-primary mt-2",
                            buttonsStyling: !1
                        });
                });

            }else{
                statusupdate(url,status,value);
            }

        });

        function statusupdate(url,status,value){
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                url: url,
                type: "PATCH",
                cache: false,
                data:{
                    status: status,
                },
                success: function(response){
                    if(response.status == "success"){
                        var oldstatus         = (status == 'inactive') ? "Active" :  "Inactive";
                        var status_url        = (value !=='property') ? "/auth/advertisements/"+response.id+"/update/":"/auth/property-advertisement/"+response.id+"/update/";
                        var replacementblock  = (value !=='property') ? '#ads-status-button-'+response.id:'#ads-prop-status-button-'+response.id;

                        var replacement = '<button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"> '
                            +
                            response.new_status
                            +
                            '</button><ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">' +
                            '<li>' +
                            '<a class="dropdown-item change-status" cs-update-route="'+status_url+'" href="#" cs-status-value="'+response.value+'">'+oldstatus+'</a>' +
                            '</li></ul>';

                        Swal.fire({
                            imageUrl: "/assets/backend/images/canosoft-logo.png",
                            imageHeight: 60,
                            html: '<div class="mt-2">' +
                                '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json"' +
                                'trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">' +
                                '</lord-icon>' +
                                '<div class="mt-4 pt-2 fs-15">' +
                                '<h4>Success !</h4>' +
                                '<p class="text-muted mx-4 mb-0">' +
                                response.message +
                                '</p>' +
                                '</div>' +
                                '</div>',
                            timerProgressBar: !0,
                            timer: 2e3,
                            showConfirmButton: !1
                        });
                        $(replacementblock).html('');
                        $(replacementblock).html(replacement);
                    }else{

                        Swal.fire({
                            imageUrl: "/assets/backend/images/canosoft-logo.png",
                            imageHeight: 60,
                            html: '<div class="mt-2">' +
                                '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                                ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                                'style="width:120px;height:120px"></lord-icon>' +
                                '<div class="mt-4 pt-2 fs-15">' +
                                '<h4>Oops...! </h4>' +
                                '<p class="text-muted mx-4 mb-0">' +
                                response.message +
                                '</p>' +
                                '</div>' +
                                '</div>',
                            timerProgressBar: !0,
                            timer: 3000,
                            showConfirmButton: !1
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        imageUrl: "/assets/backend/images/canosoft-logo.png",
                        imageHeight: 60,
                        html: '<div class="mt-2">' +
                            '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                            ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                            'style="width:120px;height:120px"></lord-icon>' +
                            '<div class="mt-4 pt-2 fs-15">' +
                            '<h4>Warning...! </h4>' +
                            '<p class="text-muted mx-4 mb-0">' +
                            'Could not confirm the status of the Advertisement.</p>' +
                            '</div>' +
                            '</div>',
                        timerProgressBar: !0,
                        timer: 3000,
                        showConfirmButton: !1
                    });
                }
            });
        }

        $(document).on('click','.cs-ads-edit', function (e) {
            e.preventDefault();
            // console.log(action)
            var action = $(this).attr('cs-update-route');
            var value  = $(this).attr('data-value');
            $.ajax({
                url: $(this).attr('cs-edit-route'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    if(value !== 'property'){
                        $("#edit_ads").modal("toggle");
                        $('#update-name').attr('value',dataResult.name);
                        $('#update-url').attr('value',dataResult.url);
                        $('#update-status').attr('value',dataResult.status);
                        $('#placement-update option[value="'+dataResult.placement+'"]').prop('selected', true);
                        $('#current-ads-img').attr('src','/images/banners/'+dataResult.image);
                        $('.updateads').attr('action',action);
                    }else{
                        $("#edit_property_ads").modal("toggle");
                        $('#update-prop-name').attr('value',dataResult.name);
                        $('#update-prop-url').attr('value',dataResult.url);
                        $('#update-prop-status').attr('value',dataResult.status);
                        $('#update-prop-amount').attr('value',dataResult.amount);
                        $('#current-prop-img').attr('src','/images/banners/'+dataResult.image);
                        $('.property-ads-update').attr('action',action);
                    }

                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.cs-ads-remove', function (e) {
            e.preventDefault();
            var form = $('#deleted-form');
            var action = $(this).attr('cs-delete-route');
            form.attr('action',action);
            var url = form.attr('action');
            var form_data = form.serialize();
            Swal.fire({
                imageUrl: "/assets/backend/images/canosoft-logo.png",
                imageHeight: 60,
                html: '<div class="mt-2">' +
                    '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                    ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                    'style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Are your sure? </h4>' +
                    '<p class="text-muted mx-4 mb-0">' +
                    'You want to Remove this Record ?</p>' +
                    '</div>' +
                    '</div>',
                showCancelButton: !0,
                confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                cancelButtonClass: "btn btn-danger w-xs mt-2",
                confirmButtonText: "Yes!",
                buttonsStyling: !1,
                showCloseButton: !0
            }).then(function(t)
            {
                t.value
                    ?
                    $.post( url, form_data)
                        .done(function(response) {
                            if(response.status == "success") {
                                Swal.fire({
                                    imageUrl: "/assets/backend/images/canosoft-logo.png",
                                    imageHeight: 60,
                                    html: '<div class="mt-2">' +
                                        '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json"' +
                                        'trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">' +
                                        '</lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Success !</h4>' +
                                        '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                                        '</div>' +
                                        '</div>',
                                    timerProgressBar: !0,
                                    timer: 2e3,
                                    showConfirmButton: !1
                                });

                                setTimeout(function() {
                                    location.reload();
                                }, 3000);
                            }else{
                                Swal.fire({
                                    imageUrl: "/assets/backend/images/canosoft-logo.png",
                                    imageHeight: 60,
                                    html: '<div class="mt-2">' +
                                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                                        'style="width:120px;height:120px"></lord-icon>' +
                                        '<div class="mt-4 pt-2 fs-15">' +
                                        '<h4>Oops...! </h4>' +
                                        '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                                        '</div>' +
                                        '</div>',
                                    timerProgressBar: !0,
                                    timer: 3000,
                                    showConfirmButton: !1
                                });
                            }
                        })
                        .fail(function(response){
                            console.log(response)
                        })

                    :
                    t.dismiss === Swal.DismissReason.cancel &&
                    Swal.fire({
                        title: "Cancelled",
                        text: "Advertisement was not removed.",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary mt-2",
                        buttonsStyling: !1
                    });
            });



        })


    </script>


@endsection
