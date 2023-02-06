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
                <div class="col-lg-4">
                    {!! Form::open(['route' => 'ads.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                    <div class="card">
                        <div class="card-body">
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
                                        <option value="post-side-bar-banner">Post SideBar Banner - 10 total</option>
                                        <option value="post-end">Post End</option>
                                    </optgroup>
                                    <optgroup label="Home Page">
                                        <option value="home-besides-logo">Home Besides Logo</option>
                                        <option value="home-above-featured-post">Home Above Featured Post</option>
                                        <option value="home-below-featured-post">Home Below Featured Post</option>
                                        <option value="home-sidebar-banner">Home Sidebar Banner (use 300 x 200px size-14 total)</option>
                                        <option value="home-banner">Home Banner-9 total</option>
                                    </optgroup>
                                </select>
                                <div class="invalid-feedback">
                                    Please select the ad placement.
                                </div>
                            </div>
                            <div>
                                <img  id="current-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                <input  type="file" accept="image/png, image/jpeg, image/gif" hidden
                                        id="profile-foreground-img-file-input" onchange="loadFile(event)" name="image" required
                                        class="profile-foreground-img-file-input" >
                                <div class="invalid-feedback" >
                                    Please select a image.
                                </div>
                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Add Image/Gif
                                </label>
                            </div>


                        </div>
                    </div>
                    <!-- end card -->

                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm form-control" id="ads-add-button">Submit</button>
                    </div>
                    {!! Form::close() !!}



                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                        <h4 class="card-title mb-0"> Ads List </h4>
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
                                            @darpanloop($ads as $ad)
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
                                                                <li><a class="dropdown-item change-status" cs-update-route="{{route('ads-status.update',$ad->id)}}" href="#" cs-status-value="active">Active</a></li>
                                                            @else
                                                                <li><a class="dropdown-item change-status" cs-update-route="{{route('ads-status.update',$ad->id)}}" href="#" cs-status-value="inactive">Inactive</a></li>
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
                                                                <li><a class="dropdown-item cs-ads-edit"  cs-update-route="{{route('ads.update',$ad->id)}}" cs-edit-route="{{route('ads.edit',$ad->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                <li><a class="dropdown-item cs-ads-remove" cs-delete-route="{{route('ads.destroy',$ad->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            @enddarpanloop
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
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    @include('backend.ads.modals.edit')


@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var dataTable = $('#ads-index').DataTable({
                paging: true,
                searching: true,
                ordering:  false,
                lengthMenu: [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]],
            });

        });
        var loadFile = function(event) {
            var image = document.getElementById('image');
            var replacement = document.getElementById('current-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).on('click','.change-status', function (e) {
            e.preventDefault();
            var status = $(this).attr('cs-status-value');
            var url = $(this).attr('cs-update-route');
            if(status == '0'){
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
                        'Changing Status to Inactive will halt user actions</p>' +
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
                        statusupdate(url,status)
                        :
                        t.dismiss === Swal.DismissReason.cancel &&
                        Swal.fire({
                            title: "Cancelled",
                            text: "Ad status was not changed.",
                            icon: "error",
                            confirmButtonClass: "btn btn-primary mt-2",
                            buttonsStyling: !1
                        });
                });

            }else{
                statusupdate(url,status);
            }

        });

        function statusupdate(url,status){
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
                        var status_url        = "/auth/advertisements/"+response.id+"/update/";
                        var replacementblock  = '#ads-status-button-'+response.id;
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
                                'Advertisement Status has been updated .</p>' +
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
                                'Advertisement status could not be changed at the moment .</p>' +
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
        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).on('click','.cs-ads-edit', function (e) {
            e.preventDefault();
            // console.log(action)
            var action = $(this).attr('cs-update-route');
            $.ajax({
                url: $(this).attr('cs-edit-route'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    // $('#id').edit_ads(data.id);
                    $("#edit_ads").modal("toggle");
                    $('#update-name').attr('value',dataResult.name);
                    $('#update-url').attr('value',dataResult.url);
                    $('#update-status').attr('value',dataResult.status);
                    $('#placement-update option[value="'+dataResult.placement+'"]').prop('selected', true);
                    $('#current-ads-img').attr('src','/images/banners/'+dataResult.image);

                    $('.updateads').attr('action',action);
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
