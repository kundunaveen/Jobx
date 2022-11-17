@extends('employee.profile.partials.layout')
@section('title')
Job Search
@endsection
@section('content')

<section class="banner-section job-listing-banner inner-banner main-banner-section">
   <div class="container">
      <div class="row">
         <div class="banner-section-wrapper">
            <div class="banner-form">
               @include('front-end.includes.job_filter_form')
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
                        <div class="col-md-2">
                           <select onchange="setSortValue()" id="sortdropdown" class="form-control" name="sort_by">
                              <option value="">Sort By</option>
                              <option value="newest" @if(request()->get('sort_by') == 'newest') selected @endif>Newest</option>
                              <option value="highest_salary" @if(request()->get('sort_by') == 'highest_salary') selected @endif>Highest Salary</option>
                              <option value="lowest_experience" @if(request()->get('sort_by') == 'lowest_experience') selected @endif>Lowest Experience</option>
                           </select>
                        </div>
                     </div>
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
                                    <h5 class="">{{ Str::limit($job->job_role, 25)}}</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">{{$job->job_type == 'part_time'? 'Part Time':($job->job_type == 'full_time'?'Full Time':'Contract Based')}}</li>
                                       <!-- <li class="list-group-item">Part Time</li> -->
                                    </ul>
                                    <h6 class="d-flex align-items-center" style="font-size: 13px;margin-bottom: 14px;"><i class="icon-location me-2"></i>{{$job->citydetail->city.', '.$job->countrydetail->name}}</h6>
                                    <p class="job_description{{$job->id}}" style="font-size: 13px;padding: 0 0 30px;line-height: 22px;margin-bottom: 0;">@if(strlen($job->description)>60) {{substr($job->description ,0, 60).'...'}} <a class="read_more{{$job->id}}" onclick="readDescription('{{$job->id}}', '{{$job->description}}')" href="javascript:void(0)">Read more</a>@else {{$job->description}} @endif</p>
                                    <x-review.company :company-id="optional($job->loadMissing('user')->user)->id" />
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <a href="{{route('employee.job.apply', $job->id)}}" class="btn btn-lg">@if( in_array($job->id, $applied_jobs)) Applied @else Apply @endif</a>
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
                        @endforeach
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
</main>
@endsection

@section('scripts')
<script>
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
</script>
@endsection