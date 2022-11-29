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
                                <img src="{{ $company->profile_image_url }}" width="230" height="230" alt="Profile Img" class="img-fluid">
                            </figure>
                            <article>
                                <h4 class="profile-heading">{{ optional($company->profile)->company_name }}</h4>

                                <p class="work-profile">{{ $company->full_name }}</p>

                                <div class="mail-id"><a href="mailto:{{ $company->email }}"><i class="icon-email me-2"></i>{{ $company->email }}</a>
                                </div>
                                @if ($website_link = optional($company->profile)->website_link)
                                <div class="website-link mb-5"><a href="{{ $website_link }}" target="_blank"><i class="icon-website me-2"></i>Website</a></div>
                                @endif


                                <hr class="hr" />
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
                            <h4 class="d-flex justify-content-between border-bottom"><strong>Profile Summary
                                </strong><span><i class="icon-edit"></i></span></h4>
                            <p class="profile-text">
                                @if ($profile_summary = optional($company->profile)->profile_summary)
                                {{ $profile_summary }}
                                @else
                                No profile summary data added.
                                @endif
                            </p>

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
                        <div class="col-lg-7 col-md-6">
                            <div class="about-wrapper profile-summary">
                                <h2>Explanation about <br /> {{ optional($company->profile)->company_name }}</h2>
                                <p>
                                    @if ($description = optional($company->profile)->description)
                                    {{ $description }}
                                    @else
                                    No about data has been added.
                                    @endif
                                </p>
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

</main>
@endsection