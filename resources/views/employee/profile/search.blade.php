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
                  <form>
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
   <main class="profile-main-wrapper">
      <!-- Section Start Here-->
      <section class="job-listing-wrapper">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-md-4">
                  <aside class="job-listing-aside">
                     <h4 class="border-bottom">Details</h4>
                     <div class="aside-filter">
                        <h5>Schedule</h5>
                        <ul class="list-group">
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Full Time</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck2">
                              <label class="form-check-label" for="exampleCheck2">Part Time</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck3">
                              <label class="form-check-label" for="exampleCheck3">Project Work</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck4">
                              <label class="form-check-label" for="exampleCheck4">Volunteering</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck5">
                              <label class="form-check-label" for="exampleCheck5">Internship</label>
                           </li>
                        </ul>
                     </div>
                     <div class="aside-filter">
                        <h5>Employment Type</h5>
                        <ul class="list-group">
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck6">
                              <label class="form-check-label" for="exampleCheck6">Full Day</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck7">
                              <label class="form-check-label" for="exampleCheck7">Shift Work</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck8">
                              <label class="form-check-label" for="exampleCheck8">Distant Work</label>
                           </li>
                        </ul>
                     </div>
                     <div class="aside-filter">
                        <h5>Professional Level</h5>
                        <ul class="list-group">
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck9">
                              <label class="form-check-label" for="exampleCheck9">Trainee</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck10">
                              <label class="form-check-label" for="exampleCheck10">Senior</label>
                           </li>
                           <li class="list-group-item">
                              <input type="checkbox" class="form-check-input" id="exampleCheck11">
                              <label class="form-check-label" for="exampleCheck11">Director</label>
                           </li>
                        </ul>
                     </div>
                  </aside>
               </div>
               <div class="col-lg-10 col-md-8">
                  <section class="job-listing-section ">
                     <h4>Recomended Jobs (320)</h4>
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
                        <!-- <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/apple.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/google-circle.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/amazon.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/amazon.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src=" assets/images/google-circle.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/apple.png " width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/google-circle.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location-icon me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/apple.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location-icon me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                           <div class="card ">
                              <div class="card-body job-profile-info">
                                 <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                    <img src="assets/images/amazon.png" width="51" height="50" alt="">
                                    <span class="date">20 May, 2022</span>
                                 </figure>
                                 <article class="job-profile-article">
                                    <h5 class="">Front End Developer</h5>
                                    <ul class="job-type list-group flex-row mb-3">
                                       <li class="list-group-item">Full Time</li>
                                       <li class="list-group-item">Part Time</li>
                                    </ul>
                                    <h6 class="d-flex align-items-center"><i
                                          class="icon-location-icon me-2"></i>Amsterdam</h6>
                                    <p class="">Lorem Ipsum is simply dummy text of the printing and typesetting
                                       industry. Lorem Ipsum
                                       has been the industry's standard dummy text ever since the 1500s</p>
                                    <div class="job-btn-wrapper d-flex justify-content-between">
                                       <button type="button" class="btn btn-lg">Apply</button>
                                       <button type="button" class="btn btn-default btn-md" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop">Preview Job</button>
                                    </div>
                                 </article>
                              </div>
                           </div>
                        </div> -->
                     </div>
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