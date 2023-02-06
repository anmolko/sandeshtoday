
<div class="modal fade" id="edit_blog_category" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 ps-4 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Edit Blog Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateblogcategory','enctype'=>'multipart/form-data','novalidate'=>'']) !!}
                <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="categoryid" id="category_id" />

                                <label for="name" class="form-label">Category Title <span class="text-danger">*</span></label>
                                <input type="text" class="mukta form-control" name="name" id="update-name"
                                       onclick="slugMaker('update-name','update-slug')" required>
                                <div class="invalid-feedback">
                                    Please enter the category title.
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="mukta form-control" name="slug" id="update-slug" required>
                                <div class="invalid-feedback">
                                    Please enter the category Slug.
                                </div>
                            </div>
                        </div>
                    <div class="form-group mb-3">
                        <label>Parent Category</label>
                        <select class="mukta form-control" name="parent_category" id="parent_category">
                            <option value="">None</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="description-input">Description</label>
                                <textarea class="form-control mukta" name="description" id="update-description" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="blog-category-update-button" >Update Category</button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
