$(document).ready(function () {
    var dataTable = $('#blog-index').DataTable({
        paging: true,
        searching: true,
        ordering:  false,
        lengthMenu: [[ 10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]],
    });

});

$(document).on('click','.cs-blog-remove', function (e) {
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

                        var blog_block = '#blog-individual-'+response.id;
                        setTimeout(function() {
                            $(blog_block).remove();
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
                text: "Blog category was not removed.",
                icon: "error",
                confirmButtonClass: "btn btn-primary mt-2",
                buttonsStyling: !1
            });
    });



})


$(document).on('click','.change-status', function (e) {
    e.preventDefault();
    var status = $(this).attr('cs-status-value');
    var url = $(this).attr('cs-update-route');
    if(status == '0'){
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
                'Changing Status to Draft will hide post in frontend</p>' +
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
                statusupdate(url,status)
                :
                t.dismiss === Swal.DismissReason.cancel &&
                Swal.fire({
                    title: "Cancelled",
                    text: "Blog status was not changed.",
                    icon: "error",
                    confirmButtonClass: "btn btn-primary mt-2",
                    buttonsStyling: !1
                });
        });

    }else{
        statusupdate(url,status);
    }

});

function statusupdate(url,status){
    $.ajax({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        url: url,
        type: "PATCH",
        cache: false,
        data:{
            status: status,
        },
        success: function(response){
            if(response.status == "success"){
                var oldstatus         = (status == 'draft') ? "Published" :  "Draft";
                var status_url        = "/auth/blogs/"+response.id+"/update/";
                var replacementblock  = '#blog-status-button-'+response.id;
                var replacement = '<button class="btn btn-light dropdown-toggle" style="width: 10em;" type="button" id="dropdownMenuClickableInside" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"> '
                    +
                    response.new_status
                    +
                    '</button><ul class="dropdown-menu" aria-labelledby="dropdownMenuClickableInside" style="">' +
                    '<li>' +
                    '<a class="dropdown-item change-status" cs-update-route="'+status_url+'" href="#" cs-status-value="'+response.value+'">'+oldstatus+'</a>' +
                    '</li></ul>';

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
                        'Blog Status has been updated .</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 2e3,
                    showConfirmButton: !1
                });
                $(replacementblock).html('');
                $(replacementblock).html(replacement);
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
                        '<p class="text-muted mx-4 mb-0">' +
                        'Blog status could not be changed at the moment .</p>' +
                        '</div>' +
                        '</div>',
                    timerProgressBar: !0,
                    timer: 3000,
                    showConfirmButton: !1
                });
            }
        },
        error: function() {
            Swal.fire({
                imageUrl: "/assets/backend/images/canosoft-logo.png",
                imageHeight: 60,
                html: '<div class="mt-2">' +
                    '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                    ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                    'style="width:120px;height:120px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Warning...! </h4>' +
                    '<p class="text-muted mx-4 mb-0">' +
                    'Could not confirm the status of the blog.</p>' +
                    '</div>' +
                    '</div>',
                timerProgressBar: !0,
                timer: 3000,
                showConfirmButton: !1
            });
        }
    });
}
