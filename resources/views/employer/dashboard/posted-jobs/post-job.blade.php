@extends('employer.dashboard.partials.layout')
@section('title')
Employer | Post Job
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
        width: 100% !important;
    }

    .select2-selection {
        border: none !important;
    }

    span.select2.select2-container {
        background: #fff !important;
        border: 1px solid #E1E1E1 !important;
        border-radius: 10px !important;
        -webkit-border-radius: 10px !important;
        -moz-border-radius: 10px !important;
        padding: .8rem 3rem !important;
        height: 58px !important;
        width: 100% !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 15px !important;
        right: 30px !important;
    }

    span.select2-selection.select2-selection--single {
        border: none;
        width: 100% !important;
    }

    .main-bg {
        padding: 0px !important;
    }
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
      width: 15%;
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
                    <form class="form-inner" method="POST" enctype="multipart/form-data" id="jquery-post-job-form-validation">
                        @csrf
                        <div class="card step-progress">
                            <div class="step-slider">
                                <div data-id="step1" class="step-slider-item"></div>
                                <div data-id="step2" class="step-slider-item"></div>
                                <div data-id="step3" class="step-slider-item"></div>                
                                <div data-id="step4" class="step-slider-item"></div>
                                <div data-id="step5" class="step-slider-item"></div>
                                <div data-id="step6" class="step-slider-item"></div>
                            </div>
                            <div class="step-content">
                                <div id="step1" class="step-content-body">
                                    <div class="row justify-content-between">
                                        <div class="col-auto"><h2 class="form-heading mt-4">Profile Details</h2></div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="inputName4" class="form-label">First Name*</label>
                                            <input type="text" class="form-control form-input" readonly value="{{auth()->user()->first_name}}" placeholder="First name" aria-label="First name">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="inputName4" class="form-label">Last Name*</label>
                                            <input type="text" class="form-control form-input" readonly value="{{auth()->user()->last_name}}" placeholder="Last name" aria-label="Last name">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="inputName4" class="form-label">Email*</label>
                                            <input type="text" class="form-control form-input" readonly value="{{auth()->user()->email}}" placeholder="Last name" aria-label="Last name">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="inputName4" class="form-label">Contact*</label>
                                            <input type="text" class="form-control form-input" readonly value="{{auth()->user()->contact}}" placeholder="Last name" aria-label="Last name">
                                        </div>
                                    </div>
                                </div>
                                <div id="step2" class="step-content-body out">
                                    <div class="row justify-content-between">
                                        <div class="col-auto"><h2 class="form-heading mt-4">Company Details</h2></div>
                                        
                                    </div>
                                     <div class="row form-group">
                                        <div class="col-12">
                                            <label for="inputEmail4" class="form-label">Company Name</label>
                                            <input value="{{ auth()->user()->profile->company_name }}" type="text" class="form-control form-input" readonly disabled id="inputEmail4">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="inputEmail4" class="form-label">Company Branch</label>
                                            <input value="" type="text" name="company_branch" placeholder="Ex: New York" class="form-control form-input"  >
                                        </div>
                                    </div>
                                </div>
                                <div id="step3" class="step-content-body out">
                                     <div class="row justify-content-between">
                                        <div class="col-auto"><h2 class="form-heading mt-4">Vacancy Details</h2></div>
                                        
                                    </div>
                                     <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Job Title</label>
                                        <div class="col-12">
                                            <input type="text" name="job_title" value="{{ old('job_title') }}" class="form-control form-input" placeholder="Ex: Business Manager" aria-label="Job Title">
                                           
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Job Role</label>
                                        <div class="col-12">
                                            <input type="text" name="job_role" value="{{ old('job_role') }}" class="form-control form-input" placeholder="Ex: Business Analyst" aria-label="Job Role">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Department</label>
                                        <div class="col-12">
                                            <input type="text" name="department" value="{{ old('department') }}" class="form-control form-input" placeholder="Ex: Business Management" aria-label="Department">
                                            
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Job Type</label>
                                        <div class="col-12">
                                            <select name="job_type" class="form-select" aria-label="Default select example">
                                                @foreach($job_types as $job_type)
                                                <option value="{{$job_type->id}}" @if($job_type->id == old('job_type')) selected @endif>{{$job_type->value}}</option>
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Skill Required</label>
                                        <div class="col-12">
                                            <select name="skills[]" class="form-select skills" multiple aria-label="Default select example">
                                                @foreach($skills as $skill)
                                                <option value="{{$skill->id}}" @if(is_array(old('skills')) && in_array($skill->id, old('skills'))) selected @endif>{{$skill->skill}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="step4" class="step-content-body out">
                                    <div class="row justify-content-between">
                                        <div class="col-auto"><h2 class="form-heading mt-4">Working Details</h2></div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Min. Experience Required <small>(Yrs)</small></label>
                                        <div class="col-12">
                                            <input type="number" step="0.01" name="min_exp" value="{{ old('min_exp') }}" class="form-control form-input" placeholder="Ex: 5.6" aria-label="Department">
                                            
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Minimum weekly work hour</label>
                                        <div class="col-12">
                                            <input type="text" name="min_work_hours" value="{{ old('min_work_hours') }}" class="form-control form-input" placeholder="Ex: 33" aria-label="Department">
                                           
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Maximum weekly work hour</label>
                                        <div class="col-12">
                                            <input type="text" name="max_work_hours" value="{{ old('max_work_hours') }}" class="form-control form-input" placeholder="Ex: 33" aria-label="Department">
                                            
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="inputPhone" class="form-label">Salary Offer <strong>({{ config('settings.currency') }}/month)</strong></label>
                                        <div class="col-12">
                                            <input type="number" step="0.01" name="salary_offer" value="{{ old('salary_offer') }}" class="form-control form-input" placeholder="Ex: 33" aria-label="Department">
                                            
                                        </div>
                                    </div>
                                  
                                </div>
                                <div id="step5" class="step-content-body out">
                                    <div class="row justify-content-between">
                                        <div class="col-auto"><h2 class="form-heading mt-4">Visual Details</h2></div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label">Images</label>
                                        <div class="col-12">
                                            <input type="file" name="images_input[]" multiple class="form-control" id="files">
                                            <small class="text-secondary">Maximum file size 2 MB (.jpeg, .jpg, .png files are accepted)</small>
                                            <div class="row thumbnails"></div>
                                           
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label">Video</label>
                                        <div class="col-12">
                                            <input type="file" name="video_input" class="form-control">
                                            <small class="text-secondary">Maximum file size 20 MB (.mp4 file accepted)</small>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div id="step6" class="step-content-body out">
                                    <div class="row justify-content-between">
                                        <div class="col-auto"><h2 class="form-heading mt-4">Location Details</h2></div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <label for="exampleFormControlTextarea1" class="form-label">Address*</label>
                                            <textarea class="form-control" name="address" placeholder="Ex: #123 main street" id="exampleFormControlTextarea1" rows="5">{{ old('address') }}</textarea>
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label">Country*</label>
                                        <div class="col-12">
                                            <select name="country" class="form-select country-list" aria-label="Default select example">
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if($country->id == old('country', '156')) selected @endif>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label">State*</label>
                                        <div class="col-12">
                                            <select name="state" class="form-select state-list" aria-label="Default select example">
                                                @foreach($states as $state)
                                                <option value="{{$state->id}}" @if($state->id == old('state')) selected @endif>{{$state->name}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label ">City*</label>
                                        <div class="col-12">
                                            <select name="city" class="form-select city-list" aria-label="Default select example">
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}" @if($city->id == old('city')) selected @endif>{{$city->city}}</option>
                                                @endforeach
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label">Zip*</label>
                                        <div class="col-12">
                                            <input type="number" name="zip" class="form-control form-input" value="{{ old('zip') }}" placeholder="Ex: 10101" aria-label="Zip Code">
                                           
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="check" class="form-label">Describe*</label>
                                        <div class="col-12">
                                            <textarea name="description" class="form-control" placeholder="Ex: We are seeking for a awesome business manager." id="exampleFormControlTextarea1" rows="5">{{ old('description') }}</textarea>
                                            
                                        </div>
                                    </div>
                                     <div class=" d-grid col-sm-9">
                                        <input type="submit" class="btn  btn-primary btn-form" value="Publish">
                                        <div class="col-sm-3  text-center text-sm-end">
                                            <input type="reset" class="btn py-3 px-0 bg-transparent fw-bold btn-skip" value="Back" onclick="$('#prevBtn').click();$('#prevBtn').removeClass('d-none')">
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
                        
                        
                        <!-- <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-9">
                                <button type="submit" class="btn  btn-primary btn-form">Publish</button>
                            </div>
                            <div class="col-sm-3  text-center text-sm-end">
                                
                                <a href="{{route('employer.posted.jobs')}}" type="reset" class="btn py-3 px-0 bg-transparent  fw-bold btn-skip">Cancel</a>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </section>
    </main>
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
               // alert(step)
                var instance = $(this);
                if (stepItem.length - 1 < step) {
                  return;
                }
                if(step == 1)
                {
                   // $('#prevBtn').addClass('d-none')
                    $('#submitBtn').addClass('d-none')
                }
                if(step == 4)
                {
                    $('#prevBtn').addClass('d-none')
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