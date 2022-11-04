@extends('employer.dashboard.partials.layout')
@section('title')
    Employer | Posted Jobs
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
        .btn-custom-posted-jobs{
         padding-left: 10px;
         text-align: center;
         padding-top:6px;
         padding-bottom:6px;
         padding-right: 10px;
         margin-top: 7px;
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
                     <div class="row mt-3">
                        <div class="col-md-12">
                           <!-- <label class="label">Search</label> -->
                           <input class="form-control" name="search" @if(isset($_GET['search'])) value="{{$_GET['search']}}" @endif type="text" placeholder="Search for job role or job title">
                        </div>
                     </div>
                    <div class="row mb-3 mt-3">
                     <div class="col-md-3 mt-2" style="padding:10px !important">
                        <!-- <label class="label">Job Type</label> -->
                        <select name="job_type" class="form-control">
                           <option  value="">Select job type</option>
                           <option @if(isset($_GET['job_type'])) {{$_GET['job_type'] == 'full_time'?'selected':''}} @endif value="full_time">Full Time</option>
                           <option @if(isset($_GET['job_type'])) {{$_GET['job_type'] == 'part_time'?'selected':''}} @endif value="part_time">Part Time</option>
                           <option @if(isset($_GET['job_type'])) {{$_GET['job_type'] == 'contract_based'?'selected':''}} @endif value="contract_based">Contract Based</option>
                        </select>
                     </div>
                     <div class="col-md-3 mt-2" style="padding:10px !important">
                        <!-- <label class="label">Experience</label> -->
                        <select name="experience" class="form-control">
                           <option value="">Select experience</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '0-3'?'selected':''}} @endif value="0-3">0-3 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '3-6'?'selected':''}} @endif value="3-6">3-6 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '6-10'?'selected':''}} @endif value="6-10">6-10 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '10-15'?'selected':''}} @endif value="10-15">10-15 years</option>
                           <option @if(isset($_GET['experience'])) {{$_GET['experience'] == '16'?'selected':''}} @endif value="16">More than 15 years</option>
                        </select>
                     </div>
                     <div class="col-md-3 mt-2" style="padding:10px !important">
                        <!-- <label class="label">Salary</label> -->
                        <select name="salary" class="form-control">
                           <option value="">Select salary</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '0-6'?'selected':''}} @endif value="0-6">0-6 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '6-12'?'selected':''}} @endif value="6-12">6-12 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '12-18'?'selected':''}} @endif value="12-18">12-18 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '18-24'?'selected':''}} @endif value="18-24">18-24 LPA</option>
                           <option @if(isset($_GET['salary'])) {{$_GET['salary'] == '25'?'selected':''}} @endif value="25">More than 24 LPA</option>
                        </select>
                     </div>
                     <div class="col-md-3" style="padding:10px !important">
                        <div class="row"> 
                           <div class="col-6"> <button type="submit" class="col-12 btn btn-custom-posted-jobs btn-primary">Search</button></div>
                           <!-- <a class="text-dark d-none redirect_to_posted_jobs" href="{{route('employer.posted.jobs')}}">Post Job</a> -->
                           <div class="col-6"><button type="" class="col-12 btn btn-primary btn-custom-posted-jobs" onclick="$('.search-form').remove();window.location.href = '{{url('employer/posted-jobs')}}'">Reset</button></div>
                        </div>
                     </div>
                    </div>
                   </form>
                     <div class="row">
                        @foreach($jobs as $job)
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    @if($job->user->profile->logo != null)
                                    <img src="{{asset('image/company_images/'.$job->user->profile->logo)}}" style="border-radius:100%;object-fit:cover" width="51" height="50" alt="">
                                    @else
                                    <img src="{{asset('image/company.png')}}" style="border-radius:100%;object-fit:cover" width="51" height="50" alt="">
                                    @endif
                                    <span class="date" style="font-size:13px">{{date('d F, Y',strtotime($job->created_at))}}</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <div class="row justify-content-between">
                                       <div class="col-auto"><h5 class="mt-1">{{$job->job_role}}</h5></div>
                                       <div class="col-auto text-primary">
                                          <a href="{{route('employer.job.candidates', $job->id)}}">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="26px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                          </svg>
                                          <span style="margin-left:-5px">+</span>
                                          </a>
                                       </div>
                                    </div>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">@if($job->jobType != null){{$job->jobType->value}} @endif</li>
                                       <!-- <li class="list-group-item">Part Time</li> -->
                                    </ul>
                                    <h6 class="d-flex align-items-center" style="font-size: 13px;margin-bottom: 14px;"><i
                                          class="icon-location me-2"></i>{{$job->citydetail->city.', '.$job->countrydetail->name}}</h6>
                                    <div class="row">
                                       <div class="col-auto"><h6 class="d-flex align-items-center" style="font-size:13px;">Total Applicants :</h6></div>
                                       <div class="col-auto"><h6 class="d-flex align-items-center" style="font-size:13px;"><a href="{{url('/employer/job-applicants', base64_encode($job->id))}}">{{count($job->applicants)}}</a></h6></div>
                                    </div>
                                    <p class="job_description{{$job->id}}" style="font-size: 13px;padding: 0 0 30px;line-height: 22px;margin-bottom: 0;">@if(strlen($job->description)>60) {{substr($job->description ,0, 60).'...'}} <a class="read_more{{$job->id}}" onclick="readDescription('{{$job->id}}', '{{$job->description}}')" href="javascript:void(0)">Read more</a>@else {{$job->description}} @endif</p>
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
                     <div class="mb-5">{{ $jobs->links() }}</div>
                  </section>
            </div>
        </div>
    
    </section>
@endsection

