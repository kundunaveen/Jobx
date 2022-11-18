@extends('employer.dashboard.partials.layout')
@section('title')
    Employer | Profile
@endsection
@section('content')
<style>
.select-box-2 span.select2.select2-container.select2-container--default {
    width: 100% !important;
}

.select-box-2 span.select2-selection.select2-selection--multiple {
    background: #fff;
    border: 1px solid #E1E1E1;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    padding: 0.5rem 3rem;
    height: 58px;
    width:100%!important;
}
span.select2.select2-container{
    background: #fff!important;
    border: 1px solid #E1E1E1!important;
    border-radius: 10px!important;
    -webkit-border-radius: 10px!important;
    -moz-border-radius: 10px!important;
    padding: .8rem 3rem!important;
    height: 58px!important; 
    width:100%!important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 15px!important;
    right: 30px!important;
}
span.select2-selection.select2-selection--single {
    border: none;
    width: 100%!important;
}
.main-bg {
    padding:0px !important;
}

button.btn.btn-custom-posted-jobs.btn-primary.active {
    border: 1px solid transparent!important;
    font-size: 16px!important;
    font-family: "cooper_hewittmedium";
    border-radius: 10px;
    background: #04050A;
    color: #fff;
    border-color: #04050A;
    transition: all .3s ease;
}
button.btn.btn-custom-posted-jobs.btn-primary.active:hover {
    background: transparent;
    color: #2343F2;
    border-color: #2343F2!important;
    transition: all .3s ease;
}
</style>
<style>
        .step-progress label {
            text-align: left;
            width: 100%;
        }

        .card.step-progress {
            border: none!important;
            background-color: transparent!important;
            width: 100%;
            box-shadow: none!important;
            padding: 0!important;
        }

        .step-progress {
          padding: 16px;
          background-color: #FAFAFA;
          margin: 0 auto;
        }

        .step-progress .step-slider {
          width: 100%;
        }

        .step-progress .step-slider .step-slider-item {
          width: 33%;
          height: 3px;
          position: relative;
          float: left;
          background-color: #E0E0E0;
        }
        .step-slider {
            position: relative;
        }
        .step-slider:before {
            content: '\f00c';
            font-family: 'FontAwesome';
            position: absolute;
            top: -21px;
            left: 0;
            z-index: 2;
            -webkit-transition: all 0.3s ease-out 0.5s;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            background-color: #2343F2;
            border: 2px solid #2343F2;
            text-align: center;
            color: #fff;
            line-height: 34px;
        }
        .step-progress .step-slider .step-slider-item:after {
            content: "";
            position: absolute;
            top: -21px;
            right: 0;
            z-index: 2;
            -webkit-transition: all 0.3s ease-out 0.5s;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            background-color: #fff;
            border: 2px solid #ddd;
            color: #fff;
        }

        .step-progress .step-slider .step-slider-item:before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          width: 0%;
          height: 3px;
          background-color: #ddd;
          z-index: 1;
          -webkit-transition: all 0.5s ease-out;
        }

        .step-progress .step-slider .step-slider-item.active:before {
          width: 100%;
          background-color: #2343F2;
        }

        .step-progress .step-slider .step-slider-item.active:after {
          content: '\f00c';
          border-color: #2343F2;
          background-color: #2343F2;
          font-family: 'FontAwesome';
          text-align: center;
          line-height: 34px;
          color: #fff;
        }

        .step-content {
          padding: 16px 0;
        }

        .step-content .step-content-foot {
          text-align: center;
        }

        .step-content .step-content-foot button {
          border: 0;
          padding: 8px 16px;
          background-color: #CFD8DC;
          font-size: 14px;
          border-radius: 6px;
          outline: 0;
        }

        .step-content .step-content-foot button:active {
          background-color: rgba(255, 255, 255, 0.2);
        }

        .step-content .step-content-foot button.out {
          display: none;
        }

        .step-content .step-content-foot button.disable {
          background-color: #ECEFF1;
        }

        .step-content .step-content-foot button.active {
            background-color: #2343F2;
            color: #fff;
            border: 1px solid #2343F2;
        }


        .step-content .step-content-body {
          padding: 16px 0;
          text-align: center;
          font-size: 18px;
        }

        .step-content .step-content-body.out {
          display: none;
        }
        form.form-inner.step-progress-form {
            max-width: 100%!important;
        }
        .iti.iti--allow-dropdown {
            width: 100%;
        }
    </style>
<section class="dashboard-section inner-login-shape">
    <main class="main-bg employer-form-page">
        <section class="form-inner-wrapper">
            <div class="container ">
                <div class="form-wrapper card">
                    <!-- <div class="progress" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    @include('layouts.messages.error')
                    <form class="form-inner" method="POST" enctype="multipart/form-data" id="jquery-employer-profile-form-validation">
                        @csrf

                    <div class="card step-progress">
                        <div class="step-slider">
                            <div data-id="step1" class="step-slider-item"></div>
                            <div data-id="step2" class="step-slider-item"></div>
                            <div data-id="step3" class="step-slider-item"></div>                                  
                        </div>
                        <div class="step-content">
                        <div id="step1" class="step-content-body">

                        <div class="row justify-content-between">
                            <div class="col-auto"><h2 class="form-heading mt-4">Profile Details</h2></div>
                            <div class="col-auto">
                                @if($employer->profile->logo ==null)
                                <img src="{{asset('image/user.png')}}" id="profile_image" onclick="$('#profile_image_input').click()" style="height:100px;width:100px;object-fit:cover; border-radius:100%">
                                @else
                                <img src="{{asset('image/company_images/'.$employer->profile->logo)}}" id="profile_image" onclick="$('#profile_image_input').click()" style="height:100px;width:100px;object-fit:cover; border-radius:100%">
                                @endif
                            </div>
                            <input type="file" class="d-none" name="profile_image" id="profile_image_input">
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <label for="inputName4" class="form-label">First Name*</label>
                                <input type="text" class="form-control form-input" name="first_name" value="{{$employer->first_name}}" placeholder="Ex: Mark"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Last Name*</label>
                                <input type="text" class="form-control form-input" name="last_name" value="{{$employer->last_name}}" placeholder="Ex: - Davis"
                                    aria-label="Last name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <div class="col-12">
                                <input type="email" class="form-control form-input"
                                    placeholder="Enter your Email address" readonly disabled value="{{$employer->email}}" id="inputEmail4">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <div class="col-12">
                                <input type="tel" name="contact" id="phone" class="form-control form-input" value="{{$employer->contact}}" placeholder="Ex: 99xxxxx999"
                                    aria-label="Phone Number">
                            </div>
                        </div>  
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Notification Option</label>
                            <div class="col-12">
                                <select name="notification_option" class="form-select" aria-label="Default select example">
                                    
                                    <option {{ 'email'== $employer->profile->notification_option ? 'selected':''}} value="email">Email</option>
                                    <option {{ 'jobax'== $employer->profile->notification_option ? 'selected':''}} value="jobax">Jobax platform notification</option>
                                   
                                </select>
                            </div>
                        </div>
                        
    </div>
    <div id="step2" class="step-content-body out">
                        <h2 class="form-heading">Company Details</h2>
                        <div class="row form-group">
                            <label for="inputCompanyName" class="form-label">Company Name*</label>
                            <div class="col-12">
                                <input type="text" name="company_name" class="form-control form-input" value="{{$employer->profile->company_name}}" placeholder="Ex: Google"
                                    aria-label="Company Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputType" class="form-label">Type*</label>
                            <div class="col-12">
                                <select name="industry" class="form-select" aria-label="Default select example">
                                    <option selected>Enter your industry</option>
                                    @foreach($industries as $industry)
                                    <option {{$industry->id == $employer->profile->industry_type_id ? 'selected':''}} value="{{$industry->id}}">{{$industry->value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Company Size</label>
                            <div class="col-12">
                                <select name="company_size" class="form-select" aria-label="Default select example">
                                    
                                    <option {{ '1-10'== $employer->profile->company_size ? 'selected':''}} value="1-10">1-10 (Small Organization)</option>
                                    <option {{ '11-20'== $employer->profile->company_size ? 'selected':''}} value="11-20">11-20 (Medium Organization)</option>
                                    <option {{ '21-50'== $employer->profile->company_size ? 'selected':''}} value="21-50">21-50 (Large Organization)</option>
                                    <option {{ '>50'== $employer->profile->company_size ? 'selected':''}} value=">50">More than 50 (very Large Organization)</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Role in the company</label>
                            <div class="col-12">
                                <select name="company_role" class="form-select" aria-label="Default select example">
                                    
                                    <option {{ 'HR Manager'== $employer->profile->company_role ? 'selected':''}} value="HR Manager">HR Manager</option>
                                    <option {{ 'Branch Manager'== $employer->profile->company_role ? 'selected':''}} value="Branch Manager">Branch Manager</option>
                                    <option {{ 'CEO'== $employer->profile->company_role ? 'selected':''}} value="CEO">CEO</option>
                                    <option {{ 'CTO'== $employer->profile->company_role ? 'selected':''}} value="CTO">CTO</option>
                                    <option {{ 'MD'== $employer->profile->company_role ? 'selected':''}} value="MD">MD</option>
                                    <option {{ 'Company Owner'== $employer->profile->company_role ? 'selected':''}} value="Company Owner">Company Owner</option>
                                   
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Company Introduction</label>
                            <div class="col-12">
                                <input type="file" class="form-control" name="profile_video" id="profile_video_input">
                            </div>
                        </div>
                        @if($employer->profile->intro_video != null)
                        <div class="row">
                            <div class="col-12">
                                <video class="" controls>
                                    <source src="{{asset('image/company_videos/'.$employer->profile->intro_video)}}" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        @endif
                       
                    </div>
                    <div id="step3" class="step-content-body out">
                        <h2 class="form-heading">Company Location</h2>
                        <div class="row form-group">
                            <label for="check" class="form-label">Location*</label>
                            <div class="col-12">
                            <textarea name="address" placeholder="Ex: #123 main street" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$employer->profile->address}}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="check" class="form-label">Country*</label>
                                <!-- <div class=""> -->
                                    <select name="country" class="form-select country-list" aria-label="Default select example">
                                        <option selected> </option>
                                        @foreach($countries as $country)
                                        <option {{$country->id == $employer->profile->country ? 'selected': ''}} value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                <!-- </div> -->
                            </div>
                            <div class="col-md-6">
                                <label for="check" class="form-label">State*</label>
                                <!-- <div class=""> -->
                                    <select name="state" class="form-select state-list" aria-label="Default select example">
                                        <option selected> </option>
                                        @foreach($states as $state)
                                        <option {{$state->id == $employer->profile->state ? 'selected': ''}} value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col-md-6">
                            <label for="check" class="form-label">City*</label>
                            <!-- <div class="col-12"> -->
                                <select name="city" class="form-select city-list" aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($cities as $city)
                                    <option {{$city->id == $employer->profile->city ? 'selected' : ''}} value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                            <!-- </div> -->
                        </div>
                        <div class="col-md-6">
                            <label for="check" class="form-label">Zip*</label>
                            <!-- <div class="col-12"> -->
                                <input type="number" name="zip" class="form-control form-input" value="{{$employer->profile->zip}}" placeholder="Ex: 10101"
                                    aria-label="Zip Code">
                            <!-- </div> -->
                        </div>
                        </div>
                        <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-9">
                                <input type="submit" class="btn  btn-primary btn-form" value="Publish">
                            </div>
                            <div class="col-sm-3  text-center text-sm-end">
                                <input type="reset" class="btn py-3 px-0 bg-transparent fw-bold btn-skip" value="Back" onclick="$('#prevBtn').click();$('#prevBtn').removeClass('d-none')">
                            </div>
                        </div>
                        </div>
                        <div id="stepLast" class="step-content-body out">
                            <div class="form-inner text-center">
                                <h2>Profile Updated </h2>
                                <p>Profile updated successfully ! Now you can search suitable job according to your skills.</p>
                                <div class="mt-5">
                                    <a type="button" class="btn btn-primary " href="{{route('employer.dashboard')}}">
                                        Back To Dashboard
                                    </a>
                                </div>
                            </div>
                        </div>    
                        <div class="step-content-foot">
                            <button type="button" class="btn btn-custom-posted-jobs btn-primary active" id="prevBtn" name="prev">Prev</button>
                            <button type="button" class="btn btn-custom-posted-jobs btn-primary active" name="next">Next</button>
                            <button type="button" class="active out btn btn-primary btn-custom-posted-jobs btn-form" id="submitBtn" name="finish">Submit</button>
                        </div>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </main> 
</section>

@endsection
@section('scripts')
<script type="text/javascript">
        // see https://css-tricks.com/forums/topic/back-button-on-multistep-form/
        $(function() {
          var step = 0;
          var stepItem = $('.step-progress .step-slider .step-slider-item');

          $('.step-content .step-content-foot button[name="prev"]').addClass('out');
          
          // Step Next
          $('.step-content .step-content-foot button[name="next"]').on('click', function() {
            var instance = $(this);
            if (stepItem.length - 1 < step) {
              return;
            }
            if(step == 1)
            {
                $('#prevBtn').addClass('d-none')
                $('#submitBtn').addClass('d-none')
            }
            $('.step-content .step-content-foot button[name="prev"]').removeClass('out');
            if (step == (stepItem.length - 2)) {
              instance.addClass('out');
              instance.siblings('button[name="finish"]').removeClass('out');
            }
            $(stepItem[step]).addClass('active');
            $('.step-content-body').addClass('out');
            step++;
            $('#' + stepItem[step].dataset.id).removeClass('out');
          });

          // Step Last
          $('.step-content .step-content-foot button[name="finish"]').on('click', function() {
            if (step == stepItem.length) {
              return;
            }
            $(stepItem[stepItem.length - 1]).addClass('active');
            $('.step-content-body').addClass('out');
            $('#stepLast').removeClass('out');
            step++;
          });

          // Step Previous
          $('.step-content .step-content-foot button[name="prev"]').on('click', function() {
            if (step - 1 < 0) {
              return;
            }
            step--;
            var instance = $(this);
            if (step <= (stepItem.length - 1)) {
              instance.siblings('button[name="next"]').removeClass('out');
              instance.siblings('button[name="finish"]').addClass('out');
            }
            $('.step-content-body').addClass('out');
            $('#' + stepItem[step].dataset.id).removeClass('out');
            if (step === 0) {
              stepItem.removeClass('active');
            } else {
              stepItem.filter(':gt(' + (step - 1) + ')').removeClass('active');
            }
            if (step - 1 < 0) {
              $('.step-content .step-content-foot button[name="prev"]').addClass('out');
            }
          });
        });

    </script>
@endsection