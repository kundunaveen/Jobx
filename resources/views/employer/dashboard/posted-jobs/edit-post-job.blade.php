@extends('employer.dashboard.partials.layout')
@section('title')
    Employer | Edit Post Job
@endsection
@section('content')
<style>
.select-box-2 span.select2.select2-container.select2-container--default {
    width: 100% !important;
}
.select2-selection{
    border:none !important;
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
                        <h2 class="form-heading">Edit Posted Job</h2>
                        <div class="row form-group">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <label for="inputName4" class="form-label">First Name*</label>
                                <input type="text" class="form-control form-input" readonly value="{{auth()->user()->first_name}}" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Last Name*</label>
                                <input type="text" class="form-control form-input" readonly value="{{auth()->user()->last_name}}" placeholder="Last name"
                                    aria-label="Last name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Company Name</label>
                                <input value="{{auth()->user()->profile->company_name}}" type="text" class="form-control form-input"
                                    placeholder="Enter your Email address" readonly disabled value="" id="inputEmail4">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Job Title</label>
                            <div class="col-12">
                                <input type="text" name="job_title" value="{{$vacancy->job_title}}" class="form-control form-input" placeholder="Job Title"
                                    aria-label="Job Title">
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Job Role</label>
                            <div class="col-12">
                                <input type="text" name="job_role" value="{{$vacancy->job_role}}" class="form-control form-input"  placeholder="Job Role"
                                    aria-label="Job Role">
                                @error('job_role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Department</label>
                            <div class="col-12">
                                <input type="text" name="department" value="{{$vacancy->department}}" class="form-control form-input" placeholder="Department"
                                    aria-label="Department">
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Job Type</label>
                            <div class="col-12">
                                <select name="job_type" class="form-select" aria-label="Default select example">
                                    @foreach($job_types as $job_type)
                                    <option {{$job_type->id == $vacancy->job_type ? 'selected':''}} value="{{$job_type->id}}" >{{$job_type->value}}</option>
                                    @endforeach                 
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Min. Experience Required</label>
                            <div class="col-12">
                                <input type="number" step="0.01" value="{{$vacancy->min_exp}}" name="min_exp" class="form-control form-input" placeholder="Minimum Experience"
                                    aria-label="Department">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Salary Offer</label>
                            <div class="col-12">
                                <input type="number" step="0.01" value="{{$vacancy->salary_offer}}" name="salary_offer" class="form-control form-input" placeholder="Salary Offer"
                                    aria-label="Department">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Skill Required</label>
                            <div class="col-12 ">
                                <select name="skills[]" class="form-select skills" multiple aria-label="Default select example">
                                    @foreach($allSkills as $skill)
                                    <option value="{{ $skill->id }}" @if($skills && in_array($skill->id, $skills)) selected @endif >{{$skill->skill}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h2 class="form-heading">Location</h2>
                        
                        <div class="row form-group">
                            <div class="col-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Address*</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="5">{{$vacancy->location}}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group select-box-2">
                            <label for="check" class="form-label">Country*</label>
                            <div class="col-12">
                                <select name="country" class="form-select country-list" aria-label="Default select example">
                                    @foreach($countries as $country)
                                    <option {{$country->id == $vacancy->country ? 'selected':'' }} value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group select-box-2">
                            <label for="check" class="form-label">State*</label>
                            <div class="col-12">
                                <select name="state" class="form-select state-list" aria-label="Default select example">
                                    @foreach($states as $state)
                                    <option {{$state->id == $vacancy->state ? 'selected':'' }} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group select-box-2">
                            <label for="check" class="form-label">City*</label>
                            <div class="col-12">
                                <select name="city" class="form-select city-list" aria-label="Default select example">
                                    @foreach($cities as $city)
                                    <option {{$city->id == $vacancy->city ? 'selected':'' }} value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Zip*</label>
                            <div class="col-12">
                                <input type="number" value="{{$vacancy->zip}}" name="zip" class="form-control form-input" value="" placeholder="Zip Code"
                                    aria-label="Zip Code">
                                @error('zip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Describe*</label>
                            <div class="col-12">
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$vacancy->description}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Images</label>
                            <div class="col-12">
                                <input type="file" name="images_input" class="form-control">
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            @if($vacancy->images !=null)
                            <div class="mt-3">
                                <img src="{{asset('image/company_images/'.$vacancy->images)}}" style="object-fit:cover;width:100%;height:350px" type="video/mp4">        
                            </div>
                            @endif
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Video</label>
                            <div class="col-12">
                                <input type="file" name="video_input"  class="form-control">
                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            @if($vacancy->video !=null)
                            <div class="mt-3">
                                <video class="" controls>
                                    <source src="{{ asset('image/company_videos/'.$vacancy->video) }}" type="video/mp4">
                                </video>
                            </div>
                            @endif
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
    </section


    @endsection