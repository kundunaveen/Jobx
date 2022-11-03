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
                    <form class="form-inner" method="POST" enctype="multipart/form-data" id="jquery-post-job-form-validation">
                        @csrf
                        <h2 class="form-heading">Post New Job</h2>
                        <div class="row form-group">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <label for="inputName4" class="form-label">First Name*</label>
                                <input type="text" class="form-control form-input" readonly value="{{auth()->user()->first_name}}" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Last Name*</label>
                                <input type="text" class="form-control form-input" readonly value="{{auth()->user()->last_name}}" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Company Name</label>
                                <input value="{{ auth()->user()->profile->company_name }}" type="text" class="form-control form-input" readonly disabled value="" id="inputEmail4">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Job Title</label>
                            <div class="col-12">
                                <input type="text" name="job_title" value="{{ old('job_title') }}" class="form-control form-input" placeholder="Ex: Business Manager" aria-label="Job Title">
                                @error('job_title')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Job Role</label>
                            <div class="col-12">
                                <input type="text" name="job_role" value="{{ old('job_role') }}" class="form-control form-input" placeholder="Ex: Business Analyst" aria-label="Job Role">
                                @error('job_role')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Department</label>
                            <div class="col-12">
                                <input type="text" name="department" value="{{ old('department') }}" class="form-control form-input" placeholder="Ex: Business Management" aria-label="Department">
                                @error('department')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
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
                                @error('job_type')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Min. Experience Required <small>(Yrs)</small></label>
                            <div class="col-12">
                                <input type="number" step="0.01" name="min_exp" value="{{ old('min_exp') }}" class="form-control form-input" placeholder="Ex: 5.6" aria-label="Department">
                                @error('min_exp')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Salary Offer <small>(kpa)</small></label>
                            <div class="col-12">
                                <input type="number" step="0.01" name="salary_offer" value="{{ old('salary_offer') }}" class="form-control form-input" placeholder="Ex: 33" aria-label="Department">
                                @error('salary_offer')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
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
                                @error('skills')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <h2 class="form-heading">Location</h2>

                        <div class="row form-group">
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Address*</label>
                                <textarea class="form-control" name="address" placeholder="Ex: #123 main street" id="exampleFormControlTextarea1" rows="5">{{ old('address') }}</textarea>
                                @error('address')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
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
                                @error('country')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
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
                                @error('state')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
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
                                @error('city')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Zip*</label>
                            <div class="col-12">
                                <input type="number" name="zip" class="form-control form-input" value="{{ old('zip') }}" placeholder="Ex: 10101" aria-label="Zip Code">
                                @error('zip')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Describe*</label>
                            <div class="col-12">
                                <textarea name="description" class="form-control" placeholder="Ex: We are seeking for a awesome business manager." id="exampleFormControlTextarea1" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Images</label>
                            <div class="col-12">
                                <input type="file" name="images_input[]" multiple class="form-control" id="files">
                                <small class="text-secondary">Maximum file size 2 MB (.jpeg, .jpg, .png files are accepted)</small>
                                <div class="row thumbnails"></div>
                                @error('images_input')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Video</label>
                            <div class="col-12">
                                <input type="file" name="video_input" class="form-control">
                                <small class="text-secondary">Maximum file size 20 MB (.mp4 file accepted)</small>
                                @error('video')
                                <small class="text-danger mt-1">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-9">
                                <button type="submit" class="btn  btn-primary btn-form">Publish</button>
                            </div>
                            <div class="col-sm-3  text-center text-sm-end">
                                <!-- <input type="reset" class="btn py-3 px-0 bg-transparent  fw-bold btn-skip" value="Cancel"> -->
                                <a href="{{route('employer.posted.jobs')}}" type="reset" class="btn py-3 px-0 bg-transparent  fw-bold btn-skip">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    @endsection