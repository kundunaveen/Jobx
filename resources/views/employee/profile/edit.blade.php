@extends('employee.profile.partials.layout')
@section('content')
<style>
.select-box-2 span.select2.select2-container.select2-container--default {
    width: 100%!important;
}
/* .select-box-2 span.select2-selection.select2-selection--multiple {
    background: #fff;
    border: 1px solid #E1E1E1;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    padding: 0.5rem 3rem;
    height: 58px;
} */
span.select2.select2-container.select2-container--default{
    background: #fff!important;
    border: 1px solid #E1E1E1!important;
    border-radius: 10px!important;
    -webkit-border-radius: 10px!important;
    -moz-border-radius: 10px!important;
    padding: .6rem 3rem!important;
    width: 100%!important;
    height: 58px!important;
}
.select2-container--default .select2-selection--multiple {
    background-color: white;
    border: none!important;
}
</style>

<main class="main-bg inner-login-shape employer-form-page">
        <section class="form-inner-wrapper">
            <div class="container ">
                <div class="form-wrapper card">
                    <!-- <div class="progress" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <form class="form-inner" method="POST">
                        @csrf
                        <h2 class="form-heading">Profile Details</h2>
                        <div class="row form-group">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <label for="inputName4" class="form-label">First Name*</label>
                                <input type="text" class="form-control form-input" name="first_name" value="{{$employee->first_name}}" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Last Name*</label>
                                <input type="text" class="form-control form-input" name="last_name" value="{{$employee->last_name}}" placeholder="Last name"
                                    aria-label="Last name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="form-label">Gender <span class="text-danger">*</span></label>
                            <div class="col-12">
                                <select class="form-control" name="gender">
                                    @foreach($genders as $gender)
                                    <option $value="{{$gender->id}}" @if($employee->profile && $employee->profile->gender == $gender->id) selected @endif >{{$gender->value}}</option>
                                    @endforeach
                                </select>
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
                            <label for="inputName4" class="form-label">Current Salary*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" name="current_salary" value="{{$employee->profile->current_salary}}" placeholder="Current Salary"
                                aria-label="Current Salary">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputName4" class="form-label">Expected Salary*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" name="expected_salary" value="{{$employee->profile->expected_salary}}" placeholder="Expected Salary"
                                    aria-label="Expected Salary">
                            </div>
                        </div>
                        <div class="row form-group"> 
                            <label for="inputName4" class="form-label">Experience*</label>                          
                            <div class="col-12">
                                <input type="text" class="form-control form-input" name="experience" placeholder="Experience" value="{{$employee->profile->experience}}"
                                    aria-label="Experience">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="form-label">Languages</label>
                            <div class="col-12">                                
                                <select class="form-control languages" name="languages[]" id="languages" multiple>                                    
                                    @foreach($allLanguages as $lang)
                                    <option value="{{ $lang->id }} @if($languages && in_array($lang->id, $languages)) selected @endif ">{{$lang->value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <label for="inputName4" class="form-label">Address*</label>                           
                            <div class="col-12">
                                <input type="text" class="form-control form-input" name="address" placeholder="Address" value="{{$employee->profile->address}}"
                                    aria-label="Address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="form-label">Job Skills</label>
                            <div class="col-md-12">
                            <select name="skills[]" class="form-select skills" multiple aria-label="Default select example">
                                    @foreach($allSkills as $skill)
                                    <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="row form-group">
                            <label class="form-label">Upload Resume </label>
                            <div class="col-md-12">
                                <input type="file" name="resume" class="form-control">
                                @if($employee->profile->resume)
                                <small><a class="text-secondary" href="{{asset('image/resume/'.$employee->profile->resume)}}" target="_blank">View Resume</a></small>
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
                            <label for="check" class="form-label">Country*</label>
                            <div class="col-12">
                                <select name="country" class="form-select" aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($countries as $country)
                                    <option {{$country->id == $employee->profile->country ? 'selected': ''}} value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">State*</label>
                            <div class="col-12">
                                <select name="state" class="form-select " aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($states as $state)
                                    <option {{$state->id == $employee->profile->state ? 'selected': ''}} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>                            
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">City*</label>
                            <div class="col-12">                                
                                <select name="city" class="form-select " aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($cities as $city)
                                    <option {{$city->id == $employee->profile->city ? 'selected' : ''}} value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Zip*</label>
                            <div class="col-12">
                                <input type="number" name="zip" class="form-control form-input" value="{{$employee->profile->zip}}" placeholder="Zip Code"
                                aria-label="Zip Code">
                            </div>
                        </div>                       
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


