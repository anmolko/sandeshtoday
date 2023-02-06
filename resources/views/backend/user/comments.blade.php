@extends('backend.layouts.master')
@section('title', "All User Comments")
@section('css')

    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .title,.related-category {
            display: block;
            white-space: break-spaces;
            width: 150px;
        }

        #blog-list{
            font-family: "Mukta", "Khand", "Glegoo", sans-serif;
            font-size: 16px;
        }
        .custom-height{
            height: 6em;
            width: 6em;
        }
        td.details-controls {
            text-align:center;
            cursor: pointer;
        }
        tr.shown td.details-controls {
            text-align:center;
        }

        td.details-control i {
            font-size: 16px;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Comments</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">All user comments</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                     <h4 class="card-title mb-0"> User Comments</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row" >

                                <div class="table-responsive  mt-3 mb-1">
                                    <table id="all-comments" class="table align-middle table-nowrap table-striped">
                                        <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Joined on</th>
                                        </tr>
                                        </thead>
                                        <tbody id="blog-list">
                                        @if(count($users)>0)
                                            @foreach($users as  $user)
                                                <tr data-child-value="{{$user}}">
                                                    <td class="details-control"><i class="btn btn-primary btn-sm ri-add-circle-fill" aria-hidden="true"></i></td>
                                                    <td>
                                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                            <img src="{{ ($user->image !== null) ? $user->image:  asset('assets/backend/images/default.png')}}" alt="" class="img-fluid d-block rounded-circle" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ucwords(@$user->name)}}
                                                    </td>
                                                    <td>
                                                        {{@$user->email}}
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse(@$order->created_at)->isoFormat('MMM Do, YYYY')}}</td>
                                                </tr>
                                            @endforeach
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


@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            function format(mainvalue) {
                console.log(mainvalue);
                var inner_table = '<table class="child_row-verified table-responsive table table-striped table-bordered nowrap">' +
                    '<thead>' +
                    '<tr>' +
                    '<th>Comment</th>' +
                    '<th>Type</th> ' +
                    '<th>Interaction</th> ' +
                    '<th>Action</th> ' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';

                $.each(mainvalue.comments, function( index, value ) {

                    var type     = (value.parent_id !== null) ? "Reply to a comment":"Main Comment";
                    var likes    = 0;
                    var dislikes = 0;
                    var first    = value.blog.created_at;
                    var created  = first.replace(new RegExp('-', 'g')," ");
                    var year     = created.slice(0, 4);
                    var month    = created.slice(1, 3);
                    var url      = '/post/'+year+'/'+month+'/'+value.blog.numeric_slug
                    var remove   = '/comments/'+value.id;

                    $.each(value.like_comment, function( index, val ) {
                        likes += Number(val.like);
                        dislikes += Number(val.dislike);
                    });
                    inner_table += '<td>' + value.comment + '</td>' +
                    '<td>' + type + '</td>' +
                    '<td> Likes: ' + likes +'<br/> Dislikes: '+ dislikes +'<br/> Replies: '+ value.replies.length +'</td>' +
                    '<td>' +
                        '<div class="row"> ' +
                        '<div class="btn-group-vertical gap-2 mt-4 mt-sm-0 fs-18"> ' +
                        '<a class="btn btn-outline-primary btn-icon waves-effect waves-light" href="'+ url +'" target="_blank"><i class="ri-eye-line"></i></a> ' +
                        '<a class="btn btn-outline-danger btn-icon waves-effect waves-light comment-remove" cs-delete-route="'+remove+'"><i class="ri-delete-bin-6-line"></i>' +
                        '</a>'
                        + '</div></div>'+

                        '</td>' +
                    '</tr>';
                });
                return inner_table;
            }

            all_comments();
            function all_comments(){
                var table = $('#all-comments').DataTable({
                    "orderable": false,
                    "bSort" : false,
                    "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                });

                // for all orders
                $('#all-comments tbody').off('click', 'td.details-control');
                $('#all-comments tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = table.row( tr );

                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child(format(tr.data('child-value'))).show();
                        tr.addClass('shown');
                    }
                } );
            }
        });

        $(document).on('click','.comment-remove', function (e) {
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
                    'User comment and its interaction will be removed permanently ?</p>' +
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
                                        '<p class="text-muted mx-4 mb-0"> Unable to remove comment and its interaction. Try again later.</p>' +
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
