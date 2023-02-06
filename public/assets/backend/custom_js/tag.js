$('#tag-add-button').on('click', function(e) {
    var form            = $('#blog-tag-add-form')[0]; //get the form using ID
    if (!form.reportValidity()) { return false;}
    var formData        = new FormData(form); //Creates new FormData object
    var url             = $(this).attr("cs-create-route");
    var request_method  = 'POST'; //get form GET/POST method
    $.ajax({
        type : request_method,
        url : url,
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        cache: false,
        contentType: false,
        processData: false,
        data : formData,
        success: function(response){

            if(response.status=='slug duplicate'){
                Toastify({ newWindow: !0, text: response.message, gravity: 'top', position: 'center', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-warning",style: "style" == e.style ? { background: "linear-gradient(to right, #0AB39C, #405189)" } : "" }).showToast();
                return;
            }
            ;
            var category_edit   = '/auth/tags/'+response.tag.id+'/edit';
            var category_update = '/auth/tags/'+response.tag.id;
            var category_remove = '/auth/tags/'+response.tag.id;
            var tag_count       = '/auth/tags/'+response.tag.id+'/blog';
            var descp           = (response.tag.description ? response.tag.description : "—");
            var tags            = (response.tag.count ? response.tag.count : "0");

            if(response.status=='success') {
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
                        response.message +
                        '</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 2e3,
                    showConfirmButton: !1
                });
                var block = '<tr id="tag-block-num-'+response.tag.id+'">'+
                    '<td id="tag-td-name-'+response.tag.id+'">'+response.tag.name+'<span class="badge bg-success ms-1">New</span></td>'+
                    '<td id="tag-td-slug-'+response.tag.id+'">'+descp+'</td>'+
                    '<td id="tag-td-descp-'+response.tag.id+'">'+
                    response.tag.slug +'<span class="badge bg-success ms-1">New</span></td>'+
                    '<td id="tag-td-count-'+response.tag.id+'"><a href="'+tag_count+'">'+tags+'</a></td>'+
                    '<td>'+
                    '<div class="row">'+
                    '<div class="col text-center dropdown"> ' +
                    '<a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false"> ' +
                    '<i class="ri-more-fill fs-17"></i> ' +
                    '</a> ' +
                    '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2"> ' +
                    '<li><a class="dropdown-item cs-tag-edit" id="cs-tag-edit-'+response.tag.id+'" cs-update-route="'+category_update+'" cs-edit-route="'+category_edit+'"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>' +
                    '<li><a class="dropdown-item cs-tag-remove" cs-delete-route="'+category_remove+'"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li> ' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</td>'+
                    '</tr>';
                $("td.dataTables_empty").remove();
                $("#blog-tag-list").prepend(block);
            }
            else{
                Swal.fire({
                    imageUrl: "/assets/backend/images/canosoft-logo.png",
                    imageHeight: 60,
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                        'style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Oops...! </h4>' +
                        '<p class="text-muted mx-4 mb-0">' + response.message +
                        '</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 3000,
                    showConfirmButton: !1
                });
            }
        }, error: function(response) {
            console.log(response);
        }



    });

});

function slugMaker(title, slug){
    $("#"+ title).keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#"+slug).val(Text);
    });
}

$(document).ready(function () {
    var dataTable = $('#tag-index').DataTable({
        paging: true,
        searching: true,
        ordering:  false,
        lengthMenu: [[15, 20, 30, 50, 100, -1], [ 15, 20, 30, 50, 100, "All"]],
    });

});

$(document).on('click','.cs-tag-edit', function (e) {
    e.preventDefault();
    // console.log(action)
    var id= $(this).attr('id');
    var action = $(this).attr('cs-update-route');
    $.ajax({
        url: $(this).attr('cs-edit-route'),
        type: "GET",
        cache: false,
        dataType: 'json',
        success: function(dataResult){
            // $('#id').val(data.id);
            $("#edit_tag").modal("toggle");
            $('#update-name').attr('value',dataResult.name);
            $('#update-slug').attr('value',dataResult.slug);
            $('#update-description').text(dataResult.description);
            $('.updatetags').attr('action',action);
        },
        error: function(error){
            console.log(error)
        }
    });
});

$(document).on('click','.cs-tag-remove', function (e) {
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

                        var category_block = '#tag-block-num-'+response.id;
                        setTimeout(function() {
                            $(category_block).remove();
                            if(response.count == 1){
                                var block = '<tr class="odd">' +
                                    '<td valign="top" colSpan="5" class="dataTables_empty">No data available in table </td> ' +
                                    '</tr>';
                                $("#blog-tag-list").prepend(block);
                            }
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
                text: "Tag was not removed.",
                icon: "error",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
    });



})
