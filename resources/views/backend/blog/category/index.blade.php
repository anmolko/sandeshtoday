@extends('backend.layouts.master')
@section('title', "Category")
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
       .cat-descp{
           display: block;
           white-space: break-spaces;
           text-align: center;
       }
       #blog-category-index{
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
                    <h4 class="mb-sm-0">Category</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4">
                {!! Form::open(['id' => 'blog-category-add-form','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="category-title-input">Category Title</label>
                                <input type="text" name="name" class="mukta form-control" id="category-title-input"
                                       onclick="slugMaker('category-title-input','category-slug-input')"
                                      required>
                                    <div class="invalid-feedback">
                                        Please enter the category title.
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="category-slug-input">Category Slug</label>
                                <input type="text" name="slug" class="fs-14 mukta form-control" id="category-slug-input"
                                     required>
                                    <div class="invalid-feedback">
                                        Please enter the category slug.
                                    </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Parent Category</label>
                                <select class="mukta form-control" name="parent_category">
                                    <option value="" selected>None</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="form-label" for="description-input">Description</label>
                                <textarea class="mukta form-control" id="description-input"   name="description" rows="6"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-success w-sm form-control" id="blog-category-add-button" cs-create-route="{{route('blogcategory.store')}}">Submit</button>
                    </div>
                    {!! Form::close() !!}



            </div>
            <!-- end col -->

            <div class="col-lg-8">
                <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Category List</h4>
                        </div>
                    <div class="card-body">

                        <div class="row" >

                            <div class="table-responsive  mt-3 mb-1">
                                <table id="blog-category-index" class="table align-middle table-nowrap table-striped">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Name</th>
                                        <th style="text-align: center">Description</th>
                                        <th>Slug</th>
                                        <th>Count</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="blog-category-list">
                                    @if(!empty($categories))
                                        @foreach($categories as  $category)
                                            <tr id="category-block-num-{{@$category->id}}">
                                                <td id="category-td-name-{{@$category->id}}">{{ (@$category->parent_category !== null) ? "—":"" }}{{ ucwords(@$category->name) }}</td>
                                                <td id="category-td-descp-{{@$category->id}}">
                                                    <span class="cat-descp"> {{ (@$category->description !== null) ? @$category->description:"—" }}</span></td>
                                                <td id="category-td-slug-{{@$category->id}}">{{ @$category->slug }}</td>
                                                <td id="category-td-count-{{@$category->id}}"><a href="{{route('blogcategory.blog',@$category->id)}}">{{ $category->BlogsCount() }}</a></td>
                                                <td >
                                                    <div class="row">

                                                        <div class="col text-center dropdown">
                                                            <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill fs-17"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                <li><a class="dropdown-item" href="{{ route('blog.category',$category->slug) }}" target="_blank"><i class=" ri-eye-line align-middle"></i> Frontend View </a></li>

                                                                <li><a class="dropdown-item cs-category-edit" id="cs-role-category-edit-{{$category->id}}" cs-update-route="{{route('blogcategory.update',$category->id)}}" cs-edit-route="{{route('blogcategory.edit',$category->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                @if(@$category->id !== 1)
                                                                    <li><a class="dropdown-item cs-category-remove" cs-delete-route="{{route('blogcategory.destroy',$category->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                                @endif
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
    @include('backend.blog.category.modal.edit')


@endsection

@section('js')
<script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('assets/backend/custom_js/blog_category.js')}}"></script>

<script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
<script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>

@endsection
