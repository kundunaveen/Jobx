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
    if($('.select2_multiple_dropdown_skills').length > 0){        
        $('.select2_multiple_dropdown_skills').select2({
            placeholder: "Select multiple skills"
        });
    }
    if($('.select2_multiple_dropdown_languages').length > 0){        
        $('.select2_multiple_dropdown_languages').select2({
            placeholder: "Select multiple languages"
        });
    }

    $(".is_work_here, .is_work_here").click(function() {
        if($(this).is(":checked")) {
            $("#experience_to").hide();
        } else {
            $("#experience_to").show();
            $("#experience_to").removeClass('d-none');
        }
    });

    $('.delete_prompt').click(function() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href=$(this).attr('data-action');
            }
        });
    });

    // just for the demos, avoids form submit
    $( "#jquery-employee-profile-form-validation" ).validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            gender: {
                required: true
            },
            date_of_birth: {
                required: true,
            },
            current_job_title: {
                required: true
            },
            current_salary: {
                number: true
            },
            expected_salary: {
                required: true,
                number: true
            },
            experience:{
                number: true
            },
            'languages[]':{
                required: true
            },
            address:{
                required: true
            },
            'skills[]':{
                required: true
            },
            resume:{
                required: true
            },
            'country':{
                min: 1
            },
            video_link:{
                url: true
            },
            website_link:{
                url: true
            },
            'social_media_link[facebook]':{
                url: true
            },
            'social_media_link[linkedin]':{
                url: true
            },
            'social_media_link[twitter]':{
                url: true
            },
            'social_media_link[instagram]':{
                url: true
            }
        }
    });
});