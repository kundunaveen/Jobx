    <!--========= Script File Link Here =========-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
   <script src="{{asset('js/toastr.js')}}"></script>
   <script src="{{asset('js/select2.min.js')}}"></script>

   <script>
      $(document).ready(function(){
         $('.skills').select2()
      })
      function checkPasswordValidation()
      {
         $.ajax({
            "type": "POST",
            "url": "{{url('/employer/check-password-validation')}}",
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
            'url':'{{url("/employer-profile/getStates")}}',
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
            'url':'{{url("/employer-profile/getCities")}}',
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
            'url':'{{url("/employer-profile/getCities")}}',
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

   @if(Session('success'))
      <script>
         toastr.success("{{ Session('success') }}")
      </script>
   @endif

   @if(Session('error'))
      <script>
         toastr.error("{{ Session('error') }}")
      </script>
   @endif

   @if(Session('info'))
      <script>
         toastr.info("{{ Session('info') }}")
      </script>
   @endif