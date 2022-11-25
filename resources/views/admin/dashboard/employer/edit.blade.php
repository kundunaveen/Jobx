@extends('admin.dashboard.partials.layout')
@section('title')
    Admin | Manage Employer
@endsection
@section('content')

    <section class="dashboard-section inner-login-shape ">
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
                    <div class="dashboard-graph-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card active-wrapper">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <h3 class="card-title col-auto mt-2">Edit Employer</h3>
                                        <a class="col-auto btn btn-primary" href="{{ route('admin.manageEmployer') }}" style="margin-right:10px !important">Back</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 edit_profile_section" id="profile-image-div" style="position:relative">
                                            <img class="" src="{{ optional($employer->profile)->employer_image_url }}" id="blah" onclick="$('#company_image').click()" style="border-radius:100%; border:solid lightgray 1px; cursor:pointer; height:280px;width:280px;object-fit:cover">
                                                {{--<!-- @if($employer->profile && optional($employer->profile)->logo)
                                                <img class="" src="{{asset('image/company_images/'.optional($employer->profile)->logo)}}" id="blah" onclick="$('#company_image').click()" style="border-radius:100%; border:solid lightgray 1px; cursor:pointer; height:280px;width:280px;object-fit:cover">
                                                @else
                                                <img class="" src="{{asset('image/company.png')}}" id="blah" onclick="$('#company_image').click()" style="border-radius:100%; border:solid lightgray 1px; cursor:pointer; height:280px;width:280px;object-fit:cover">
                                                @endif -->--}}
                                                <button id="delete-profile-btn" onclick="deleteProfile('{{$employer->id}}')" class="text-danger d-none" style="position:absolute;top:20px;left:20px;border:none;background:inherit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                                </button>
                                                <input type="file" class="d-none" name="company_image" id="company_image">
                                                @error('company_image')
                                                    <div class="text-danger" role="alert">
                                                        <strong style="font-size: 14px;">{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-8" style="border-radius:10px;position:relative" id="profile-video-div">
                                                @if($employer->profile && optional($employer->profile)->intro_video)
                                                <video class="" controls onclick="$('#company_intro').click()" style="border-radius: 20px;border:solid lightgray 1px; cursor:pointer; height:280px;width:100%; object-fit:cover">
                                                    <source src="{{ optional($employer->profile)->employer_video_url }}" type="video/mp4">
                                                </video>
                                                @else
                                                <img class="" src="{{asset('image/video.png')}}" onclick="$('#company_intro').click()" style="border-radius: 20px;border:solid lightgray 1px; cursor:pointer; height:280px;width:100%; object-fit:cover">
                                                @endif
                                                <button id="delete-video-btn" onclick="deleteVideo('{{$employer->id}}')" class="d-none text-danger" style="position:absolute;top:20px;left:20px;border:none;background:inherit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                                <input type="file" class="d-none" name="company_intro" id="company_intro">
                                                @error('company_intro')
                                                    <span class="text-danger" role="alert">
                                                        <strong style="font-size: 14px;">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> 
                                        <div class="mt-5 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" maxlength="100" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $employer->first_name }}" required>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" maxlength="100" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ $employer->last_name }}" required>
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Contact <span class="text-danger">*</span></label>
                                                <input type="tel" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15"  name="contact" class="form-control @error('contact') is-invalid @enderror" @if($employer->contact) value="{{$employer->contact}}" @endif required>
                                                @error('contact')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Password</label>
                                                <input name="password" maxlength="100" type="password" class="form-control @error('password') is-invalid @enderror">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Company Name <span class="text-danger">*</span></label>
                                                <input type="text" maxlength="100" name="company_name" class="form-control @error('company_name') is-invalid @enderror" @if($employer->profile && optional($employer->profile)->company_name) value="{{optional($employer->profile)->company_name}}" @endif required>
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Industry Type <span class="text-danger">*</span></label>
                                                <select class="form-control" name="industry_type" required>
                                                   
                                                    @foreach($industries as $industry)
                                                    <option @if($employer->profile && optional($employer->profile)->industry_type_id && optional($employer->profile)->industry_type_id == $industry->id) selected @endif value="{{$industry->id}}">{{$industry->value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <input name="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{optional($employer->profile)->address}}" required>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{optional($employer->profile)->city}}" required>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-4">
                                                <label class="form-label">State <span class="text-danger">*</span></label>
                                                <input name="state" type="text" class="form-control @error('state') is-invalid @enderror" value="{{optional($employer->profile)->state}}" required>
                                                @error('state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{optional($employer->profile)->country}}" required>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Zip <span class="text-danger">*</span></label>
                                                <input type="number" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{optional($employer->profile)->zip}}" required>
                                                @error('zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> -->
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <input name="address" maxlength="100" type="text" class="form-control @error('address') is-invalid @enderror" value="{{optional($employer->profile)->address}}" required>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                                <!-- <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{optional($employer->profile)->country}}" required> -->
                                                <select class="form-control country-list" name="country" id="countries">
                                                    @foreach($countries as $country)
                                                    <option {{$country->id == optional($employer->profile)->country ? 'selected':''}} value="{{$country->id}}">{{$country->name}}</option>
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
                                                <!-- <input name="state" type="text" class="form-control @error('state') is-invalid @enderror" value="{{optional($employer->profile)->state}}" required> -->
                                                <select class="form-control state-list" name="state" id="states">
                                                    @foreach($states as $state)
                                                    <option {{$state->id == optional($employer->profile)->state ? 'selected':''}} value="{{$state->id}}">{{$state->name}}</option>
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
                                                <!-- <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{optional($employer->profile)->city}}" required> -->
                                                <select class="form-control city-list" name="city" id="cities">
                                                    @foreach($cities as $city)
                                                    <option {{$city->id == optional($employer->profile)->city ? 'selected':''}} value="{{$city->id}}">{{$city->city}}</option>
                                                    @endforeach
                                                </select>
                                                @error('city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="form-label">Zip <span class="text-danger">*</span></label>
                                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{optional($employer->profile)->zip}}" required>
                                                @error('zip')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row"> 
                                            <div class="form-group col-md-12">
                                                <label class="form-label">Description</label>
                                                <textarea class="form-control" name="description">@if($employer->profile && optional($employer->profile)->description) {{optional($employer->profile)->description}} @endif</textarea>
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
