var loadFile = function(event) {
    var image = document.getElementById('image');
    var replacement = document.getElementById('current-img');
    replacement.src = URL.createObjectURL(event.target.files[0]);
};

function slugMaker(title, slug){
    $("#"+ title).keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp,'-');
        $("#"+slug).val(Text);
    });
}
$(document).on('click','.cs-category-add', function (e) {
    e.preventDefault();
    $("#add_blog_category").modal("toggle");
});

function runAnyChoice(selector, options){
    var element = document.querySelector(selector);
    return new Choices(element, options);
}

$(document).on('click','.cs-tags-add', function (e) {
    e.preventDefault();
    $("#add_tags").modal("toggle");
});

$('#blog-category-add-button').on('click', function(e) {
    e.preventDefault();
    var form            = $('#blog-category-add-form')[0]; //get the form using ID
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
            if(response.status=='success') {
                console.log(response);
                if(response.category.parent_category !== null){
                    var block = ' <div class="form-check form-check-info"> ' +
                        '<input class="form-check-input large" type="checkbox" value="'+response.category.id+'" id="formsubCheck'+response.category.id+'" checked>' +
                        '<label class="form-check-label check-label" for="formsubCheck'+response.category.id+'">' + response.category.name +
                        '</label>'+
                        '</div>';
                    $(response.sub).prepend(block);
                }else{
                    var block = ' <div class="form-check form-check-info"> ' +
                        '<input class="form-check-input large" type="checkbox" value="'+response.category.id+'" id="formCheck'+response.category.id+'" checked>' +
                        '<label class="form-check-label check-label" for="formCheck'+response.category.id+'">' + response.category.name +
                        '</label>'+
                        '</div>';
                    $("#category-list").prepend(block);
                }

                Toastify({ newWindow: !0, text: response.message, gravity: 'top', position: 'center', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-success",style: "style" == e.style ? { background: "linear-gradient(to right, #0AB39C, #405189)" } : "" }).showToast();
                return;
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

$('#blog-tag-add-button').on('click', function(e) {
    e.preventDefault();
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
            if(response.status=='success') {
                Toastify({ newWindow: !0, text: response.message, gravity: 'top', position: 'center', stopOnFocus: !0, duration: 3000, close: "close",className: "bg-success",style: "style" == e.style ? { background: "linear-gradient(to right, #0AB39C, #405189)" } : "" }).showToast();
                return;
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

$(document).ready(function() {
    $('#tags_list').select2({
        closeOnSelect: false,
        placeholder: 'Select tags',
        allowClear: true,
        tags: true,
        createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
                return null;
            }
            return {
                id: term,
                text: term,
                newTag: true // add additional parameters
            }
        }
    }).on('select2:select', function (evt) {
        if(evt.params.data.tag == false) {
            return;
        }
        var select2Element = $(this);
        var name = evt.params.data.text;
        var formData        = new FormData(); //Creates new FormData object
        formData.append('name',name);
        let route;
        route  = "/auth/mold/tag/viaJquery";
        var search = select2Element.val();
        var fount = search.indexOf(name);
        if (fount !== -1) {
            $.ajax({
                type: 'POST',
                url: route,
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                success: function (response) {
                    if (response.status == 'slug duplicate') {
                        Toastify({
                            newWindow: !0,
                            text: response.message,
                            gravity: 'top',
                            position: 'center',
                            stopOnFocus: !0,
                            duration: 3000,
                            close: "close",
                            className: "bg-warning",
                            style: "style" == evt.style ? {background: "linear-gradient(to right, #0AB39C, #405189)"} : ""
                        }).showToast();
                        return;
                    }
                    if (response.status == 'success') {

                        // Add HTML option to select field
                        $('<option value="' + response.tag.id + '">' + response.tag.name + '</option>').appendTo(select2Element);

                        // Replace the tag name in the current selection with the new persisted ID
                        var selection = select2Element.val();
                        var index = selection.indexOf(response.tag.name);

                        if (index !== -1) {
                            selection[index] = response.tag.id.toString();
                        }

                        select2Element.val(selection).trigger('change');

                        Toastify({
                            newWindow: !0,
                            text: response.message,
                            gravity: 'top',
                            position: 'center',
                            stopOnFocus: !0,
                            duration: 3000,
                            close: "close",
                            className: "bg-success",
                            style: "style" == evt.style ? {background: "linear-gradient(to right, #0AB39C, #405189)"} : ""
                        }).showToast();
                        return;
                    } else {
                        Toastify({
                            newWindow: !0,
                            text: response.message,
                            gravity: 'top',
                            position: 'center',
                            stopOnFocus: !0,
                            duration: 3000,
                            close: "close",
                            className: "bg-warning",
                            style: "style" == evt.style ? {background: "linear-gradient(to right, #0AB39C, #405189)"} : ""
                        }).showToast();
                        return;
                    }
                }, error: function (response) {
                    console.log(response);
                }
            });
        }
    });

});

// $(document).ready(function () {
//     createEditor('ckeditor-classic-blog');
// });
// function createEditor(id){
//     ClassicEditor.create(document.querySelector("#"+id))
//         .then( editor => {
//             window.editor = editor;
//             editor.ui.view.editable.element.style.height="200px";
//             editor.model.document.on( 'change:data', () => {
//                 $( '#' + id).text(editor.getData());
//             } );
//         } )
//         .catch(function(e){console.error(e)});
// }
