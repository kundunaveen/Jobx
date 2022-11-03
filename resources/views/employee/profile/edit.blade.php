@extends('employee.profile.partials.layout')
@section('content')
<main class="main-bg inner-login-shape employer-form-page">
    <section class="form-inner-wrapper">
        <div class="container ">
            <div class="form-wrapper card">
                <!-- <div class="progress" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                @include('layouts.messages.success')
                @include('layouts.messages.error')
                <form class="form-inner" method="POST" enctype="multipart/form-data" id="jquery-employee-profile-form-validation">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h2 class="form-heading">
                                Profile Details
                            </h2>
                        </div>
                        <div class="col-auto mt-2">
                            <!-- <a href="{{ route('employee.home') }}" title="Back to dashboard" class="text-primary"> -->
                            <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
                            <span class="col-auto"><u><a class="text-dark" href="{{ route('employee.home') }}">Back</a></u></span>
                            <!-- </a> -->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <label for="inputName4" class="form-label">First Name*</label>
                            <input type="text" class="form-control form-input" name="first_name" value="{{$employee->first_name}}" placeholder="First name" aria-label="First name">
                        </div>
                        <div class="col-md-6">
                            <label for="inputName4" class="form-label">Last Name*</label>
                            <input type="text" class="form-control form-input" name="last_name" value="{{$employee->last_name}}" placeholder="Last name" aria-label="Last name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="form-label">Gender*</label>
                        <div class="col-12">
                            <select class="form-control" name="gender">
                                <option value="">Select gender</option>
                                @foreach($genders as $gender)
                                <option value="{{ $gender->id }}" @if($gender->id == old('gender', optional($employee->profile)->gender)) selected @endif>{{$gender->value}}
                                </option>
                                @endforeach
                            </select>
                            @error('gender')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputName4" class="form-label">Date of Birth*</label>
                        <div class="col-12">
                            <input type="date" class="form-control form-input" name="date_of_birth" value="{{ old('date_of_birth', optional($employee->profile)->date_of_birth) }}" aria-label="Expected Salary">
                            @error('date_of_birth')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputName4" class="form-label">Current Job Title*</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="current_job_title" value="{{ old('current_job_title', optional($employee->profile)->current_job_title) }}" aria-label="Expected Salary" placeholder="Ex: Senior account manager">
                            @error('current_job_title')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="row form-group">
                            <label for="inputName4" class="form-label">Password*</label>
                            <div class="col-12">
                                <input type="password" class="form-control form-input" name="password" placeholder="Password"
                                aria-label="Password">
                            </div>                            
                        </div> -->
                    <div class="row form-group">
                        <label for="inputName4" class="form-label">Current Salary <small>(Kpa only)</small></label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="current_salary" value="{{ old('current_salary', optional($employee->profile)->current_salary) }}" aria-label="Current Salary" placeholder="Ex: 5">
                            @error('current_salary')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputName4" class="form-label">Expected Salary <small>(Kpa only)</small>*</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="expected_salary" value="{{ old('expected_salary', optional($employee->profile)->expected_salary) }}" aria-label="Expected Salary" placeholder="Ex: 9">
                            @error('current_salary')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputName4" class="form-label">Total year of experience</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="experience" value="{{ old('experience', optional($employee->profile)->experience) }}" aria-label="experience" placeholder="Ex: 15">
                            @error('experience')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="form-label">Languages</label>
                        <div class="col-12">
                            <select class="select2_dropdown select2_multiple_dropdown_languages drop_arrow" name="languages[]" multiple="multiple">
                                <option value="">Select multiple languages*</option>
                                @foreach($allLanguages as $lang)
                                <option value="{{ $lang->id }}" @if($languages && in_array($lang->id, old('languages', $languages))) selected @endif>
                                    {{$lang->value}}
                                </option>
                                @endforeach
                            </select>
                            @error('languages')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="form-label">Job Skills*</label>
                        <div class="col-md-12">
                            <select name="skills[]" class="select2_dropdown select2_multiple_dropdown_skills drop_arrow" multiple="multiple" aria-label="Default select example">
                                <option value="">Select multiple skills</option>
                                @foreach($allSkills as $skill)
                                <option value="{{ $skill->id }}" @if(is_array(explode(',', optional($employee->profile)->skills)) && in_array($skill->id, explode(',', optional($employee->profile)->skills))) @endif> 
                                    {{ $skill->skill }} 
                                </option>
                                @endforeach
                            </select>
                            @error('skills')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="form-label">Upload Resume</label>
                        <div class="col-md-12">
                            <input type="file" name="resume" class="form-control">
                            @if($resume = optional($employee->profile)->profile_resume_url)
                            <small>
                                <a class="text-secondary" href="{{ $resume }}" target="_blank">View Resume</a>
                            </small>
                            @endif
                            @error('resume')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <h2 class="form-heading">Location</h2>
                    <div class="row form-group">
                        <label for="inputName4" class="form-label">Address*</label>
                        <div class="col-12">
                            <textarea class="form-control" name="address" aria-label="Address" placeholder="Ex: #123 Street" rows="5">
                            {{ old('address', optional($employee->profile)->address) }}
                            </textarea>
                            @error('address')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="check" class="form-label">Country*</label>
                        <div class="col-12">
                            <select name="country" require class="country-list select2_dropdown" aria-label="Default select example">
                                <option option="">Select country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" {{$country->id == old('country', optional($employee->profile)->country) ? 'selected': ''}}>{{$country->name}}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="check" class="form-label">State</label>
                        <div class="col-12">
                            <select name="state" class="form-select state-list select2_dropdown" aria-label="Default select example">
                                <option option="">Select state</option>
                                @foreach($states as $state)
                                <option value="{{$state->id}}" {{$state->id == old('state', optional($employee->profile)->state) ? 'selected': ''}}>{{$state->name}}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="check" class="form-label">City</label>
                        <div class="col-12">
                            <select name="city" class="form-select city-list select2_dropdown" aria-label="Default select example">
                                <option value="">Select city</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}" {{$city->id == old('city', optional($employee->profile)->city) ? 'selected' : ''}}>{{$city->city}}</option>
                                @endforeach
                            </select>
                            @error('city')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="check" class="form-label">Zip</label>
                        <div class="col-12">
                            <input type="text" name="zip" class="form-control form-input" value="{{ old('zip', optional($employee->profile)->zip) }}" aria-label="Zip Code" placeholder="Ex: 3F27A5">
                            @error('zip')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="form-label">Upload your profile image </label>
                        <div class="col-md-12">
                            <input type="file" name="profile_image" class="form-control" accept="image/png, image/jpg, image/jpeg" id="single_file">
                            <small class="text-secondary">Maximum file size 2 MB (.jpeg, .jpg, .png files are accepted)</small>
                            <div class="row thumbnails">
                                @if (optional($employee->profile)->profile_image_url)
                                <div class='col-4 pip'>
                                    <img class='imageThumb' src="{{ optional($employee->profile)->profile_image_url }}" title="{{ optional($employee->profile)->logo }}" />
                                </div>
                                @endif
                            </div>
                            @error('profile_image')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputPhone" class="form-label">Upload introduction video</label>
                        <div class="col-12">
                            <input type="file" class="form-control" name="profile_video" id="profile_video" accept="video/mp4">
                            <small class="text-secondary">Maximum file size 40 MB (.mp4 file only accepted)</small>
                            @if(optional($employee->profile)->profile_video_url)
                            <div class="row">
                                <div class="col-12">
                                    <video width="100%" controls>
                                        <source src="{{ optional($employee->profile)->profile_video_url }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                            @endif
                            @error('profile_video')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputVideoLink" class="form-label">Add your youtube link</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="video_link" value="{{ old('video_link', optional($employee->profile)->video_link) }}" aria-label="VideoLink" placeholder="Ex: https://www.youtube.com/watch?v=4KVIFNJ7mDQ">
                            @error('video_link')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputVideoLink" class="form-label">Add your website link</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="website_link" value="{{ old('website_link', optional($employee->profile)->website_link) }}" aria-label="VideoLink" placeholder="Ex: https://www.mywebsite.com">
                            @error('website_link')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputFacebookLink" class="form-label">Your Facebook link</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="social_media_link[facebook]" value="{{ old('social_media_link.facebook', rescue(function() use($employee){ return $employee->profile->social_media_link['facebook']; }, '')) }}" aria-label="inputLinkedinLink" placeholder="Ex: https://www.facebook.com">
                            @error('social_media_link.facebook')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputLinkedinLink" class="form-label">Your Linkedin link</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="social_media_link[linkedin]" value="{{ old('social_media_link.linkedin', rescue(function() use($employee){ return $employee->profile->social_media_link['linkedin']; }, '')) }}" aria-label="inputLinkedinLink" placeholder="Ex: https://www.linkedin.com">
                            @error('social_media_link.linkedin')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputTwitterLink" class="form-label">Your Twitter link</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="social_media_link[twitter]" value="{{ old('social_media_link.twitter', rescue(function() use($employee){ return $employee->profile->social_media_link['twitter']; }, '')) }}" aria-label="inputTwitterLink" placeholder="Ex: https://www.twiiter.com">
                            @error('social_media_link.twitter')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="inputInstagramLink" class="form-label">Your Instagram link</label>
                        <div class="col-12">
                            <input type="text" class="form-control form-input" name="social_media_link[instagram]" value="{{ old('social_media_link.instagram', rescue(function() use($employee){ return $employee->profile->social_media_link['instagram']; }, '')) }}" aria-label="inputInstagramLink" placeholder="Ex: https://www.instagram.com">
                            @error('social_media_link.instagram')
                            <span class="text-danger" role="alert">
                                <strong style="font-size: 14px;">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    {{--
                    <div class="row form-group">
                        <label for="inputPhone" class="form-label">Experiences</label>
                        <div class="col-12">
                            @include('employee.profile.experience.index')
                        </div>
                    </div>
                    --}}
                    <div class="row justify-content-between">
                        <div class="col-md-6 form-group">

                            <a href="{{ route('employee.experience.create') }}" target="_blank">Add your experience</a>
                        </div>
                        <div class="col-md-6 form-group">

                            <a href="{{ route('employee.education.create') }}" target="_blank">Add your education</a>
                        </div>
                    </div>
                    {{--
                    <div class="row form-group">
                        <label for="inputPhone" class="form-label">Educations</label>
                        <div class="col-12">
                            @include('employee.profile.education.index')
                        </div>
                    </div>
                    --}}
            <div class="row btn-form-wrapper">
                <div class="d-grid col-sm-6">
                    <input type="submit" class="btn  btn-primary btn-form" value="Publish">
                </div>
                <div class="d-grid col-sm-6 text-center">
                    <input type="reset" class="btn py-3 px-0 bg-transparent  fw-bold btn-skip" value="Cancel">
                </div>
            </div>
            </form>
        </div>
        </div>
    </section>
</main>
@endsection