function successToastAlert(message) {
    $.toast({
        heading: 'Success',
        text: message,
        showHideTransition: 'slide',
        icon: 'success',
        position: 'top-right',
    })
}

function errorToastAlert(message) {
    $.toast({
        heading: 'Error',
        text: message,
        showHideTransition: 'slide',
        icon: 'error',
        position: 'top-right',
    })
}
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

    if ($('#contact_number').length > 0) {
        var input_number = document.querySelector("#contact_number");
        window.intlTelInput(input_number, {
            defaultCountry: "auto",
        });
        var iti = intlTelInput(input_number);
        var mobile_number = iti.getNumber();
        // mobile_number = $("#phone").intlTelInput("getSelectedCountryData").dialCode;
        $("#phone").val(mobile_number);
    }

    if ($('.select2_dropdown').length > 0) {
        $('.select2_dropdown').select2();
    }
    if ($('.select2_multiple_dropdown_skills').length > 0) {
        $('.select2_multiple_dropdown_skills').select2({
            placeholder: "Select multiple skills"
        });
    }
    if ($('.select2_multiple_dropdown_languages').length > 0) {
        $('.select2_multiple_dropdown_languages').select2({
            placeholder: "Select multiple languages"
        });
    }

    $(".is_work_here, .is_work_here").click(function () {
        if ($(this).is(":checked")) {
            $("#experience_to").hide();
        } else {
            $("#experience_to").show();
            $("#experience_to").removeClass('d-none');
        }
    });

    $('.delete_prompt').click(function () {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = $(this).attr('data-action');
            }
        });
    });

    // just for the demos, avoids form submit
    if ($("#jquery-employee-profile-form-validation").length > 0) {
        $("#jquery-employee-profile-form-validation").validate({
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
                'gender': {
                    required: true,
                },
                'date_of_birth': {
                    required: true,
                },
                current_job_title: {
                    required: true
                },
                expected_salary: {
                    required: true
                },
                'languages[]': {
                    required: true,
                },
                'skills[]': {
                    required: true,
                },
                'have_driving_license': {
                    required: true
                },
                address: {
                    required: true
                },
                'country': {
                    required: true,
                    min: 1
                },
                'notification_option': {
                    required: true,
                },

            }
        });
    }

    if ($("#jquery-employer-profile-form-validation").length > 0) {
        $("#jquery-employer-profile-form-validation").validate({
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
                    required: true
                },
                company_name: {
                    required: true
                },
                industry: {
                    required: true
                },
                company_size: {
                    required: true
                },
                company_role: {
                    required: true
                },
                address: {
                    required: true
                },
                'skills[]': {
                    required: true
                },
                resume: {
                    required: true
                },
                'country': {
                    min: 1
                },
                zip: {
                    required: true,
                    number: true
                }

            }
        });
    }

    if ($("#jquery-post-job-form-validation").length > 0) {
        $("#jquery-post-job-form-validation").validate({
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
                    required: true
                },
                min_exp: {
                    required: true,
                    number: true
                },
                salary_offer: {
                    required: true,
                    number: true
                },
                address: {
                    required: true
                },
                'country': {
                    required: true
                },
                zip: {
                    required: true,
                    number: true
                },
                'skills[]': {
                    required: true
                }
            }
        });
    }

    if ($("#jqueryValidatorAddExperienceForm").length > 0) {
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
    }

    if ($("#jqueryValidatorEditExperienceForm").length > 0) {
        $("#jqueryValidatorEditExperienceForm").validate({
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
    }

    if ($("#jqueryValidatorAddEducationForm").length > 0) {
        $("#jqueryValidatorAddEducationForm").validate({
            rules: {
                qualification: {
                    required: true
                },
                institution_name: {
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
                qualification: "Qualification field required",
                institution_name: "Institution name field is required",
                country_id: "Country field is required",
                from_month: "Form month field is required",
                from_year: "Form year field is required",
                to_month: "To month field is required",
                to_year: "To year field is required",
            }
        });
    }

    if ($("#jqueryValidatorEditEducationForm").length > 0) {
        $("#jqueryValidatorEditEducationForm").validate({
            rules: {
                qualification: {
                    required: true
                },
                institution_name: {
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
                qualification: "Qualification field required",
                institution_name: "Institution name field is required",
                country_id: "Country field is required",
                from_month: "Form month field is required",
                from_year: "Form year field is required",
                to_month: "To month field is required",
                to_year: "To year field is required",
            }
        });
    }

});

$(document).ready(function () {
    $('div[class^="company_rating_readonly"]').each(function () {
        var score = $(this).attr('data-score');
        $(this).raty({
            readOnly: true,
            number: 5,
            starOff: "https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/images/star-off.png",
            starOn: "https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/images/star-on.png",
            score: function () {
                return score;
            },
            hints: [1, 2, 3, 4, 5],
        });
    });

    // $('.company_rating_readonly').raty({
    //     readonly: true,
    //     number: 5,
    //     starOff: "https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/images/star-off.png",
    //     starOn: "https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/images/star-on.png",
    //     score: function(){
    //         return $(this).attr('data-score');
    //     },
    //     hints: [1, 2, 3, 4, 5],            
    // });

    $('div[class^="company_rating_writeonly"]').each(function () {
        var score = $(this).attr('data-score');
        var company_id = $(this).attr('data-company_id');
        $(this).raty({
            number: 5,
            starOff: "https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/images/star-off.png",
            starOn: "https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/images/star-on.png",
            score: function () {
                return score;
            },
            target: "#text-" + company_id,
            hints: [1, 2, 3, 4, 5],
        });
    });

    $(".company_rating_writeonly").click(function () {
        var company_id = $(this).attr('data-company_id');
        var rating_value = $('#text-' + company_id).val();
        var user_id = auth_user_id;

        if (!company_id) {
            alert('Company is missing!');
            return false;
        }
        if (!rating_value) {
            alert('rating is missing!');
            return false;
        }
        if (!user_id) {
            alert('Please login!');
            return false;
        }

        $.ajax({
            'url': company_rating_store_update_route,
            'type': 'GET',
            'data': {
                'rating_value': rating_value,
                'user_id': user_id,
                'company_id': company_id
            },
            success: function (response) {
                if (response.status == false) {
                    $.toast({
                        heading: 'Error',
                        text: response.message,
                        showHideTransition: 'slide',
                        icon: 'error',
                        position: 'top-right',
                    })
                }
                if (response.status == true) {
                    $.toast({
                        heading: 'Success',
                        text: 'You rating successfully saved.',
                        showHideTransition: 'slide',
                        icon: 'success',
                        position: 'top-right',
                    })
                }
            },
        });
    });

    $(document).on('click', '.favorite_vacancy', function () {
        var user_id = $(this).attr('data-user_id');
        var vacancy_id = $(this).attr('data-vacancy_id');
        var url = $(this).attr('data-url');

        if (!user_id) {
            errorToastAlert('User not found!');
            return false;
        }
        if (!vacancy_id) {
            errorToastAlert('Vacancy not found!');
            return false;
        }

        $.ajax({
            'url': url,
            'type': 'GET',
            'data': {
                'user_id': user_id,
                'vacancy_id': vacancy_id
            },
            success: function (response) {
                if (response.status == true) {
                    successToastAlert(response.message);
                }
                if (response.status == false) {
                    errorToastAlert(response.message);
                }
                if (response.html) {
                    $('#vacancy-id-' + vacancy_id).html(response.html);
                }
            },
        });
    });
});

$(document).ready(function () {
    $("input[name='search_keyword']").autocomplete({
        minLength: 2,
        source: function (request, response) {
            $.ajax({
                url: $("input[name='search_keyword']").attr('data-route'),
                type: 'GET',
                dataType: "json",
                data: {
                    search_keyword: request.term
                },
                success: function (data) {
                    if (data.status == true) {
                        response(data.data);
                    } else {
                        errorToastAlert(data.message);
                        return false;
                    }

                }
            });
        },
        select: function (event, ui) {
            $("input[name='search_keyword']").val(ui.item.value);
            return false;
        }
    });
    $("input[name='search_location']").autocomplete({
        minLength: 2,
        source: function (request, response) {
            $.ajax({
                url: $("input[name='search_location']").attr('data-route'),
                type: 'GET',
                dataType: "json",
                data: {
                    search_location: request.term
                },
                success: function (data) {
                    if (data.status == true) {
                        response(data.data);
                    } else {
                        errorToastAlert(data.message);
                        return false;
                    }

                }
            });
        },
        select: function (event, ui) {
            $("input[name='search_location']").val(ui.item.value);
            return false;
        }
    });
});