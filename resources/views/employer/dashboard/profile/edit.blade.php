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
                    <form class="form-inner" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <input type="text" class="form-control form-input" name="first_name" value="{{$employer->first_name}}" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Last Name*</label>
                                <input type="text" class="form-control form-input" name="last_name" value="{{$employer->last_name}}" placeholder="Last name"
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
                                <input type="number" name="contact" class="form-control form-input" value="{{$employer->contact}}" placeholder="Phone Number"
                                    aria-label="Phone Number">
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
                            <label for="inputPhone" class="form-label">Notification Option</label>
                            <div class="col-12">
                                <select name="notification_option" class="form-select" aria-label="Default select example">
                                    
                                    <option {{ 'email'== $employer->profile->notification_option ? 'selected':''}} value="email">Email</option>
                                    <option {{ 'jobax'== $employer->profile->notification_option ? 'selected':''}} value="jobax">Jobax platform notification</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                @if($employer->profile->intro_video == null)
                                <img src="{{asset('image/video.png')}}" onclick="$('#profile_video_input').click()">
                                @else
                                <video class="" controls>
                                    <source src="{{asset('image/company_videos/'.$employer->profile->intro_video)}}" type="video/mp4">
                                </video>
                                @endif
                            </div>
                            <input type="file" class="d-none" name="profile_video" id="profile_video_input">
                        </div>
                        
                        <h2 class="form-heading">Company Details</h2>
                        <div class="row form-group">
                            <label for="inputCompanyName" class="form-label">Company Name*</label>
                            <div class="col-12">
                                <input type="text" name="company_name" class="form-control form-input" value="{{$employer->profile->company_name}}" placeholder="Enter your Company Name"
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
                        <!-- <div class="row form-group">
                            <label for="inputTitle" class="form-label">Title*</label>
                            <div class="col-12">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Enter your title</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> -->

                        <!-- <div class="row form-group">
                            <div class="col-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Describe*</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{$employer->profile->description}}</textarea>
                        </div> -->
                        <!-- </div> -->

                        <h2 class="form-heading">Company Location</h2>
                        <div class="row form-group">
                            <label for="check" class="form-label">Country*</label>
                            <div class="col-12">
                                <select name="country" class="form-select country-list" aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($countries as $country)
                                    <option {{$country->id == $employer->profile->country ? 'selected': ''}} value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">State*</label>
                            <div class="col-12">
                                <select name="state" class="form-select state-list" aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($states as $state)
                                    <option {{$state->id == $employer->profile->state ? 'selected': ''}} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">City*</label>
                            <div class="col-12">
                                <select name="city" class="form-select city-list" aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($cities as $city)
                                    <option {{$city->id == $employer->profile->city ? 'selected' : ''}} value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Zip*</label>
                            <div class="col-12">
                                <input type="number" name="zip" class="form-control form-input" value="{{$employer->profile->zip}}" placeholder="Zip Code"
                                    aria-label="Zip Code">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Location*</label>
                            <div class="col-12">
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$employer->profile->address}}</textarea>
                            </div>
                        </div>
                        <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-9">
                                <input type="submit" class="btn  btn-primary btn-form" value="Publish">
                            </div>
                            <div class="col-sm-3  text-center text-sm-end">
                                <input type="reset" class="btn py-3 px-0 bg-transparent  fw-bold btn-skip" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main> 
</section>

@endsection