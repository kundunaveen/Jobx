@extends('employee.profile.partials.layout')
@section('title')
Job Search
@endsection
@section('content')
<meta property="og:url" content="" />
<meta property="og:title" content="Jobax | Visual Vacancies" />
<meta property="og:type" content="Visual Vacancies" />
<meta property="og:description" content="Visual Vacancies" />
<meta property="og:image" content="{{asset('assets/images/jobax-logo.png')}}" />
<section class="banner-section job-listing-banner inner-banner main-banner-section">
   <div class="container">
      @include('layouts.messages.success_jquery_toast')
      <div class="row">
         <div class="banner-section-wrapper">
            <div class="banner-form">
               <form action="{{route('search.job')}}" method="GET">
                  <div class="row">
                     <div class="col-lg-4 mb-4 mb-lg-0">
                        <label>What kind of work?</label>
                        <div class="input-group">
                           <span class="input-group-text">
                              <i class="form-icon icon-keywords"></i>
                           </span>
                           <input type="text" name="search_keyword" value="{{ request()->get('search_keyword') }}" class="form-control" placeholder="Keywords" />
                        </div>
                     </div>
                     <div class="col-lg-4 mb-4 mb-lg-0">
                        <label>True?</label>
                        <div class="input-group">
                           <span class="input-group-text">
                              <i class="form-icon icon-location"></i>
                           </span>
                           <input type="text" name="search_location" value="{{ request()->get('search_location') }}" class="form-control" placeholder="Location" />
                           {{--
                    <select class="form-select">
                                        <option value="1">30KM</option>
                                        <option value="1">40KM</option>
                                        <option value="1">50KM</option>
                                        <option value="1">60KM</option>
                                        <option value="1">70KM</option>
                                    </select>
                                    --}}
                        </div>
                     </div>
                     <div class="col-lg-4">
                        {{--
            <div class="form-check float-md-end">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Send me Newsletter
                </label>
            </div>
            --}}
                        <button class="btn btn-lg search-btn" type="submit">Search Vacancies</button>
                        @if(request()->except('credit_card'))
                        <div class="search-advance">
                           <ul class="col-md-auto">
                              <li class="text-end"><a href="{{ route('search.job') }}"><u>Clear Filter</u></a></li>
                           </ul>
                        </div>
                        @endif
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      {{--
      <div class="d-flex align-items-center flex-wrap">
         <ul class="form-filter-list list-group d-flex flex-md-row me-md-3">
            <li class="list-group-item border-0"><a href="javascript:void(0)">UX Designer</a></li>
            <li class="list-group-item"><a href="javascript:void(0)">UI Designer</a></li>
            <li class="list-group-item border-0"><a href="javascript:void(0)">Front End Developer</a></li>
            <li class="list-group-item border-0">
               <div class="form-btn-wrapper">
                  <a href="javascript:void(0)" class="text-underline">Clear Filter</a>
               </div>
            </li>
         </ul>
      </div>
      --}}
      {{--
      @if(request()->except('credit_card'))
      <div class="d-flex align-items-center flex-wrap">
         <ul class="form-filter-list list-group d-flex flex-md-row me-md-3">
            <li class="list-group-item border-0">
               <div class="form-btn-wrapper">
                  <a href="{{ route('search.job') }}" class="text-underline">Clear Filter</a>
   </div>
   </li>
   </ul>
   </div>
   @endif
   --}}
   </div>
</section>
<!-- Main Banner End Here -->
<!--========= Main Content End Here =========-->
<main class="profile-main-wrapper">
   <!-- Section Start Here-->
   <form id="filter-form" method="GET" action="{{ route('search.job') }}">
      <section class="job-listing-wrapper">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-md-4">
                  {{-- @include('employee.profile.job_search.filter') --}}
                  @include('employee.profile.job_search.filter1')
               </div>
               <div class="col-lg-10 col-md-8">
                  <section class="job-listing-section">
                     <div class="row justify-content-between">
                        <h4 class="col-auto">Recommended Jobs ({{ $jobs->total() }})</h4>
                        <div class="col-md-5 align-right">
                           @auth
                           <div class="check_job_btn">
                              <input type="checkbox" name="show_favorite_job" value="1" class="form-check-input" id="show_favorite_job" @if(request()->get('show_favorite_job') == "1") checked @endif onchange="setSortValue()">
                              <label class="form-check-label" for="show_favorite_job">Show favorite jobs</label>
                           </div>
                           @endauth
                           <div class="sort_filter_job">
                              <select onchange="setSortValue()" id="sortdropdown" class="form-control" name="sort_by">
                                 <option value="">Sort By</option>
                                 <option value="newest" @if(request()->get('sort_by') == 'newest') selected @endif>Newest</option>
                                 <option value="highest_salary" @if(request()->get('sort_by') == 'highest_salary') selected @endif>Highest Salary</option>
                                 <option value="lowest_experience" @if(request()->get('sort_by') == 'lowest_experience') selected @endif>Lowest Experience</option>
                                 <option value="rating" @if(request()->get('sort_by') == 'rating') selected @endif>Rating</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        @forelse($jobs as $job)
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="{{ $job->single_image }}" class="round_image" title="{{ $job->job_title }}">
                                    <div class="fav-fb-div">                                       
                                       <a onclick="shareToFacebook()" href="javascript:void(0)" class="height-35 width-35  rounded-circle   flex-content-center"> <i class="fa fa-facebook-official" aria-hidden="true"></i> </a>
                                       @auth
                                       <x-favorite.job :vacancy-id="$job->id" :user-id="auth()->id()" />
                                       @endauth
                                    </div>
                                       <span class="date job-listing-alignment">{{date('d F, Y',strtotime($job->created_at))}}</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">
                                       {{ Str::limit($job->job_role, 25)}}
                                       &nbsp;&nbsp;
                                       
                                    </h5>
                                   <p>{{ optional($job->loadMissing('profile')->profile)->company_name }}</p>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">
                                          {{ $job->job_type_text }}
                                       </li>
                                    </ul>
                                    <h6 class="d-flex align-items-center" style="font-size: 13px;margin-bottom: 14px;">
                                       <i class="icon-location me-2"></i>{{ optional($job->citydetail)->city.', '.optional($job->countrydetail)->name }}
                                    </h6>
                                    <p class="job_description_content job_description{{$job->id}}" style="font-size: 13px;padding: 0 0 15px;line-height: 22px;margin-bottom: 0;">
                                    @if( strlen($job->description) > 80) 
                                       {{ substr($job->description ,0, 80).'...'}} 
                                       <a class="read_more{{$job->id}}" onclick="readDescription('{{$job->id}}', '{{$job->description}}')" href="javascript:void(0)">Read more</a>
                                    @else 
                                       {{$job->description}} 
                                    @endif</p>
                                    <div class="star_rating">
                                       <x-review.company :company-id="optional($job->loadMissing('user')->user)->id" />
                                       <a href="{{ route('company-show', optional($job->loadMissing('user')->user)->id) }}" target="_blank" class="company_profile">
                                          Company Profile

                                       </a>
                                    </div>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <a  href="javascript:void(0)" onclick="applyJob('{{$job->id}}')" data-bs-toggle="modal" data-bs-modal="#applyJobModal" class="btn btn-lg">@if( in_array($job->id, $applied_jobs)) Applied @else Apply @endif</a>
                                       <a href="{{route('employee.job.preview', $job->id)}}" class="btn btn-default btn-md">Preview Job</a>
                                       {{--
                                    <!-- <a href="{{route('employer.edit.post.job', $job->id)}}" style="margin-left:-5px;margin-right:10px" class="btn col-6 btn-default ">Apply</a>
                                       <button onclick="deleteVacancy('{{$job->id}}')" type="button" class="btn btn-danger col-6 btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Preview Job</button> -->
                                       --}}
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        @empty
                        <div class="col-xl-12 col-lg-12">
                           <p class="text-center">Sorry no job found!</p>
                        </div>
                        @endforelse
                     </div>
                     {{ $jobs->links() }}
                  </section>
               </div>
            </div>
      </section>
   </form>
   <!-- Section Start Here-->
   <!-- Model Popup Start Here-->

   <!-- Modal Popup -->
   @include('front-end.includes.job_listing_modal')
   <!-- model Start Here-->

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

   function setSortValue() {
      $('#sortby').val($('#sortdropdown').val())
      $('#filter-form').submit()
   }
   window.onload = function() {
      slideOne();
      slideTwo();
      slideOneExp();
      slideTwoExp();
   }

   let sliderOne = document.getElementById("slider-1");
   let sliderTwo = document.getElementById("slider-2");
   let displayValOne = document.getElementById("range1");
   let displayValTwo = document.getElementById("range2");
   let minGap = 0;
   let sliderTrack = document.querySelector(".slider-track");
   let sliderMaxValue = document.getElementById("slider-1").max;

   function slideOne() {
      if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
         sliderOne.value = parseInt(sliderTwo.value) - minGap;
      }
      displayValOne.textContent = sliderOne.value;
      fillColor();
   }

   function slideTwo() {
      if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
         sliderTwo.value = parseInt(sliderOne.value) + minGap;
      }
      displayValTwo.textContent = sliderTwo.value;
      fillColor();
   }

   function fillColor() {
      percent1 = (sliderOne.value / sliderMaxValue) * 100;
      percent2 = (sliderTwo.value / sliderMaxValue) * 100;
      sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
   }


   let sliderOneExp = document.getElementById("slider-exp1");
   let sliderTwoExp = document.getElementById("slider-exp2");
   let displayValOneExp = document.getElementById("range-exp1");
   let displayValTwoExp = document.getElementById("range-exp2");
   let minGapExp = 0;
   let sliderTrackExp = document.querySelector(".slider-track-exp");
   let sliderMaxValueExp = document.getElementById("slider-exp1").max;

   function slideOneExp() {
      if (parseInt(sliderTwoExp.value) - parseInt(sliderOneExp.value) <= minGapExp) {
         sliderOneExp.value = parseInt(sliderTwoExp.value) - minGapExp;
      }
      displayValOneExp.textContent = sliderOneExp.value;
      fillColorExp();
   }

   function slideTwoExp() {
      if (parseInt(sliderTwoExp.value) - parseInt(sliderOneExp.value) <= minGapExp) {
         sliderTwoExp.value = parseInt(sliderOneExp.value) + minGapExp;
      }
      displayValTwoExp.textContent = sliderTwoExp.value;
      fillColorExp();
   }

   function fillColorExp() {
      percentExp1 = (sliderOneExp.value / sliderMaxValueExp) * 100;
      percentExp2 = (sliderTwoExp.value / sliderMaxValueExp) * 100;
      sliderTrackExp.style.background = `linear-gradient(to right, #dadae5 ${percentExp1}% , #3264fe ${percentExp1}% , #3264fe ${percentExp2}%, #dadae5 ${percentExp2}%)`;
   }

   /* read more and less */

   function readDescription(id, description) {
      $('.job_description' + id).html(description + ` <a onclick="readLess('${id}','${description}')" href="javascript:void(0)">Read less</a>`)
   }

   function readLess(id, description) {
      $('.job_description' + id).html(description.substr(0, 60) + `... <a onclick="readDescription('${id}','${description}')" href="javascript:void(0)">Read more</a>`)
   }

   function shareToFacebook()

    {  

        event.preventDefault();

        urll = 'https://www.facebook.com/sharer/sharer.php?u='+window.location.href

        window.location.href=urll      

    }
</script>
@endsection