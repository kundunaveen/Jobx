@extends('admin.dashboard.partials.layout')
@section('title')
    Admin | Manage Vacancies
@endsection
@section('content')

    <section class="dashboard-section inner-login-shape add_vacancy_table ">
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-12">
                    <!-- <div class="card recruiter-section">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                <article class="recruiter-article">
                                    <h5>Hello Recruiter!</h5>
                                    <p>You have 10 new applications. </p>
                                    <a href="javascript:void(0)">Review all</a>
                                </article>
                                </div>
                                <div class="col-md-5">
                                <figure class="dashboard-girl-img text-sm-center">
                                    <img src="{{asset('assets/images/girls-img.png')}}" width="276" height="298" alt=""
                                        class="img-fluid" />
                                </figure>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="candidate-count-wrapper">
                        <div class="row">
                            <div class="col-md-6 pe-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Shortlisted</h5>
                                        <span class="candidate-count">12.2K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-1.png')}}" width="85" height="85" alt=""
                                            class="img-fluid" />
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6 ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>On-Hold</h5>
                                        <span class="candidate-count">10.5K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-2.png')}}" width="85" height="85" alt="" />
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  pe-lg-4 ">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Hired</h5>
                                        <span class="candidate-count">12.2K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-3.png')}}" width="85" height="85" alt="" />
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Rejected</h5>
                                        <span class="candidate-count">9.2K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-1.png')}}" width="85" height="85" alt="" />
                                    </figure>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="dashboard-graph-wrapper admin_inputs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card active-wrapper">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <h3 class="card-title col-auto mt-2">Edit Vacancy</h3>
                                        <a class="col-auto btn btn-primary" href="{{ route('admin.manageVacancy') }}" style="margin-right:10px !important">Back</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row"> 
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Employer Name <span class="text-danger">*</span></label>
                                                <select class="form-control company_name" disabled >
                                                    @foreach($employers as $employer)
                                                    @if($employer->profile != null && $employer->profile->company_name != null)
                                                    <option {{$employer->id == $vacancy->employer_id ? 'selected':''}} value="{{$employer->id}}">{{$employer->profile->company_name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Company Name </label>

                                                <input type="text" maxlength="100" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{$vacancy->company_name}}" >
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Company Branch</label>
                                                <input type="text" maxlength="100" name="branch" value="{{ $vacancy->branch }}" class="form-control @error('branch') is-invalid @enderror" >
                                                @error('branch')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Job Title <span class="text-danger">*</span></label>
                                                <input type="text" maxlength="100" name="job_title" value="{{$vacancy->job_title}}" class="form-control @error('job_title') is-invalid @enderror" >
                                                @error('job_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Job Role <span class="text-danger">*</span></label>
                                                <input type="text" maxlength="100" name="job_role" value="{{$vacancy->job_role}}" class="form-control @error('job_role') is-invalid @enderror" >
                                                @error('job_role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                                <input type="text" name="department" maxlength="100" value="{{$vacancy->department}}" class="form-control @error('department') is-invalid @enderror" >
                                                @error('department')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-3">
                                                <label class="form-label">Min. Experience Required </label>
                                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4" value="{{$vacancy->min_exp}}" step="0.01" name="min_exp" class="form-control @error('min_exp') is-invalid @enderror" >
                                                @error('min_exp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label">Salary Offer </label>
                                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="5" value="{{$vacancy->salary_offer}}" step="0.01" name="salary_offer" class="form-control @error('salary_offering') is-invalid @enderror" >
                                                @error('salary_offer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label">Minimum weekly work hour</label>
                                                <input type="text" name="min_work_hours" value="{{ old('min_work_hours', $vacancy->min_work_hours) }}" class="form-control @error('min_work_hours') is-invalid @enderror" >
                                                @error('min_work_hours')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="form-label">Maximum weekly work hour</label>
                                                <input type="text" name="max_work_hours" value="{{ old('max_work_hours', $vacancy->max_work_hours) }}" class="form-control @error('min_work_hours') is-invalid @enderror" >
                                                @error('max_work_hours')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Skills Required <span class="text-danger">*</span></label>
                                                <!-- <input type="number" step="0.01" name="min_exp" class="form-control @error('min_exp') is-invalid @enderror" required> -->
                                                <select class="form-control" name="skills[]" id="skills" multiple>
                                                   
                                                    @foreach($allSkills as $skill)
                                                    <option value="{{ $skill->id }}" @if($skills && in_array($skill->id, $skills)) selected @endif >{{$skill->skill}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Job Type </label>
                                                <!-- <input type="number" step="0.01" name="min_exp" class="form-control @error('min_exp') is-invalid @enderror" required> -->
                                                <select class="form-control" name="job_type" id="job_type" >
                                                    @foreach($job_types as $job_type)
                                                    <option {{$vacancy->job_type == $job_type->id?'selected':''}} value="{{$job_type->id}}" >{{$job_type->value}}</option>
                                                    @endforeach
                                                    <!-- <option {{$vacancy->job_type == 'full_time' ? 'selected':''}} value="full_time" >Full Time</option>
                                                    <option {{$vacancy->job_type == 'part_time' ? 'selected':''}} value="part_time" >Part Time</option>
                                                    <option {{$vacancy->job_type == 'contract_based' ? 'selected':''}} value="contract_based" >Contract Based</option> -->
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Location <span class="text-danger">*</span></label>
                                                <input type="text" maxlength="100" name="location" value="{{$vacancy->location}}" class="form-control @error('location') is-invalid @enderror">
                                                @error('location')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                                <select class="form-control country-list" name="country" id="countries">
                                                    @foreach($countries as $country)
                                                    <option {{$country->id == $vacancy->country ? 'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-4">
                                                <label class="form-label">State <span class="text-danger">*</span></label>
                                                <select class="form-control state-list" name="state" id="states">
                                                    @foreach($states as $state)
                                                    <option {{$state->id == $vacancy->state ? 'selected':''}} value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <select class="form-control city-list" name="city" id="cities">
                                                    @foreach($cities as $city)
                                                    <option {{$city->id == $vacancy->city ? 'selected':''}} value="{{$city->id}}">{{$city->city}}</option>
                                                    @endforeach
                                                </select>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Zip Code</label>
                                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" type="text" name="zip" value="{{$vacancy->zip}}" class="form-control @error('zip') is-invalid @enderror">
                                                @error('zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Image</label>
                                                <input type="file" name="images_input[]" multiple class="form-control" id="files">
                                                <small class="text-secondary">Maximum file size 2 MB (.jpeg, .jpg, .png files are accepted)</small>
                                                <div class="row thumbnails">
                                                @forelse ($vacancy->getImagesInArray() as $image)
                                                    <div class="col-3 pip">
                                                        <img class='imageThumb' src="{{ \Illuminate\Support\Facades\Storage::disk(config('settings.file_system_service'))->url(\App\Models\Vacancy::IMAGE_PATH.'/'.$image) }}" width="100" class="">
                                                        <input type="hidden" name="old_images_input[]" value="{{ $image }}">
                                                        <a class='remove remove-button mt-2 btn btn-danger btn-sm' href='javascript:void(0);' width='100'>Remove</a>
                                                    </div>
                                                @empty
                                                @endforelse
                                                </div>
                                                @error('images_input')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Video</label>
                                                <input type="file" name="video_input" class="form-control">
                                                <small class="text-secondary">Maximum file size 20 MB (.mp4 file accepted)</small>
                                                @if($vacancy->video_url)
                                                <div class="mt-3">
                                                    <video class="" controls>
                                                        <source src="{{ $vacancy->video_url }}" type="video/mp4">
                                                    </video>
                                                </div>
                                                @endif                                             
                                                @error('video_input')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{$vacancy->description}}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row justify-content-between"> 
                                            <div class="form-group col-auto">
                                            </div>
                                            <div class="form-group col-auto">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="col-xxl-4">
                    <aside class="aside-right">
                        <div class="card posted-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>Posted Vacancies</h4>
                                <a href="javascript:void(0)">See all</a>
                                </div>
                                <ul class="list-group posted-list">
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                </ul>
                            </div>
                        </div>
    
                        <div class="card applicant-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>New Applicants</h4>
                                <a href="javascript:void(0)">See all</a>
                                </div>
                                <ul class="list-group applicants-list">
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="card activity-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>Activity</h4>
                                <a href="javascript:void(0)" class="notify-icon"><span class="pause-btn"></span><i class="icon-notify"></i></span><span class="notify-count">0</span></a>
                                </div>
                                <ul class="list-group activity-list">
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <figure>
                                            <span class="spriteicon"><i class="plan-expire"></i></span>
                                        </figure>
                                        <article>
                                            <p class="mb-0 text-underline">Your plan expires in <span>3 days</span>.</p>
                                            <a href="javascript:void(0)">Renew now</a>
                                        </article>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <figure>
                                            <span class="spriteicon"><i class="applictaion"></i></span>
                                        </figure>
                                        <article>
                                            <p class="mb-0 text-underline">There are <span>3 new appplications</span> to
                                            <span>iOS Developer</span>.
                                            </p>
                                        </article>
                                    </div>
                                </li>
    
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <figure>
                                            <span class="spriteicon"><i class="closed"></i></span>
                                        </figure>
                                        <article>
                                            <p class="">Your teammate, <span>Sammy</span> has closed
                                            the job post of <span>UI/UX Designer</span> </p>
                                        </article>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    </div> -->
                </div>
            </div>
        </div>
    
    </section>
@endsection
