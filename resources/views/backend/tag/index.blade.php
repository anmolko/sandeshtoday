@extends('backend.layouts.master')
@section('title', "Tags")
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .tag-descp{
            display: block;
            white-space: break-spaces;
            text-align: center;
        }
        #blog-tag-list{
            font-family: "Mukta", "Khand", "Glegoo", sans-serif;
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
                        <h4 class="mb-sm-0">Tags</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                <li class="breadcrumb-item active">Tags</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4">
                    {!! Form::open(['id' => 'blog-tag-add-form','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="tag-title-input">Title</label>
                                <input type="text" name="name" class="mukta form-control" id="tag-title-input"
                                       onclick="slugMaker('tag-title-input','tag-slug-input')"
                                       required>
                                <div class="invalid-feedback">
                                    Please enter the tags title.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tag-slug-input">Slug</label>
                                <input type="text" name="slug" class="mukta form-control" id="tag-slug-input" required>
                                <div class="invalid-feedback">
                                    Please enter the tags slug.
                                </div>
                            </div>
                            <div>
                                <label class="form-label" for="description-input">Description</label>
                                <textarea class="mukta form-control" id="description-input"  name="description" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-success w-sm form-control" id="tag-add-button" cs-create-route="{{route('tag.store')}}">Submit</button>
                    </div>
                    {!! Form::close() !!}



                </div>
                <!-- end col -->

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Tag List</h4>
                        </div>
                        <div class="card-body">

                            <div class="row" >

                                <div class="table-responsive  mt-3 mb-1">
                                    <table id="tag-index" class="table align-middle table-nowrap table-striped">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th style="text-align: center">Description</th>
                                            <th>Slug</th>
                                            <th>Count</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="blog-tag-list">
                                        @if(!empty($tags))
                                            @foreach($tags as  $tag)
                                                <tr id="tag-block-num-{{@$tag->id}}">
                                                    <td id="tag-td-name-{{@$tag->id}}">{{ ucwords(@$tag->name) }}</td>
                                                    <td id="tag-td-descp-{{@$tag->id}}">
                                                        <span class="tag-descp">{{ (@$tag->description !== null) ? @$tag->description:"—" }}</span>
                                                    </td>
                                                    <td id="tag-td-slug-{{@$tag->id}}">{{ @$tag->slug }}</td>
                                                    <td id="tag-td-count-{{@$tag->id}}"><a href="{{route('tag.blog',@$tag->id)}}">{{ $tag->BlogsCount() }}</a></td>
                                                    <td >
                                                        <div class="row">

                                                            <div class="col text-center dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item cs-tag-edit" id="cs-role-tag-edit-{{$tag->id}}" cs-update-route="{{route('tag.update',$tag->id)}}" cs-edit-route="{{route('tag.edit',$tag->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                    <li><a class="dropdown-item cs-tag-remove" cs-delete-route="{{route('tag.destroy',$tag->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>

                                                                </ul>
                                                            </div>
                                                        </div>

                                                    </td>
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
    @include('backend.tag.modal.edit')


@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('assets/backend/custom_js/tag.js')}}"></script>

    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
@endsection
