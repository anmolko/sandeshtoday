@extends('backend.layouts.master')
@section('title', "User Management Index")
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">

<link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">

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
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Management</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">User Management</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addmembers"><i class="ri-add-fill me-1 align-bottom"></i> Add Users</button>

                            </div>
                        </div><!--end col-->
                        <div class="col-sm-4 col-sm-auto ms-auto">
                            <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
                                        All Users
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
                                        Admin
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-messages-1" role="tab">
                                        General
                                    </a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-settings-1" role="tab">
                                        Viewers
                                    </a>
                                </li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div>

            <div class="col-xxl-12">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="team-list list-view-filter row" id="user-list">
                                        @foreach($users as $user)
                                            <div class="col" id="user-block-cover-{{$user->id}}">
                                                <div class="card team-box" id="user-block-num-{{$user->id}}">
                                                    <div class="team-cover">
                                                        <img src="{{ ($user->cover !== null) ? asset('images/user/cover/'.$user->cover) :  asset('assets/backend/images/profile-bg.jpeg')}}" alt="" class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="row align-items-center team-row">
                                                            <div class="col-lg-4 col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2" style="display: none">
                                                                            <input type="checkbox" id="favourite1" class="bookmark-input bookmark-hide">
                                                                            <label for="favourite1" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star"></use>
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                            @if(@$user->user_type !== 'viewer')
                                                                                <li><a class="dropdown-item" href="{{route('profile',$user->slug)}}"><i class="ri-eye-line me-2 align-middle"></i>Profile</a></li>
                                                                                <li><a class="dropdown-item cs-role-change" id="cs-role-change-{{$user->id}}" cs-user-role="{{@$user->user_type}}" cs-user-id="{{@$user->id}}" cs-update-route="{{route('user-type.update',$user->id)}}"><i class="ri-shield-user-line me-2 align-middle"></i>User Type</a></li>
                                                                            @endif
                                                                            <li><a class="dropdown-item cs-user-remove" cs-delete-route="{{route('user.destroy',$user->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        @if(@$user->user_type == 'viewer')
                                                                            <img src="{{ ($user->image !== null) ? $user->image:  asset('assets/backend/images/default.png')}}" alt="" class="img-fluid d-block rounded-circle viewer" />
                                                                        @else
                                                                            <img src="{{ ($user->image !== null) ? asset('images/user/'.$user->image) :  asset('assets/backend/images/default.png')}}" alt="" class="img-fluid d-block rounded-circle" />
                                                                        @endif
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <h5 class="fs-16 mb-1">{{ucwords(@$user->name)}}</h5>
                                                                        <p class="text-muted mb-0">{{@$user->email}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed" id="user-role-block-{{$user->id}}">
                                                                        <h5 class="mb-1">{{ucwords(@$user->user_type)}}</h5>
                                                                        <p class="text-muted mb-0">User Role</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">{{($user->contact == null) ? 'Not Added':@$user->contact}}</h5>
                                                                        <p class="text-muted mb-0">Contact</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <div class="btn-group view-btn" id="user-status-button-{{$user->id}}">
                                                                        <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                            @if($user->status == 0) Inactive @else Active  @endif
                                                                        </button>
                                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                            @if($user->status == 0)
                                                                                <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="1">Active</a></li>
                                                                            @else
                                                                                <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="0">Inactive</a></li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--end card-->
                                            </div>
                                        @endforeach
                                    </div><!--end row-->
                                    <form action="#" method="post" id="deleted-form">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" >

                                    <div class="table-responsive  mt-3 mb-1">
                                        <table id="user-index" class="table align-middle table-nowrap table-striped user-index">
                                            <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($admin))
                                                @darpanloop($admin as $user)
                                                <tr id="user-block-cover2-{{$user->id}}">
                                                    <td>
                                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                           <img src="{{ ($user->image !== null) ? asset('images/user/'.$user->image) :  asset('assets/backend/images/default.png')}}" alt="" class="img-fluid d-block rounded-circle" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ucwords(@$user->name)}}
                                                    </td>
                                                    <td>
                                                        {{@$user->email}}
                                                    </td> <td>
                                                        {{($user->contact == null) ? 'Not Added':@$user->contact}}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group view-btn" id="user-status-2-button-{{$user->id}}">
                                                            <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                @if($user->status == 0) Inactive @else Active  @endif
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                @if($user->status == 0)
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="1">Active</a></li>
                                                                @else
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="0">Inactive</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="bookmark-icon flex-shrink-0 me-2" style="display: none">
                                                                    <input type="checkbox" id="favourite1" class="bookmark-input bookmark-hide">
                                                                    <label for="favourite1" class="btn-star">
                                                                        <svg width="20" height="20">
                                                                            <use xlink:href="#icon-star"></use>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item" href="{{route('profile',$user->slug)}}"><i class="ri-eye-line me-2 align-middle"></i>Profile</a></li>
                                                                    <li><a class="dropdown-item cs-role-change" id="cs-role-change-{{$user->id}}" cs-user-role="{{@$user->user_type}}" cs-user-id="{{@$user->id}}" cs-update-route="{{route('user-type.update',$user->id)}}"><i class="ri-shield-user-line me-2 align-middle"></i>User Type</a></li>
                                                                    <li><a class="dropdown-item cs-user-remove" cs-delete-route="{{route('user.destroy',$user->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
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
                                </div><!--admin row-->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pill-justified-messages-1" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" >

                                    <div class="table-responsive  mt-3 mb-1">
                                        <table id="user-index" class="table align-middle table-nowrap table-striped user-index">
                                            <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($general))
                                                @darpanloop($general as $user)
                                                <tr id="user-block-cover2-{{$user->id}}">
                                                    <td>
                                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                <img src="{{ ($user->image !== null) ? asset('images/user/'.$user->image) :  asset('assets/backend/images/default.png')}}" alt="" class="img-fluid d-block rounded-circle" />
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ucwords(@$user->name)}}
                                                    </td>
                                                    <td>
                                                        {{@$user->email}}
                                                    </td> <td>
                                                        {{($user->contact == null) ? 'Not Added':@$user->contact}}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group view-btn" id="user-status-2-button-{{$user->id}}">
                                                            <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                @if($user->status == 0) Inactive @else Active  @endif
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                @if($user->status == 0)
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="1">Active</a></li>
                                                                @else
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="0">Inactive</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="bookmark-icon flex-shrink-0 me-2" style="display: none">
                                                                    <input type="checkbox" id="favourite1" class="bookmark-input bookmark-hide">
                                                                    <label for="favourite1" class="btn-star">
                                                                        <svg width="20" height="20">
                                                                            <use xlink:href="#icon-star"></use>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item" href="{{route('profile',$user->slug)}}"><i class="ri-eye-line me-2 align-middle"></i>Profile</a></li>
                                                                    <li><a class="dropdown-item cs-role-change" id="cs-role-change-{{$user->id}}" cs-user-role="{{@$user->user_type}}" cs-user-id="{{@$user->id}}" cs-update-route="{{route('user-type.update',$user->id)}}"><i class="ri-shield-user-line me-2 align-middle"></i>User Type</a></li>
                                                                    <li><a class="dropdown-item cs-user-remove" cs-delete-route="{{route('user.destroy',$user->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
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
                                </div><!--general row-->
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="pill-justified-settings-1" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row" >

                                    <div class="table-responsive  mt-3 mb-1">
                                        <table id="user-index" class="table align-middle table-nowrap table-striped user-index">
                                            <thead class="table-light">
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Login Method</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($viewers))
                                                @darpanloop($viewers as $user)
                                                <tr id="user-block-cover2-{{$user->id}}">
                                                    <td>

                                                        <div class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                <img src="{{ ($user->image !== null) ? $user->image:  asset('assets/backend/images/default.png')}}" alt="" class="img-fluid d-block rounded-circle viewer" />
                                                        </div>

                                                    </td>
                                                    <td>
                                                        {{ucwords(@$user->name)}}
                                                    </td>
                                                    <td>
                                                        {{@$user->email}}
                                                    </td> <td>
                                                        {{( @$user->oauth_type == null) ? 'Not Added': ucfirst(@$user->oauth_type)}}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group view-btn" id="user-status-2-button-{{$user->id}}">
                                                            <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                                @if($user->status == 0) Inactive @else Active  @endif
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                @if($user->status == 0)
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="1">Active</a></li>
                                                                @else
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('user-status.update',$user->id)}}" href="#" cs-status-value="0">Inactive</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="bookmark-icon flex-shrink-0 me-2" style="display: none">
                                                                    <input type="checkbox" id="favourite1" class="bookmark-input bookmark-hide">
                                                                    <label for="favourite1" class="btn-star">
                                                                        <svg width="20" height="20">
                                                                            <use xlink:href="#icon-star"></use>
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item cs-user-remove" cs-delete-route="{{route('user.destroy',$user->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
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
                                </div><!--Viewer row-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            <!-- Offset Position -->



        </div><!-- container-fluid -->
    </div><!-- End Page-content -->

    @include('backend.user.modal.add')
    @include('backend.user.modal.user-role')

@endsection

@section('js')
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- profile init js -->
    <script src="{{asset('assets/backend/js/pages/team.init.js')}}"></script>
    <!-- password -->
    <script src="{{asset('assets/backend/js/pages/password-addon.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('assets/backend/custom_js/user-mgm.js')}}"></script>
@endsection
