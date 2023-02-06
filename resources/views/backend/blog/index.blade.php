@extends('backend.layouts.master')
@section('title', "All Post")
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
          .page-views{
              font-size: 14px;
              text-align: center;
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
                    <h4 class="mb-sm-0">Posts</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Posts</li>
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

                                    @if(@$tag!==null)
                                        <h4 class="card-title mb-0"> All Post Related to Tag <b>"{{ucfirst(@$tag->name)}}"</b></h4>
                                    @elseif(@$category!==null)
                                        <h4 class="card-title mb-0"> All Post Related to Category <b>"{{ucfirst(@$category->name)}}"</b></h4>
                                    @else
                                        <h4 class="card-title mb-0"> Post List</h4>

                                    @endif
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div>
                                            <a href="{{route('blog.create')}}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Add New</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">

                        <div class="row" >

                            <div class="table-responsive  mt-3 mb-1">
                                <table id="blog-index" class="table align-middle table-nowrap table-striped">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Feature Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="blog-list">
                                        @if(!empty($blogs))
                                            @darpanloop($blogs as $blog)
                                                <tr id="blog-individual-{{@$blog->id}}">
                                                    <td>
                                                        <img src="{{  ($blog->image !== null) ?  asset('/images/blog/'.@$blog->image) : asset('assets/backend/images/darpan_dainik.png')}}"
                                                             alt="{{@$blog->slug}}" class="figure-img rounded-circle {{  ($blog->image !== null) ? "avatar-lg":"custom-height"}}">
                                                    </td>
                                                    <td>
                                                     <span class="title"> {{ ucwords( @$blog->title) }} </span>
                                                    </td>
                                                    <td>
                                                                @foreach(@$blog->categories as $key=>$category)
                                                                    <a  href="{{route('blogcategory.blog',@$category->id)}}">{{ ucfirst(@$category->name) }}
                                                                   </a>{{($loop->last) ?"":"," }}
                                                                     @if (($key+1) % 5 === 0)
                                                                           <br>
                                                                     @endif
                                                                @endforeach

                                                    </td>
                                                    <td>
                                                        @foreach(@$blog->tags as $key=>$tag)
                                                            <a href="{{route('tag.blog',@$tag->id)}}">{{ucfirst(@$tag->name)}}
                                                            </a>{{($loop->last) ?"":"," }}
                                                            @if (($key+1) % 3 === 0)
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <p class="page-views"> Views:  {{$blog->totalCount()}} </p>
                                                        <div class="btn-group view-btn" id="blog-status-button-{{$blog->id}}">
                                                            <button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                            {{ucwords(@$blog->status)}}
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">
                                                                @if($blog->status == "draft")
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('blog-status.update',$blog->id)}}" href="#" cs-status-value="publish">Published</a></li>
                                                                @else
                                                                    <li><a class="dropdown-item change-status" cs-update-route="{{route('blog-status.update',$blog->id)}}" href="#" cs-status-value="draft">Draft</a></li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td >
                                                        <div class="row">

                                                            <div class="btn-group-vertical gap-2 mt-4 mt-sm-0 fs-18">
                                                                <a class="btn btn-outline-primary btn-icon waves-effect waves-light" href="{{ url($blog->url()) }}" target="_blank"><i class="ri-eye-line"></i></a>
                                                                <a class="btn btn-outline-success btn-icon waves-effect waves-light" href="{{route('blog.edit',$blog->id)}}"><i class="ri-pencil-fill"></i></a>
                                                                <a class="btn btn-outline-danger btn-icon waves-effect waves-light cs-blog-remove" cs-delete-route="{{route('blog.destroy',$blog->id)}}"><i class="ri-delete-bin-6-line"></i></a>

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


@endsection

@section('js')
<script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
<script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="{{asset('assets/backend/custom_js/blog.js')}}"></script>

@endsection
