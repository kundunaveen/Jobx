<script>
    var vacancy_search_keyword_route = "{{ route('ajax.autocomplete-search.vacancy') }}";
    var vacancy_search_location_route = "{{ route('ajax.autocomplete-search.location') }}";
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="{{asset('js/intlTelInput.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raty/2.9.0/jquery.raty.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/jquery.toast.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('js/custom-dev.js')}}"></script>

<script>
    var vacancy_search_keyword_route = "{{ route('ajax.autocomplete-search.vacancy') }}";
    var vacancy_search_location_route = "{{ route('ajax.autocomplete-search.location') }}";
$(document).ready(function(){
    $('.languages').select2()
    $('.skills').select2()
});

function checkPasswordValidation()
      {
         $.ajax({
            "type": "POST",
            "url": "{{url('/employee/check-password-validation')}}",
            "data":{
               "_token":"{{ csrf_token()}}",
               "current_password": $('#current_password').val(),
               "password": $('#new_password').val(),
               "password_confirmation": $('#confirm_password').val() 
            },
            success: function(response){
               $('.error_messages').text('')
               if(response.status == "failed"){
                  $('#current_password_error_message').text(response.message)
               }
               else{
                  $('#change_password_form').submit()
               }
            },
            error: function(response){
               $('.error_messages').text('')
               // console.log(response.responseJSON.errors.password[0])
               // alert(response)
               $('#new_password_error_message').text(response.responseJSON.errors.password[0])
            }
         })
      }

      $('.country-list').on('change', function(){
        $.ajax({
            'url':'{{url("/employee/get-states")}}',
            'type':'POST',
            'data':{
                '_token':'{{csrf_token()}}',
                'country_id':$('.country-list').val()
            },
            success:function(response){
                let options = ''
               //  let options1 = ''
                console.log(response)
                response.states.forEach(function(item){
                    options = options + `<option value="${item.id}">${item.name}</option>`
                })
                $('.state-list').empty()
                $('.city-list').empty()
                $('.state-list').append(options)
                getCities()
            }
        })
    })

    function getCities()
    {
      $.ajax({
            'url':'{{url("/employee/get-cities")}}',
            'type':'POST',
            'data':{
                '_token':'{{csrf_token()}}',
                'country_id':$('.country-list').val(),
                'state_id':$('.state-list').val(),
            },
            success:function(response){
                let options = ''
                response.cities.forEach(function(item){
                    options = options + `<option value="${item.id}">${item.city}</option>`
                })
                $('.city-list').empty()
                $('.city-list').append(options)
            }
        })
    }
    
    $('.state-list').on('change', function(){
        $.ajax({
            'url':'{{url("/employee/get-cities")}}',
            'type':'POST',
            'data':{
                '_token':'{{csrf_token()}}',
                'country_id':$('.country-list').val(),
                'state_id':$('.state-list').val(),
            },
            success:function(response){
                let options = ''
                response.cities.forEach(function(item){
                    options = options + `<option value="${item.id}">${item.city}</option>`
                })
                $('.city-list').empty()
                $('.city-list').append(options)
            }
        })
    })
</script>