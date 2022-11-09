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
            contact: {
                required: true,
            },
            notification_option: {
                required:true
            },
            company_name:{
                required:true
            },
            industry:{
                required:true
            },
            company_size:{
                required:true
            },
            company_role:{
                required:true
            },
            address:{
                required: true
            },
            'skills[]':{
                required: true
            },
            'country':{
                min: 1
            },
            zip : {
                required:true,
                number:true
            }
            
        }
    });

    $( "#jquery-employer-profile-form-validation" ).validate({
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            contact: {
                required: true,
                
            },
            notification_option: {
                required:true
            },
            company_name:{
                required:true
            },
            industry:{
                required:true
            },
            company_size:{
                required:true
            },
            company_role:{
                required:true
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
            zip : {
                required:true,
                number:true
            }
            
        }
    });
    
     $( "#jquery-post-job-form-validation" ).validate({
        rules: {
            job_title: {
                required: true
            },
            job_role: {
                required: true
            },
            department: {
                required: true
            },
            job_type: {
                required:true
            },
            min_exp:{
                required:true,
                number:true
            },
            salary_offer:{
                required:true,
                number:true
            },
            address:{
                required:true
            },
            'country':{
                required:true
            },
            zip:{
                required: true,
                number:true
            },
            'skills[]':{
                required: true
            },
            'images_input[]':{
                required: true
            }
        }
    });
    
    $("#jqueryValidatorAddExperienceForm").validate({
        rules: {
            job_title: {
                required: true
            },
            company: {
                required: true
            },
            country_id: {
                required: true
            },
            from_month: {
                required: true
            },
            from_year: {
                required: true
            },
            to_month: {
                required: true
            },
            to_year: {
                required: true
            },
            
        },
        messages: {
            job_title: "Job title field required",
            company: "Company field is required",
            country_id: "Country field is required",
            from_month: "Form month field is required",
            from_year: "Form year field is required",
            to_month: "To month field is required",
            to_year: "To year field is required",
        }
    });
    
});