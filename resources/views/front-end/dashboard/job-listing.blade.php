@extends('front-end.partials.layout')
@section('title')
Jobs
@endsection
@section('content')
<style>
   .range-price .wrapper{
      position: relative;
      width: 100%;
      background-color: transparent;
      padding: 0;
      border-radius: 10px;
   }
   .range-price input[type="range"]{
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 100%;
      outline: none;
      position: absolute;
      margin: auto;
      top: 0;
      bottom: 0;
      background-color: transparent;
      pointer-events: none;
      left: 0;
   }
   .range-price .slider-track {
      width: 100%;
      height: 5px;
      position: absolute;
      margin: auto;
      top: 0;
      bottom: 0;
      border-radius: 5px;
      left: 0;
   }
   .range-price input[type="range"]::-webkit-slider-runnable-track{
      -webkit-appearance: none;
      height: 5px;
   }
   .range-price input[type="range"]::-moz-range-track{
      -moz-appearance: none;
      height: 5px;
   }
   .range-price input[type="range"]::-ms-track{
      appearance: none;
      height: 5px;
   }
   .range-price input[type="range"]::-webkit-slider-thumb{
      -webkit-appearance: none;
      height: 25px;
      width: 25px;
      background-color: #fff;
      cursor: pointer;
      margin-top: -9px;
      pointer-events: auto;
      border-radius: 50%;
      box-shadow: 1px 1px 4px 2px #ddd;
   }
   .range-price input[type="range"]::-moz-range-thumb{
      -webkit-appearance: none;
      height: 25px;
      width: 25px;
      cursor: pointer;
      border-radius: 50%;
      background-color: #fff;
      pointer-events: auto;
      box-shadow: 1px 1px 4px 2px #ddd;
   }
   .range-price input[type="range"]::-ms-thumb{
      appearance: none;
      height: 25px;
      width: 25px;
      cursor: pointer;
      border-radius: 50%;
      background-color: #fff;
      pointer-events: auto;
      box-shadow: 1px 1px 4px 2px #ddd;
   }
   .range-price input[type="range"]:active::-webkit-slider-thumb{
      background-color: #ffffff;
      border: 3px solid #3264fe;
   }
   .range-price .values {
      background-color: transparent;
      width: 100%;
      position: relative;
      margin: auto;
      padding: 0;
      border-radius: 5px;
      text-align: left;
      font-weight: 500;
      font-size: 15px;
      color: #000;
      padding-bottom: 60px;
   }
   .range-price .range_span:before {
      position: relative;
      content: '$';
      color: #000;
      left: 0;
      font-size: 15px;
      font-weight: bold;
      padding-right: 4px;
   }
   .range-price .range_span {
      padding-left: 4px;
   }
   /*range exp*/
   .range-price-exp .wrapper{
      position: relative;
      width: 100%;
      background-color: transparent;
      padding: 0;
      border-radius: 10px;
   }
   .range-price-exp input[type="range"]{
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      width: 100%;
      outline: none;
      position: absolute;
      margin: auto;
      top: 0;
      bottom: 0;
      background-color: transparent;
      pointer-events: none;
      left: 0;
   }
   .range-price-exp .slider-track-exp {
      width: 100%;
      height: 5px;
      position: absolute;
      margin: auto;
      top: 0;
      bottom: 0;
      border-radius: 5px;
      left: 0;
   }
   .range-price-exp input[type="range"]::-webkit-slider-runnable-track{
      -webkit-appearance: none;
      height: 5px;
   }
   .range-price-exp input[type="range"]::-moz-range-track{
      -moz-appearance: none;
      height: 5px;
   }
   .range-price-exp input[type="range"]::-ms-track{
      appearance: none;
      height: 5px;
   }
   .range-price-exp input[type="range"]::-webkit-slider-thumb{
      -webkit-appearance: none;
      height: 25px;
      width: 25px;
      background-color: #fff;
      cursor: pointer;
      margin-top: -9px;
      pointer-events: auto;
      border-radius: 50%;
      box-shadow: 1px 1px 4px 2px #ddd;
   }
   .range-price-exp input[type="range"]::-moz-range-thumb{
      -webkit-appearance: none;
      height: 25px;
      width: 25px;
      cursor: pointer;
      border-radius: 50%;
      background-color: #fff;
      pointer-events: auto;
      box-shadow: 1px 1px 4px 2px #ddd;
   }
   .range-price-exp input[type="range"]::-ms-thumb{
      appearance: none;
      height: 25px;
      width: 25px;
      cursor: pointer;
      border-radius: 50%;
      background-color: #fff;
      pointer-events: auto;
      box-shadow: 1px 1px 4px 2px #ddd;
   }
   .range-price-exp input[type="range"]:active::-webkit-slider-thumb{
      background-color: #ffffff;
      border: 3px solid #3264fe;
   }
   .range-price-exp .values {
      background-color: transparent;
      width: 100%;
      position: relative;
      margin: auto;
      padding: 0;
      border-radius: 5px;
      text-align: left;
      font-weight: 500;
      font-size: 15px;
      color: #000;
      padding-bottom: 60px;
   }
   .range-price-exp .range_span:before {
      position: relative;
      color: #000;
      left: 0;
      font-size: 15px;
      font-weight: bold;
      padding-right: 4px;
   }
   .range-price-exp .range_span {
      padding-left: 4px;
   }
</style>
<section class="banner-section job-listing-banner inner-banner main-banner-section">
      <div class="container">
         <div class="row">
            <div class="banner-section-wrapper">
               <div class="banner-form">
                  <form action="" method="POST">
                     <div class="row">
                        <div class="col-lg-4 mb-4 mb-lg-0">
                           <label>What kind of work?</label>
                           <div class="input-group">
                              <span class="input-group-text">
                                 <i class="form-icon icon-keywords"></i>
                              </span>
                              <input type="text" class="form-control" placeholder="Keywords" />
                           </div>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0">
                           <label>True?</label>
                           <div class="input-group">
                              <span class="input-group-text">
                                 <i class="form-icon icon-location"></i>
                              </span>
                              <input type="text" class="form-control" placeholder="Location" />
                              <select class="form-select">
                                 <option value="1">30KM</option>
                                 <option value="1">40KM</option>
                                 <option value="1">50KM</option>
                                 <option value="1">60KM</option>
                                 <option value="1">70KM</option>
                              </select>
                           </div>
                        </div>
                        <div class=" col-lg-4">
                           <button class="btn btn-lg search-btn" type="button">Search
                              Vacancies</button>
                           <div class="search-advance">
                              <ul class="col-md-auto">
                                 <li class="text-end"><a href="javascript:void(0)">Advance Search </a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
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
      </div>
   </section>
   <!-- Main Banner End Here -->
   <!--========= Main Content End Here =========-->
   <style>
    .job-listing-wrapper .job-listing-aside .accordion-item .accordion-button {
        color: #04050A;
        background-color: #f4f4f4;
        box-shadow: none;
        padding: 15px 0;
        font-size: 18px;
        font-family: "cooper_hewittsemibold";
        margin-bottom: 50px;
    }
    .job-listing-wrapper .job-listing-aside .accordion-item {
        border: none;
        background-color: #f4f4f4;
    }
   </style>
   <main class="profile-main-wrapper">
      <!-- Section Start Here-->
      <section class="job-listing-wrapper">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-md-4">
                  <aside class="job-listing-aside">
                  <div class="aside-filter">
                     <form id="filter-form" method="GET" action=""> 
                     <div class="accordion" id="accordionPanelsStayOpenExample">

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                Job Type
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body p-0">
                            @foreach($job_types as $job_type)
                           <ul class="list-group">
                              <li class="list-group-item">
                                 <input type="checkbox" onclick="filterJobs()" class="form-check-input" id="exampleCheck1" @if(isset($_GET['job_type']) && in_array(strtolower($job_type->id), $_GET['job_type'])) checked @endif name="job_type[]" value="{{ $job_type->id}}">
                                 <label class="form-check-label" for="exampleCheck1">{{ $job_type->value }}</label>
                              </li>
                           </ul>
                           @endforeach
                            </div>
                        </div>
                        </div>

                        <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Industries
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body p-0">
                            @foreach($industry as $indus)
                              <ul class="list-group">
                                 <li class="list-group-item">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" @if(isset($_GET['industry']) && in_array($indus->id, $_GET['industry'])) checked @endif name="industry[]" value="{{$indus->id}}">
                                    <label class="form-check-label" title="{{$indus->value}}" for="exampleCheck1">{{Str::limit($indus->value, 15)}}</label>
                                 </li>
                              </ul>
                           @endforeach 
                            </div>
                        </div>
                        </div>

                        </div>                       
                        <h4 class="border-bottom">Details</h4>
                        <div class="aside-filter">
                           <h5>Job Type</h5>
                           @foreach($job_types as $job_type)
                           <ul class="list-group">
                              <li class="list-group-item">
                                 <input type="checkbox" onclick="filterJobs()" class="form-check-input" id="exampleCheck1" @if(isset($_GET['job_type']) && in_array(strtolower($job_type->id), $_GET['job_type'])) checked @endif name="job_type[]" value="{{ $job_type->id}}">
                                 <label class="form-check-label" for="exampleCheck1">{{ $job_type->value }}</label>
                              </li>
                           </ul>
                           @endforeach
                        </div>
                        <div class="aside-filter">
                           <h5>Industries</h5>
                           @foreach($industry as $indus)
                              <ul class="list-group">
                                 <li class="list-group-item">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" @if(isset($_GET['industry']) && in_array($indus->id, $_GET['industry'])) checked @endif name="industry[]" value="{{$indus->id}}">
                                    <label class="form-check-label" title="{{$indus->value}}" for="exampleCheck1">{{Str::limit($indus->value, 15)}}</label>
                                 </li>
                              </ul>
                           @endforeach                                                       
                        </div>
                        <div class="aside-filter">
                           <h5>Skills</h5>
                           <ul class="list-group">
                              @foreach($skills as $skill)
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck6" @if(isset($_GET['skill']) && in_array($skill->id, $_GET['skill'])) checked @endif  name="skill[]" value="{{$skill->id}}">
                                 <label class="form-check-label" for="exampleCheck6">{{$skill->skill}}</label>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                        <div class="aside-filter">
                           <h5>Employment Type</h5>
                           <ul class="list-group">
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck6" name="emp_type" value="full_day">
                                 <label class="form-check-label" for="exampleCheck6">Full Day</label>
                              </li>
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck7" name="emp_type" value="shift_work">
                                 <label class="form-check-label" for="exampleCheck7">Shift Work</label>
                              </li>
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck8" name="emp_type" value="distant_work">
                                 <label class="form-check-label" for="exampleCheck8">Distant Work</label>
                              </li>
                           </ul>
                        </div>
                        <div class="aside-filter">
                           <h5>Professional Level</h5>
                           <ul class="list-group">
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck9" name="professional_level[]" value="trainee">
                                 <label class="form-check-label" for="exampleCheck9">Trainee</label>
                              </li>
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck10"  name="professional_level[]" value="senior">
                                 <label class="form-check-label" for="exampleCheck10">Senior</label>
                              </li>
                              <li class="list-group-item">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck11" name="professional_level[]" value="director">
                                 <label class="form-check-label" for="exampleCheck11">Director</label>
                              </li>
                           </ul>
                        </div>
                        <div class="aside-filter range-price">
                           <h5>Salary ($)</h5>
                           <div class="wrapper">
                              <div class="values">
                                 <span id="range1" class="range_span">
                                    0 
                                 </span>
                                 <span> — </span>
                                 <span id="range2" class="range_span">
                                    99
                                 </span>
                              </div>
                              <div class="container">
                                 <div class="slider-track"></div>
                                 <input type="range" min="0" max="99" value="0" id="slider-1" name="min_salary" oninput="slideOne()">
                                 <input type="range" min="0" max="99" value="99" id="slider-2" name="max_salary" oninput="slideTwo()">
                              </div>
                           </div>
                        </div>
                        <div class="aside-filter range-price-exp">
                           <h5>Experience (Yrs)</h5>
                           <div class="wrapper">
                              <div class="values">
                                 <span id="range-exp1" class="range_span-exp">
                                    0 
                                 </span>
                                 <span> — </span>
                                 <span id="range-exp2" class="range_span-exp">
                                    30
                                 </span>
                              </div>
                              <div class="container">
                                 <div class="slider-track-exp"></div>
                                 <input type="range" min="0" max="30" value="0" id="slider-exp1" name="min_exp" oninput="slideOneExp()">
                                 <input type="range" min="0" max="30" value="30" id="slider-exp2" name="max_exp" oninput="slideTwoExp()">
                              </div>
                           </div>
                        </div>
                        <input type="hidden" id="sortby" name="sortby">
                        <button type="submit" class="btn btn-primary">Filter</button>
                     </form>
                  </div>
                  </aside>
               </div>
               <div class="col-lg-10 col-md-8">
                  <section class="job-listing-section">
                     <div class="row justify-content-between">
                        <h4 class="col-auto">Recomended Jobs ({{count($jobs)}})</h4>
                        <div class="col-md-2"> 
                           <select onchange="setSortValue()" id="sortdropdown" class="form-control" name="sort_by">
                              <option >Sort By</option>
                              <option value="newest">Newest</option>
                              <option value="highest_salary">Highest Salary</option>
                              <option value="lowest_experience">Lowest Experience</option>
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
                                    <h6 class="d-flex align-items-center" style="font-size: 13px;margin-bottom: 14px;"><i
                                          class="icon-location me-2"></i>{{$job->citydetail->city.', '.$job->countrydetail->name}}</h6>
                                    <p class="job_description{{$job->id}}" style="font-size: 13px;padding: 0 0 30px;line-height: 22px;margin-bottom: 0;">@if(strlen($job->description)>60) {{substr($job->description ,0, 60).'...'}} <a class="read_more{{$job->id}}" onclick="readDescription('{{$job->id}}', '{{$job->description}}')" href="javascript:void(0)">Read more</a>@else {{$job->description}} @endif</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <a href="{{route('employee.job.apply', $job->id)}}" class="btn btn-lg"> Apply </a>
                                       <a href="{{route('employee.job.preview', $job->id)}}" class="btn btn-default btn-md">Preview Job</a>
                                       <!-- <a href="{{route('employer.edit.post.job', $job->id)}}" style="margin-left:-5px;margin-right:10px" class="btn col-6 btn-default ">Apply</a>
                                       <button onclick="deleteVacancy('{{$job->id}}')" type="button" class="btn btn-danger col-6 btn-sm" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button> -->
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
      <!-- Section Start Here-->
         <!-- Model Popup Start Here-->

      <!-- Modal Popup -->
      <div class="modal fade job-listing-model" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
               <div class="modal-header d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                     <figure class="mb-0 me-3 modal-job-profile">
                        <img src="../jobax/assets/images/modal-apple-img.png" width="136" height="136" alt=""
                           class="img-fluid" />
                     </figure>
                     <article class="modal-job-article">
                        <h4>Front End Developer</h4>
                        <span class="d-block">Apple Inc. Amsterdam</span>
                        <small><i class="icon-location me-2"></i>Amsterdam</small>
                     </article>
                  </div>

                  <div class="modal-btn-wrapper">
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     <span>20 May, 2022</span>
                     <button class="btn btn-lg">Apply</button>
                  </div>
               </div>
               <div class="modal-body">
                  <ul class="skills-list list-group">
                     <li class="list-group-item">Full Time</li>
                     <li class="list-group-item">Part Time</li>
                  </ul>
                  <div class="modal-text-wrapper">
                     <h5>Minimum Qualification</h5>
                     <ul>
                        <li>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                              been the industry's standard dummy text ever since the 1500s.</p>
                        </li>
                        <li>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </li>
                        <li>
                           <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </li>
                     </ul>
                  </div>
                  <div class="modal-text-wrapper">
                     <h5>Preferred Qualification</h5>
                     <ul>
                        <li>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                              been the industry's standard dummy text ever since the 1500s.</p>
                        </li>
                        <li>
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </li>
                        <li>
                           <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                        </li>
                     </ul>
                  </div>
                  <div class="modal-text-wrapper">
                     <div>
                        <h5>About the Job</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                           been the industry's standard dummy text ever since the 1500s.. Lorem Ipsum is simply dummy
                           text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                           dummy text ever since the 1500s.. Lorem Ipsum is simply dummy text of the printing and
                           typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                           1500s.</p>
                        <div id="more_content">
                           <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                              been the industry's standard dummy text ever since the 1500s.. Lorem Ipsum is simply dummy
                              text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                              standard
                              dummy text ever since the 1500s.. Lorem Ipsum is simply dummy text of the printing and
                              typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                              the
                              1500s.</p>
                        </div>
                     </div>
                     <p class="text-left py-4">
                        <a id="read_more" class="ghost-button btn btn-primary">Read More</a>
                     </p>
                  </div>
                  <!-- Video Section Start Here-->
                  <section class="video-section pb-0">
                     <div class="video-wrapper position-relative">
                        <video src="/" poster="assets/images/video-img.jpg"></video>
                        <div class="video-btn position-absolute top-50 start-50 translate-middle">
                           <a href="javascript:void(0)" class="d-inline-block"><span
                                 class="arrow-right d-inline-block"></span></a>
                        </div>
                     </div>
                  </section>
                  <!-- Video Section End Here-->
               </div>
            </div>
         </div>
      </div>
      <!-- model Start Here-->
   </main>
@endsection

@section('scripts')
<script>
   function setSortValue(){
      $('#sortby').val($('#sortdropdown').val())
      $('#filter-form').submit()
   }
   window.onload = function(){
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

   function slideOne(){
      if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
         sliderOne.value = parseInt(sliderTwo.value) - minGap;
      }
      displayValOne.textContent = sliderOne.value;
      fillColor();
   }
   function slideTwo(){
      if(parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap){
         sliderTwo.value = parseInt(sliderOne.value) + minGap;
      }
      displayValTwo.textContent = sliderTwo.value;
      fillColor();
   }
   function fillColor(){
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

   function slideOneExp(){
      if(parseInt(sliderTwoExp.value) - parseInt(sliderOneExp.value) <= minGapExp){
         sliderOneExp.value = parseInt(sliderTwoExp.value) - minGapExp;
      }
      displayValOneExp.textContent = sliderOneExp.value;
      fillColorExp();
   }
   function slideTwoExp(){
      if(parseInt(sliderTwoExp.value) - parseInt(sliderOneExp.value) <= minGapExp){
         sliderTwoExp.value = parseInt(sliderOneExp.value) + minGapExp;
      }
      displayValTwoExp.textContent = sliderTwoExp.value;
      fillColorExp();
   }
   function fillColorExp(){
      percentExp1 = (sliderOneExp.value / sliderMaxValueExp) * 100;
      percentExp2 = (sliderTwoExp.value / sliderMaxValueExp) * 100;
      sliderTrackExp.style.background = `linear-gradient(to right, #dadae5 ${percentExp1}% , #3264fe ${percentExp1}% , #3264fe ${percentExp2}%, #dadae5 ${percentExp2}%)`;
   }

   /* read more and less */

   function readDescription(id, description)
   {
      $('.job_description'+id).html(description+` <a onclick="readLess('${id}','${description}')" href="javascript:void(0)">Read less</a>` )
   }

   function readLess(id, description)
   {
      $('.job_description'+id).html(description.substr(0,60)+`... <a onclick="readDescription('${id}','${description}')" href="javascript:void(0)">Read more</a>`)
   }
</script>
@endsection