$(document).ready(function () {
    if (window.File && window.FileList && window.FileReader) {
        $('#files').on('change', function (e) {
            var files = e.target.files;
            var filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i];
                var fileReader = new FileReader();
                fileReader.onload = (function (e) {
                    var file = e.target;
                    var html = "<div class='col-3 pip'><img class='imageThumb' src='" + file.result + "' title='" + file.name + "' /><br/><a class='remove remove-button mt-2 btn btn-danger btn-sm' href='javascript:void(0);' width='100'>Remove</a></div>";
                    $('.thumbnails').append(html);
                    $('.remove').click(function (event) {
                        $(this).parent(".pip").remove();
                    });
                });
                fileReader.readAsDataURL(f);
            }
        });

        $('#single_file').on('change', function (e) {
            $(".pip").remove();
            var files = e.target.files;
            var f = files[0];
            var fileReader = new FileReader();
            fileReader.onload = (function (e) {
                var file = e.target;
                var html = "<div class='col-4 pip'><img class='imageThumb' src='" + file.result + "' title='" + file.name + "' /></div>";
                $('.thumbnails').append(html);
            });
            fileReader.readAsDataURL(f);
        });
    } else {
        alert("Your browser not support");
    }    
});

$(document).on('click', '.remove', function () {
    $(this).closest('div.pip').remove();
});

// $(document).on('click', '#add_new', function () {
//     var form_html = $('#copy_form').html();
//     var delete_html = '<div class="row btn-form-wrapper"><div class=" d-grid col-sm-6"><a href="javascript:void(0);" class="btn btn-danger btn-form delete_form">Delete</a></div></div>';
//     var html = form_html +''+ delete_html;
//     $('#append_form').append(html);
// });
$(document).ready(function () {
    if($('.select2_dropdown').length > 0){        
        $('.select2_dropdown').select2();
    }

    $(".is_work_here").click(function() {
        if($(this).is(":checked")) {
            $("#experience_to").hide();
        } else {
            $("#experience_to").show();
        }
    });
});