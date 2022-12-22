@extends('front-end.partials.layout')
@section('title', 'Company Details')
@section('content')
<main class="profile-main-wrapper employer-profile-page">

    <!-- Profile Section Start Here-->
    <section class="profile-section mt-5">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0  ">
                    <div class="card mb-5 mb-lg-0 h-100">
                        <div class="profile-wrapper card-body text-center">
                            <figure class="">
                                <img src="{{ $job_details->single_image }}" width="230" height="230" alt="Profile Img" class="img-fluid">
                            </figure>
                            <article>
                                <h4 class="profile-heading">{{ optional($company->profile)->company_name }}</h4>
                                 <a onclick="shareToFacebook()" href="javascript:void(0)" class="height-35 width-35  rounded-circle   flex-content-center"> <i class="fa fa-facebook-official" aria-hidden="true"></i> </a>
                                <p class="work-profile">{{ $company->full_name }}</p>

                                <div class="mail-id"><a href="mailto:{{ $company->email }}"><i class="icon-email me-2"></i>{{ $company->email }}</a>
                                </div>
                                @if ($website_link = optional($company->profile)->website_link)
                                <div class="website-link mb-5"><a href="{{ $website_link }}" target="_blank"><i class="icon-website me-2"></i>Website</a></div>
                                @endif


                                <hr class="hr" />
                                 <div class="job-btn-wrapper d-flex justify-content-between">
                                    
                                     
                                       <a  href="javascript:void(0)"   class="btn btn-lg" @if( !in_array($job_details->id, $applied_jobs))  data-bs-toggle="modal" data-bs-modal="#applyJobModal" onclick="applyJob('{{$job_details->id}}')" @endif>@if( in_array($job_details->id, $applied_jobs)) Applied @else Apply @endif</a>

                                       
                                </div>

                                @if ($social_media_link = optional($company->profile)->social_media_link)
                                <div class="social-wrapper">
                                    <h4>Connect with Social</h4>
                                    <ul class="list-group social-list">
                                        @if ($facebook = data_get($social_media_link, 'facebook', false))
                                        <li class="list-group-item border-0"><a href="{{ $facebook }}"><i class="profile-icon icon-facebook"></i></a></li>
                                        @endif
                                        @if ($linkedin = data_get($social_media_link, 'linkedin', false))
                                        <li class="list-group-item border-0"><a href="{{ $linkedin }}"><i class="profile-icon icon-linkdin"></i></a></li>
                                        @endif
                                        @if ($twitter = data_get($social_media_link, 'twitter', false))
                                        <li class="list-group-item border-0"><a href="{{ $twitter }}"><i class="profile-icon icon-twitter"></i></a></li>
                                        @endif
                                        @if ($instagram = data_get($social_media_link, 'instagram', false))
                                        <li class="list-group-item border-0"><a href="{{ $instagram }}"><i class="profile-icon icon-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                @endif
                                <x-review.company :company-id="$company->id" :writeonly=true/>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card h-100">
                        <article class="profile-summary card-body"> 
                            <h4 class="d-flex justify-content-between border-bottom"><strong>{{$job_details->job_title}} {{$job_details->job_role ? ' ('.$job_details->job_role.')':'' }}
                                </strong><span class="h6 text-secondary">Posted on : {{date('Y-m-d', strtotime($job_details->created_at))}}</span></h4>
                            @if($job_details->description)
                            <p class="profile-text border-bottom pb-4">
                                {{$job_details->description}}
                            </p>
                            @endif
                            <div class=" row ">
                                <div class="col-md-4">
                                    <h4>Weekly Hours : <span class="h6 text-secondary">{{$job_details->min_work_hours.' - '.$job_details->max_work_hours}}</span></h4>
                                </div>
                                @if($job_details->jobType)
                                <div class="col-md-4">
                                    <h4>Job Type : <span class="h6 text-secondary">{{ $job_details->jobType->value }}</span></h4>
                                </div>
                                @endif
                                @if($job_details->company_size)
                                <div class="col-md-4">
                                    <h4>Company Size : <span class="h6 text-secondary">{{$job_details->company_size == '1-10' ? 'Small Organization' : ($job_details->company_size == '11-20' ? 'Mid Level Organization' : ($job_details->company_size == '21-50' ? 'Large Organization' : 'Very Large Organization'))}}</span></h4>
                                </div>
                                @endif
                                @if($job_details->department)
                                <div class="col-md-4">
                                    <h4>Department : <span class="h6 text-secondary">{{$job_details->department}}</span></h4>
                                </div>
                                @endif
                                @php
                                    $skills = explode(',',$job_details->skills);
                                    use App\Models\JobSkill;
                                    use App\Models\MasterAttribute;
                                    $jobSkills = JobSkill::whereIn('id', $skills)->get();
                                    if($job_details->languages != null){
                                        $languages = explode(',',$job_details->languages);
                                        $joblanguages = MasterAttribute::whereIn('id', $languages)->get();
                                    }else{
                                        $languages = null;
                                    }
                                    $counter = 0;
                                    $counter1= 0;
                                @endphp
                                @if(count($skills) > 0)
                                <div class="col-md-4">
                                    <h4>Skills : <span class="h6 text-secondary">
                                        @foreach($jobSkills as $skill) <?php $counter++; ?> {{$counter < count($skills) ? $skill->skill.', ' : $skill->skill}}  @endforeach</span></h4>
                                </div>
                                @endif

                                @if($languages != null)
                                <div class="col-md-4">
                                    <h4>Languages : <span class="h6 text-secondary">
                                        @foreach($joblanguages as $language) <?php $counter1++; ?> {{$counter1 < count($languages) ? $language->value.', ' : $language->value}}  @endforeach</span></h4>
                                </div>
                                @endif
                                @if($job_details->education)
                                <div class="col-md-4">
                                    <h4>Education : <span class="h6 text-secondary">{{$job_details->Qualification->value}}</span></h4>
                                </div>
                                @endif
                                @if($job_details->min_exp)
                                <div class="col-md-4">
                                    <h4>Minimum Experience : <span class="h6 text-secondary">{{$job_details->min_exp}} Yrs</span></h4>
                                </div>
                                @endif
                                @if($job_details->salary_offer)
                                <div class="col-md-4">
                                    <h4>Salary Offer : <span class="h6 text-secondary">€ {{$job_details->salary_offer}} </span></h4>
                                </div>
                                @endif
                                @if($job_details->dl_required)
                                <div class="col-md-4">
                                    <h4>Driving License : <span class="h6 text-secondary">{{$job_details->dl_required == 'YES' ? 'Required' : 'Not Required'}} </span></h4>
                                </div>
                                @endif
                               
                                @if($job_details->min_salary && $job_details->max_salary)
                                <div class="col-md-4">
                                    <h4>Salary Offer : <span class="h6 text-secondary">{{$job_details->min_salary}} - {{$job_details->max_salary}} </span></h4>
                                </div>
                                @endif
                                @if($job_details->company_role)
                                <div class="col-md-4">
                                    <h4>Role in company : <span class="h6 text-secondary">{{$job_details->company_role}}  </span></h4>
                                </div>
                                @endif
                                
                                @if($job_details->countrydetail)
                                <div class="col-md-4">
                                    <h4>Country : <span class="h6 text-secondary">{{$job_details->countrydetail->name}}</span></h4>
                                </div>
                                @endif
                                @if($job_details->statedetail)
                                <div class="col-md-4">
                                    <h4>State : <span class="h6 text-secondary">{{$job_details->statedetail->name}}</span></h4>
                                </div>
                                @endif
                                @if($job_details->citydetail)
                                <div class="col-md-4">
                                    <h4>City : <span class="h6 text-secondary">{{$job_details->citydetail->city}}</span></h4>
                                </div>
                                @endif
                                @if($job_details->zip)
                                <div class="col-md-4">
                                    <h4>City : <span class="h6 text-secondary">{{$job_details->zip}}</span></h4>
                                </div>
                                @endif
                                @if($job_details->role_in_company)
                                <div class="col-md-4">
                                    <h4>Role in company : <span class="h6 text-secondary">{{$job_details->role_in_company}}</span></h4>
                                </div>
                                @endif
                            </div>

                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section End Here-->
    <!-- Content Section Start Here -->
    <section class=" emp-content-section section-space">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <!-- <videos -->
                                <div class="row preview-video">
                                    <div class="col-md-3">
                                        @if($job_details->video)
                                        <div class="about-wrapper profile-summary mt-3">
                                            <h2>Advertising Video </h2>
                                            <div class="mt-2">
                                                <video class="" controls style="width:100%">
                                                    <source src="{{ $job_details->video_url }}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if($job_details->company_employee_interview)
                                        <div class="about-wrapper profile-summary mt-3">
                                            <h2>Company Employee Interview</h2>
                                            <div class="mt-2">
                                                <video class="" controls>
                                                    <source src="{{ $job_details->company_employee_interview_url }}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                         @if($job_details->three_sixty)
                                        <div class="about-wrapper profile-summary mt-3">
                                            <h2>360° Tour</h2>
                                            <div class="mt-2">
                                                <video class="" controls>
                                                    <source src="{{ $job_details->three_sixty_url }}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        @if($job_details->company_video)
                                        <div class="about-wrapper profile-summary mt-3">
                                            <h2>Company Video</h2>
                                            <div class="mt-2">
                                                <video class="" controls>
                                                    <source src="{{ $job_details->company_video }}" type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            
                            
                           
                            
                            <!-- vide -->
                            <div class="row about-wrapper profile-summary mt-3 preview-images-list">
                            @if(count($job_details->getImagesInArray())>0)
                            <h2>Vacancy Images</h2>
                            @endif
                            @forelse ($job_details->getImagesInArray() as $image)

                            <div class="col-md-3 pip mt-2">
                                <img style="height:100%;width:100%;object-fit:cover" class='imageThumb' src="{{ \Illuminate\Support\Facades\Storage::disk(config('settings.file_system_service'))->url(\App\Models\Vacancy::IMAGE_PATH.'/'.$image) }}" width="100" class="">
                                
                            </div>
                            @empty

                            @endforelse
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content section End Here -->
    
    <!-- Tools Section Start Here -->
    <section class="tools-section text-start  section-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h4>Posted jobs</h4>
                    </div>
                    @if($company->vacancies()->count() > 0)
                    <div class="pt-0">
                        <div class="card-body p-5">
                            <div class="owl-carousel owl-theme">
                                @forelse ($company->loadMissing('vacancies')->vacancies as $vacancy)
                                    <div class="item">
                                        <div class="card slider_image">
                                            <div class="card-body">
                                                <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                                    <img src="{{ $vacancy->single_image }}" title="{{ $vacancy->job_title }}" class="img-fluid">
                                                </figure>
                                                <article>
                                                    <h4>
                                                        {{ \Illuminate\Support\Str::limit($vacancy->job_role, 20, '...') }}
                                                    </h4>
                                                    <h5>
                                                        {{ \Illuminate\Support\Str::limit($vacancy->job_title, 30, '...') }}
                                                        </h4>
                                                        <p>
                                                            {{ \Illuminate\Support\Str::limit($vacancy->description, 30, '...') }}
                                                        </p>
                                                </article>
                                                <div class="job-btn-wrapper d-flex justify-content-between">
                                                    <a href="{{route('employee.job.preview', $vacancy->id)}}" class="btn btn-default btn-md">view Job</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h5>No job posted yet</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @else
                    <p>No job posted yet.</p>
                @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Tools Section End Here -->
    <!-- Brands Section Start Here -->
    {{--
    <section class="brand-section slass-icon  section-space">
        <div class="container">
            <div class="card p-5">
                <div class="card-body">
                    <div class="section-heading mb-5">
                        <h4>Companies we are linked with</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="brands-carousel">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="brands-wrapper">
                                            <img src="./assets/images/google.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="brands-wrapper">
                                            <img src="assets/images/Adobe-Corporate-Logo.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="brands-wrapper">
                                            <img src="assets/images/Infosys-logo.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="brands-wrapper">
                                            <img src="assets/images/Lufthansa-Logo.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="brands-wrapper">
                                            <img src="assets/images/FedEx-logo-orange-purple.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <!-- Brands Logo Section End -->
    <!-- Feature Vacancies Section Start -->
   
    <section class="featured-emp-section featured-vacancies-section section-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-carousel featured-emp-carousel card">
                        <div class="card-body p-5">
                            <div class="owl-carousel owl-theme">

                                <div class="item">
                                    <div class="card shadow">
                                        <div class="vacancies-img">
                                            <img src="assets/images/property.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                            <a href="#!">
                                                <div class="play-btn"><img src="assets/images/play-btn.png" alt="play button" width="" height="" class="img-fluid" /></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h3>Hilversum</h3>
                                            <div class="location d-flex justify-content-between align-items-center">
                                                <span><i class="icon-location me-2"></i>Hilversum</span>
                                                <small class="text-muted">30+ days ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card shadow">
                                        <div class="vacancies-img">
                                            <img src="assets/images/property.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                            <a href="#!">
                                                <div class="play-btn"><img src="assets/images/play-btn.png" alt="play button" width="" height="" class="img-fluid" /></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h3>Hilversum</h3>
                                            <div class="location d-flex justify-content-between align-items-center">
                                                <span><i class="icon-location me-2"></i>Hilversum</span>
                                                <small class="text-muted">30+ days ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card shadow">
                                        <div class="vacancies-img">
                                            <img src="assets/images/sports.png" alt="vacancies-1.jpg" width="290" height="227" class="img-fluid" />
                                            <a href="#!">
                                                <div class="play-btn"><img src="assets/images/play-btn.png" alt="play button" width="" height="" class="img-fluid" /></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h3>Sports Person</h3>
                                            <div class="location d-flex justify-content-between align-items-center">
                                                <span><i class="icon-location me-2"></i>Amsterdam</span>
                                                <small class="text-muted">30+ days ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="card shadow">
                                        <div class="vacancies-img">
                                            <img src="assets/images/butician.png" alt="vacancies-1.jpg" width="326" height="271" class="img-fluid" />
                                            <a href="#!">
                                                <div class="play-btn"><img src="assets/images/play-btn.png" alt="play button" width="" height="" class="img-fluid" /></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h3>Beautician</h3>
                                            <div class="location d-flex justify-content-between align-items-center">
                                                <span><i class="icon-location me-2"></i>Amsterdam</span>
                                                <small class="text-muted">30+ days ago</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Vacancies section End -->
    --}}


   <div class="modal fade" id="applyJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Job Application Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('/employee/job-applied')}}" method="POST" id="job_application_form" enctype="multipart/form-data">
               @csrf
               <input type="hidden" name="job_id" id="apply_job_id">
               <div class="modal-body">
                  <div class="form-group">
                     <label>Cover Letter</label>
                     <textarea rows="10" name="cover_letter" class="form-control"></textarea>
                  </div>
                  <div class="form-group mt-4">
                     <label>Motivation Letter</label>
                     <textarea rows="10" name="motivation_letter" class="form-control"></textarea>
                  </div>
                  <div class="form-group mt-4">
                     <label>Cover Video</label>
                     <input name="cover_video" type="file" class="form-control"></input>
                  </div>
               </div>
               <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-primary">Apply</button>
               </div>
            </form>
         </div>
      </div>
   </div>

</main>
@endsection
@section('scripts')
<script>
   
   function applyJob(id){
      $('#job_application_form').attr('action', '{{url("/employee/job-applied")}}/'+id)
      $('#apply_job_id').val(id)
      $('#applyJobModal').modal('show')
   }

  function shareToFacebook()

    {  

        event.preventDefault();

        urll = 'https://www.facebook.com/sharer/sharer.php?u='+window.location.href

        window.location.href=urll      

    }
</script>
@endsection