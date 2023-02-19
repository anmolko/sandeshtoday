@extends('frontend.layouts.master')
@section('title') User Dashboard @endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link href="{{asset('assets/backend/css/sweetalert.css')}}" rel="stylesheet">

    <style>
        .title{
            display: block;
            white-space: break-spaces;
            max-width: 650px;
            font-size: 20px;
            line-height: 1.6;
        }

        .comment-table{
            font-family: "Mukta", "Khand", sans-serif;
        }
        .comment-table tbody td{
            font-size: 16px;
            line-height: 1.6;
        }
        .btn-color-white{
            color: white;
        }
        .tab-content{
            margin: 50px 0 150px;
        }


    </style>
@endsection
@section('content')

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#firsttab" data-toggle="tab">Comments</a></li>
                        <li><a href="#secondtab" data-toggle="tab">Profile</a></li>
                        <li style="float: right"><a href="#" onclick="event.preventDefault();
                                                                 document.getElementById('customer-logout-form').submit();" id="v-pills-settings-tab" aria-selected="false">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                <form id="customer-logout-form" action="{{ route('logout') }}"  method="POST" class="d-none">
                                    @csrf
                                </form>
                                </a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="firsttab">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table id="all-comments" class="table table-striped responsive" role="grid" aria-describedby="basic-col-reorder_info">
                                        <thead>
                                        <tr>
                                            <th>Comment</th>
                                            <th>Commented on</th>
                                            <th>Type</th>
                                            <th>Interaction</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($user->comments)>0)
                                            @foreach($user->comments as  $comment)
                                                <tr>
                                                    <td>
                                                        <span class="title">{{@$comment->comment}}</span></td>
                                                    <td>{{number_format(@$comment->publishedDateNepali())}}</td>
                                                    <td>{{ (@$comment->parent_id !== null) ? "Replied to comment":"Main Comment"}}</td>
                                                    <td> Like: {{ @$comment->likes()  }} <br/> Dislike: {{ @$comment->dislikes()  }} <br/> Replies: {{ count(@$comment->replies)  }}</td>
                                                    <td class="text-right">
                                                        <a class="btn btn-sm btn-success btn-color-white" href="{{ url($comment->blog->url()) }}" target="_blank">
                                                            <i class="fa fa-eye"></i> </a>
                                                        <a class="btn btn-sm btn-warning btn-color-white action-delete" href="#" hrm-delete-per-action="{{route('comments.destroy',$comment->id)}}">
                                                            <i class="fa fa-trash"></i> </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" style="text-align: center">You have not made any comments yet. Look through our <a href="{{route('blog.frontend')}}" style="color: #0a90eb">News list</a> to get started.</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <form action="#" method="post" id="deleted-form" >
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                </form>
                            </div>

                        </div>
                        <div class="tab-pane" id="secondtab">
                            <div class="tab-content">
                                <div class="contact-form-box">
                                    {!! Form::open(['url'=>route('front-user.update', @$user->id),'class'=>'needs-validation','method'=>'PUT','id'=>'contact-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="name">Display Name <span class="text-warning">*</span></label>
                                                <input id="name" name="name" value="{{@$user->name}}" type="text" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="mail">User Name</label>
                                                <input id="mail" name="address" value="{{@$user->address}}" type="text">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="submit">Submit</label>
                                                <button type="submit" id="submit-contact">
                                                    <i class="fa fa-paper-plane"></i> Update Details
                                                </button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="{{asset('assets/backend/js/sweetalert.min.js')}}"></script>

    <script>

    var table = $('#all-comments').DataTable({
        "orderable": false,
        "bSort" : false,
        "lengthMenu": [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
    });

    $(document).on('click','.customer-remove', function (e) {
        e.preventDefault();
        var action = $(this).attr('hrm-delete-per-action');
        swal({
            title: "Are You Sure?",
            text: "Your login credentials including order details will be removed permanently!",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function(){
            $.get( action )
                .done(function(response) {
                    if(response.status == 'success'){
                        swal("Deleted!", "Your credential was removed successfully", "success");
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                    }else{
                        swal("Error!", "Something went wrong. Please try again later", "error");
                        $(response).remove();
                    }

                })
                .fail(function(response){
                    console.log(response)

                });
        });
    });

    $(document).on('click','.action-delete', function (e) {
        e.preventDefault();
        var form = $('#deleted-form');
        var action = $(this).attr('hrm-delete-per-action');
        form.attr('action',$(this).attr('hrm-delete-per-action'));
        $url = form.attr('action');
        var form_data = form.serialize();
        // $('.deleterole').attr('action',action);
        swal({
            title: "Are You Sure?",
            text: "Your comment and its replies will be removed permanently !",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        }, function(){
            $.post( $url, form_data)
                .done(function(response) {

                    swal("Deleted!", "Comment was removed successfully", "success");
                    $(response).remove();
                    setTimeout(function() {
                        window.location.reload();
                    }, 2500);


                })
                .fail(function(response){
                    console.log(response)

                });
        });
    });


</script>
@endsection
