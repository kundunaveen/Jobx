<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script>
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
</script>