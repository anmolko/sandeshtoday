<div class="modal fade" id="edit_property_ads" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 ps-4 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Edit Advertisement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation property-ads-update','enctype'=>'multipart/form-data','novalidate'=>'']) !!}
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="update-name">Name</label>
                        <input type="text" name="name" class="form-control" id="update-prop-name"
                               required>
                        <div class="invalid-feedback">
                            Please enter the title.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="update-url">URL</label>
                        <input type="text" name="url" class="form-control" id="update-prop-url">
                        <input type="hidden" name="status" readonly id="update-prop-status">
                        <div class="invalid-feedback">
                            Please enter the url.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="update-url">Amount</label>
                        <input type="text" name="amount" class="form-control" id="update-prop-amount">
                        <div class="invalid-feedback">
                            Please enter the url.
                        </div>
                    </div>
                    <div>
                        <img  id="current-prop-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                        <input  type="file" accept="image/png, image/jpeg, image/gif" hidden
                                id="property-edit-foreground-img-file-input"
                                onchange="loadbasicFile('property-edit-foreground-img-file-input','current-prop-img',event)"
                                name="image"
                                class="profile-foreground-img-file-input" >
                        <div class="invalid-feedback" >
                            Please select a image.
                        </div>
                        <label for="property-edit-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                            <i class="ri-image-edit-line align-bottom me-1"></i>  Add Image
                        </label>
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="ads-update-button" >Update</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div><!--end modal-content-->
    </div><!--end modal-dialog-->
</div>
