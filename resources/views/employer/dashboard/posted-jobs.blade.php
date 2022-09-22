@extends('employer.dashboard.partials.layout')
@section('title')
    Employer | Dashboard
@endsection
@section('content')
    <style>
        .list-group-item {
            font-size: 14px;
            background-color: #EEFDE1;
            border-radius: 12px;
            margin-right: 15px;
            padding: 5px 15px;
            border: none;
            color: #376311;
        }
    </style>
    <section class="dashboard-section inner-login-shape">
       
        <div class="dashboard-wrapper">
            <div class="container-fluid">
            <section class="job-listing-section ">
                    <div class="row justify-content-between">
                     <h4 class="col-auto">Posted Jobs</h4>
                     <span class="col-auto"><u><a class="text-dark" href="{{route('employer.post.job')}}">Post Job</a></u></span>
                    </div>
                    
                    <form method="GET" class="search-form">
                    <div class="row mb-3 mt-3">
                     <div class="col-md-3" style="padding:10px !important">
                        <label class="label">Job Type</label>
                        <select name="job_type" class="form-control">
                           <option  value="empty">select job type</option>
                           <option @if(isset($_GET['job_type'])) {{$_GET['job_type'] == 'full_time'?'selected':''}} @endif value="full_time">Full Time</option>
                           <option @if(isset($_GET['job_type'])) {{$_GET['job_type'] == 'part_time'?'selected':''}} @endif value="part_time">Part Time</option>
                           <option @if(isset($_GET['job_type'])) {{$_GET['job_type'] == 'contract_based'?'selected':''}} @endif value="contract_based">Contract Based</option>
                        </select>
                     </div>
                     <div class="col-md-3" style="padding:10px !important">
                        <label class="label">Experience</label>
                        <select name="experience" class="form-control">
                           <option value="empty">select experience</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '0-3'?'selected':''}} @endif value="0-3">0-3 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '3-6'?'selected':''}} @endif value="3-6">3-6 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '6-10'?'selected':''}} @endif value="6-10">6-10 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '10-15'?'selected':''}} @endif value="10-15">10-15 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '16'?'selected':''}} @endif value="16">More than 15 years</option>
                        </select>
                     </div>
                     <div class="col-md-3" style="padding:10px !important">
                        <label class="label">Salary</label>
                        <select name="salary" class="form-control">
                           <option value="empty">select salary</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '0-6'?'selected':''}} @endif value="0-6">0-6 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '6-12'?'selected':''}} @endif value="6-12">6-12 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '12-18'?'selected':''}} @endif value="12-18">12-18 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '18-24'?'selected':''}} @endif value="18-24">18-24 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '25'?'selected':''}} @endif value="25">More than 24 LPA</option>
                        </select>
                     </div>
                     <div class="col-md-3" style="padding:10px !important">
                        <button type="submit" class="btn btn-primary mt-3" style="padding-left:25px; padding-right:25px">Search</button>
                        <a class="text-dark d-none redirect_to_posted_jobs" href="{{route('employer.dashboard.posted.jobs')}}">Post Job</a>
                        <button type="" class="btn btn-primary mt-3" onclick="$('.search-form').remove();window.location.href = '{{url('employer-dashboard/posted-jobs')}}'" style="padding-left:25px; padding-right:25px">Reset</button>
                     </div>
                    </div>
                   </form>
                     <div class="row">
                        @foreach($jobs as $job)
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="{{asset('assets/images/apple.png')}}" width="51" height="50" alt="">
                                    <span class="date" style="font-size:13px">{{date('d F, Y',strtotime($job->created_at))}}</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">{{$job->job_role}}</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">{{$job->job_type == 'part_time'? 'Part Time':($job->job_type == 'full_time'?'Full Time':'Contract Based')}}</li>
                                       <!-- <li class="list-group-item">Part Time</li> -->
                                    </ul>
                                    <h6 class="d-flex align-items-center" style="font-size: 13px;margin-bottom: 14px;"><i
                                          class="icon-location me-2"></i>{{$job->citydetail->city.', '.$job->countrydetail->name}}</h6>
                                    <p class="" style="font-size: 13px;padding: 0 0 30px;line-height: 22px;margin-bottom: 0;">{{$job->description}}</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <a href="{{route('employer.edit.post.job', $job->id)}}" style="margin-left:-5px;margin-right:10px" class="btn col-6 btn-default ">Edit</a>
                                       <button onclick="deleteVacancy('{{$job->id}}')" type="button" class="btn btn-danger col-6 btn-sm" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Delete</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                       @endforeach
                     </div>
                  </section>
            </div>
        </div>
    
    </section>
@endsection
