
<div class="modal fade" id="edit_ads" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header p-3 ps-4 bg-soft-success">
                <h5 class="modal-title" id="myModalLabel">Edit Advertisement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateads','enctype'=>'multipart/form-data','novalidate'=>'']) !!}
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label" for="update-name">Name</label>
                        <input type="text" name="name" class="form-control" id="update-name"
                               required>
                        <div class="invalid-feedback">
                            Please enter the title.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="update-url">URL</label>
                        <input type="text" name="url" class="form-control" id="update-url">
                        <input type="hidden" name="status" readonly id="update-status">
                        <div class="invalid-feedback">
                            Please enter the url.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="placement-update">Placement</label>
                        <select class="form-select" id="placement-update" name="placement">
                            <optgroup label="Post Single Page">
                                <option value="above-post-featured"> Above Post Featured</option>
                                <option value="below-post-featured">Below Post Featured</option>
                                <option value="in-between-post">In Between Post (use 250 x 250px size) </option>
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
                        <img  id="current-ads-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                        <input  type="file" accept="image/png, image/jpeg, image/gif" hidden
                                id="ads-foreground-img-file-input"
                                onchange="loadbasicFile('ads-foreground-img-file-input','current-ads-img',event)"
                                name="image"
                                class="profile-foreground-img-file-input" >
                        <div class="invalid-feedback" >
                            Please select a image.
                        </div>
                        <label for="ads-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                            <i class="ri-image-edit-line align-bottom me-1"></i>  Add Image/Gif
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
