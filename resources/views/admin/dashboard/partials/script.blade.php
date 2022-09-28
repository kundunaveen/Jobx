    <!--========= Script File Link Here =========-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
   <script src="{{asset('assets/js/custom.js')}}"></script>
   <script src="{{asset('js/datatables.min.js')}}"></script>
   <script src="{{asset('js/toastr.js')}}"></script>
   <script src="{{asset('js/select2.min.js')}}"></script>

   <script>
      $(document).ready(function () {
         $('#employee_table').DataTable();
         $('#languages').select2()
         $('.country-list').select2()
         $('.state-list').select2()
         $('.city-list').select2()
         $('#job_type').select2()
         $('#skills').select2()
         $('.categories').select2()
         $('.industries').select2()
         $('.company_name').select2()
         // $('#countries').select2()
         // $('#states').select2()
         // $('#cities').select2()
         $.ajax({
         "url":"{{url('/admin/manage-attribute/getValues')}}",
         "type":"POST",
         "data":{
            "_token":"{{csrf_token()}}",
            "category_id":$('.categories').val()
         },
         success:function(response){
            var tbody = ''
            let count = 1
            response.values.forEach(function(item){
               tbody = tbody + '<tr>'
               tbody = tbody + '<td>' + count + '</td>'
               tbody = tbody + '<td>' + response.category + '</td>'
               tbody = tbody + '<td>' + item.value + '</td>'
               tbody = tbody + '</tr>'
               count = count +1
            })

            $('.available_values').empty()
            $('.available_values').append(tbody)
         }
      })
      });
      function checkPasswordValidation()
      {
         $.ajax({
            "type": "POST",
            "url": "{{route('checkPasswordValidation')}}",
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

      function deleteEmployee(id)
      {
         var option = confirm('Are you sure you want to delete this employee ?')
         if(option == true)
         {
            $.ajax({
               "type":"POST",
               "url":"{{route('admin.deleteEmployee')}}",
               "data":{
                  "_token":"{{csrf_token()}}",
                  "id":id
               },
               success: function(response){
                  if(response.status == 'success'){
                     location.reload()
                  }
               }
            })
         }
      }

      function deleteEmployer(id)
      {
         var option = confirm('Are you sure you want to delete this employer ?')
         if(option == true)
         {
            $.ajax({
               "type":"POST",
               "url":"{{route('admin.deleteEmployer')}}",
               "data":{
                  "_token":"{{csrf_token()}}",
                  "id":id
               },
               success: function(response){
                  if(response.status == 'success'){
                     location.reload()
                  }
               }
            })
         }
      }

      function deleteAttribute(id)
      {
         var option = confirm('Are you sure you want to delete this Attribute ?')
         if(option == true)
         {
            $.ajax({
               "type":"POST",
               "url":"{{route('admin.deleteAttribute')}}",
               "data":{
                  "_token":"{{csrf_token()}}",
                  "id":id
               },
               success: function(response){
                  if(response.status == 'success'){
                     location.reload()
                  }
               }
            })
         }
      }

      function deleteVacancy(id)
      {
         var option = confirm('Are you sure you want to delete this job vacancy ?')
         if(option == true)
         {
            $.ajax({
               "type":"POST",
               "url":"{{route('admin.deleteVacancy')}}",
               "data":{
                  "_token":"{{csrf_token()}}",
                  "id":id
               },
               success: function(response){
                  if(response.status == 'success'){
                     location.reload()
                  }
               }
            })
         }
      }
      function updateCompanyLogo(id)
      {
         $.ajax({
            "type":"POST",
            "url":"{{route('admin.updateCompanyLogo')}}",
            "data":{
               "_token": "{{csrf_token()}}",
               "id": id,
               "logo": $('#company_image').val()
            },
            success: function(response){
               
            }
         })
      }

      function readURL(input) {
         if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                  $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
         }
      }

      $("#company_image").change(function(){
         readURL(this);
      });

      $('#profile-image-div').on('mouseover', function(){
         $('#delete-profile-btn').removeClass('d-none');
      })

      $('#profile-image-div').on('mouseout', function(){
         $('#delete-profile-btn').addClass('d-none');
      })

      $('#profile-video-div').on('mouseover', function(){
         $('#delete-video-btn').removeClass('d-none');
      })

      $('#profile-video-div').on('mouseout', function(){
         $('#delete-video-btn').addClass('d-none');
      })

      function deleteProfile(id)
      {
         $.ajax({
            "url": "{{url('/admin/employer/delete-company-image')}}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "id":id
            },
            success:function(response){
               location.reload()
            }
         })
      }

      function deleteAttributeCategory(id)
      {  
         $.ajax({
            "url": "{{url('/admin/manage-attribute/category/delete')}}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "id":id
            },
            success:function(response){
               location.reload()
            }
         })
      }

      function deleteVideo(id)
      {
         $.ajax({
            "url":"{{url('/admin/employer/delete-company-video')}}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "id":id
            },
            success:function(response){
               location.reload()
            }
         })
      }

      function deleteEmployeeProfile(id)
      {
         $.ajax({
            "url": "{{url('/admin/employee/delete-employee-image')}}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "id":id
            },
            success:function(response){
               location.reload()
            }
         })
      }

      function deleteJobSkill(id)
      {
         $.ajax({
            "url":"{{url('/admin/job-skills/delete')}}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "id":id
            },
            success:function(response){
               location.reload()
            }
         })
      }

      function changeEmployeeStatus(emp_id, status)
      {
         $.ajax({
            "url":"{{ url('/admin/employee/change-status') }}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "emp_id": emp_id,
               "status": status
            },
            success:function(response){
               if(response.status == 'success')
               {
                  toastr.success(response.message)
               }
            }
         })
      }

      function changeEmployerStatus(emp_id, status)
      {
         $.ajax({
            "url":"{{ url('/admin/employer/change-status') }}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "emp_id": emp_id,
               "status": status
            },
            success:function(response){
               if(response.status == 'success')
               {
                  toastr.success(response.message)
               }
            }
         })
      }

      function deleteEmployeeVideo(id)
      {
         $.ajax({
            "url":"{{url('/admin/employee/delete-employee-video')}}",
            "type":"POST",
            "data":{
               "_token":"{{ csrf_token() }}",
               "id":id
            },
            success:function(response){
               location.reload()
            }
         })
      }

      $('.country-list').on('change', function(){
        $.ajax({
            'url':'{{url("/admin/employee/get-states")}}',
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
            'url':'{{url("/admin/employee/get-cities")}}',
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
            'url':'{{url("/admin/employee/get-cities")}}',
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

    $('.categories').on('change', function(){
      $.ajax({
         "url":"{{url('/admin/manage-attribute/getValues')}}",
         "type":"POST",
         "data":{
            "_token":"{{csrf_token()}}",
            "category_id":$('.categories').val()
         },
         success:function(response){
            var tbody = ''
            let count = 1
            response.values.forEach(function(item){
               tbody = tbody + '<tr>'
               tbody = tbody + '<td>' + count + '</td>'
               tbody = tbody + '<td>' + response.category + '</td>'
               tbody = tbody + '<td>' + item.value + '</td>'
               tbody = tbody + '</tr>'
               count = count +1
            })

            $('.available_values').empty()
            $('.available_values').append(tbody)
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