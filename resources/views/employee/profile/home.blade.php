@extends('employee.profile.partials.layout')
@section('title')
Profile
@endsection
@section('content')
<!--========= Main Banner Start Here========= -->
<section class="banner-section inner-banner main-banner-section">
    <div class="container">
        <div class="row">
            <div class="banner-section-wrapper">
                <div class="banner-content">
                    <h1><span>Innovation</span> Makes <span>Everything</span> Better</h1>
                </div>
                <div class="banner-form">
                    <form action="{{route('search.job')}}" method="GET">

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
                                <div class="form-check float-md-end">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Send me Newsletter
                                    </label>
                                </div>

                                <button class="btn btn-lg search-btn" type="submit">Search
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
    </div>
</section>
<!-- Main Banner End Here -->
<!--========= Main Content End Here =========-->
<main class="profile-main-wrapper employer-profile-page">

    <!-- Profile Section Start Here-->
    <section class="profile-section">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0  ">
                    <div class="card mb-5 mb-lg-0 h-100">
                        <div class="profile-wrapper card-body   text-center">
                            @if($profile_image = optional($employee->profile)->profile_image_url)
                            <figure class="">
                                <img src="{{ $profile_image }}" width="230" height="230" alt="Profile Img" class="img-fluid">
                            </figure>
                            @endif
                            <article>
                                <h4 class="profile-heading">{{ $employee->full_name }}</h4>

                                <p class="work-profile">{{ optional($employee->profile)->current_job_title }}</p>

                                <div class="mail-id"><a href="mailto:{{ $employee->email }}"><i class="icon-email me-2"></i>{{ $employee->email }}</a>
                                </div>
                                @if($website_link = optional($employee->profile)->website_link)
                                    <div class="website-link mb-5"><a href="{{ $website_link }}" target="_blank"><i class="icon-website me-2"></i>Website</a></div>
                                @else
                                <div class="website-link mb-5">
                                    <a href="{{route('employee.profile.edit')}}" target="_blank">
                                    <i class="icon-edit"></i> Add your website link
                                    </a>
                                </div>
                                @endif
                                @if($resume = optional($employee->profile)->profile_resume_url)
                                <a href="{{ $resume }}" class="btn btn-md" download="" target="_blank">Download CV</a>
                                @endif
                                <hr class="hr" />
                                @if ($social_media_link = optional($employee->profile)->social_media_link)
                                <div class="social-wrapper">

                                    <h4>Connect with Social</h4>
                                    <ul class="list-group social-list">
                                        @if($facebook = data_get($social_media_link, 'facebook', false))
                                        <li class="list-group-item border-0"><a href="{{ $facebook }}" target="_blank"><i class="profile-icon icon-facebook"></i></a></li>
                                        @endif
                                        @if($linkedin = data_get($social_media_link, 'linkedin', false))
                                        <li class="list-group-item border-0"><a href="{{ $linkedin }}" target="_blank"><i class="profile-icon icon-linkdin"></i></a></li>
                                        @endif
                                        @if($twitter = data_get($social_media_link, 'twitter', false))
                                        <li class="list-group-item border-0"><a href="{{ $twitter }}" target="_blank"><i class="profile-icon icon-twitter"></i></a></li>
                                        @endif
                                        @if($instagram = data_get($social_media_link, 'instagram', false))
                                        <li class="list-group-item border-0"><a href="{{ $instagram }}" target="_blank"><i class="profile-icon icon-instagram"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                                @endif

                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card h-100">
                        <article class="profile-summary card-body">
                            <h4 class="d-flex justify-content-between border-bottom"><strong>Profile Summary
                                </strong><span><a href="{{route('employee.profile.edit')}}"><i class="icon-edit"></i></a></span></h4>
                            <p class="profile-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat gravida
                                interdum
                                mauris vitae at
                                rhoncus aliquam arcu quis. Egestas elit nulla ipsum consequat cursus non. Luctus netus urna a
                                id
                                ac. Turpis pellentesque consequat scelerisque sit amet sed tristique ante proin. Nibh tellus
                                vulputate nam dui ipsum arcu suspendisse sagittis. Fermentum laoreet feugiat adipiscing id
                                dignissim justo. Odio enim amet fermentum leo faucibus. Turpis nibh scelerisque elit rhoncus
                                venenatis. Ornare dui quis eget etiam. Vulputate nunc in aliquet enim lectus ornare sed donec
                                egestas.</p>
                            <h4 class="d-flex justify-content-between border-bottom"><strong>Professional
                                    Details
                                </strong><span><a href="{{route('employee.profile.edit')}}"><i class="icon-edit"></i></a></span></h4>
                            <div class="bio-list">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <div class="bio-list-wrapper mb-md-5">
                                            <span><i class="profile-icon icon-experience"></i></span>
                                            <article>
                                                <h5>Experience</h5>
                                                <p class="mb-0">
                                                    @if ($experience = optional($employee->profile)->experience)
                                                    {{ $experience }} years
                                                    @else
                                                    NA
                                                    @endif
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="bio-list-wrapper mb-md-5">
                                            <span><i class="profile-icon icon-age"></i></span>
                                            <article>
                                                <h5>Age</h5>
                                                <p class="mb-0">
                                                    @if ($date_of_birth = optional($employee->profile)->date_of_birth)
                                                    {{ \Illuminate\Support\Carbon::parse($date_of_birth)->age }} years
                                                    @else
                                                    NA
                                                    @endif
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="bio-list-wrapper mb-md-5">
                                            <span><i class="profile-icon icon-gender"></i></span>
                                            <article>
                                                <h5>Gender</h5>
                                                <p class="mb-0">
                                                    @if ($gender = optional($employee->profile)->profile_gender)
                                                    {{ $gender }}
                                                    @else
                                                    NA
                                                    @endif
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="bio-list-wrapper">
                                            <span><i class="profile-icon icon-current-salary"></i></span>
                                            <article>
                                                <h5>Current Salary</h5>
                                                <p class="mb-0">
                                                    @if ($current_salary = optional($employee->profile)->current_salary)
                                                    {{ $current_salary }} Lac
                                                    @else
                                                    NA
                                                    @endif
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="bio-list-wrapper">
                                            <span><i class="profile-icon icon-expected-salary"></i></span>
                                            <article>
                                                <h5>Expected Salary</h5>
                                                <p class="mb-0">
                                                    @if ($expected_salary = optional($employee->profile)->expected_salary)
                                                    {{ $expected_salary }} Lac
                                                    @else
                                                    NA
                                                    @endif
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="bio-list-wrapper">
                                            <span><i class="profile-icon icon-language"></i></span>
                                            <article>
                                                <h5>Language</h5>
                                                <p class="mb-0">
                                                    @if ($profile_languages = optional($employee->profile)->profile_languages)
                                                    {{ $profile_languages->implode(', ') }}
                                                    @else
                                                    NA
                                                    @endif
                                                </p>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Profile Section End Here-->
    <!-- Video Section Start Here-->
    @if($video = optional($employee->profile)->profile_video_url)
    <section class="video-section">
        <div class="container">
            <h4 class="mb-4">Candidate Video</h4>
            <div class="video-wrapper position-relative">
                <video width="100%" height="539" controls>
                    <source src="{{ $video }}" type="video/mp4">
                    <source src="{{ $video }}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>
    @endif
    <!-- Video Section End Here-->
    <!-- About Section Start Here-->
    <section class="about-section">
        <div class="container">
            <h4 class="">Candidate About</h4>
            <div>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                    into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                    release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                    software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </section>
    <!-- About Section End Here-->
    <!-- Education Section Start Here-->
    <section class="education-section">
        <div class="container">
            <h4 class="">Education</h4>
            @if ($educations = $employee->educations)
            <ul class="list-group">
                @forelse ($educations as $education)
                <li class="list-group-item border-0 d-flex  pb-4">
                    <figure class="me-4 mb-0"><i class="profile-icon icon-education"></i></figure>
                    <article>
                        <span class="mb-2 d-inline-block exp-period">
                            {{ $education->from_year }}
                            -
                            @if ($education->is_pursuing_here)
                            Pursuing
                            @else
                            {{ $education->to_year }}
                            @endif
                        </span>
                        <h5>{{ $education->institution_name }}, {{ optional($education->loadMissing('country')->country)->name }}</h5>
                        <p class="mb-0">{{ $education->describe }}</p>
                    </article>
                </li>
                @empty
                --
                @endforelse
            </ul>
            @else
            --
            @endif
        </div>
    </section>
    <!-- Experience Section End Here-->
    <section class="experience-section">
        <div class="container">
            <h4 class="">Work & Experience</h4>
            @if($experiences = $employee->experience)
            <ul class="list-group">
                @forelse ($experiences as $experience)
                <li class="list-group-item border-0 pb-4">
                    <article>
                        <h5>{{ $experience->job_title }} <span class="ms-2 d-inline-block text-secondary">{{ $experience->company }}</span></h5>
                        <span class="mb-2 d-inline-block exp-period">
                            {{ $experience->from_year }}
                            -
                            @if ($experience->is_work_here)
                            NOW
                            @else
                            {{ $experience->to_year }}
                            @endif
                        </span>
                        <p class="mb-0">{{ $experience->describe }}</p>
                    </article>
                </li>
                @empty
                --
                @endforelse
            </ul>
            @else
            --
            @endif
        </div>
    </section>
    <!-- Experience Section End Here-->
    <!-- Skills Section End Here-->

    <section class="skills-section">
        <div class="container">
            <h4 class="">Professional Skills</h4>
            @if ($profile_skills = optional($employee->profile)->profile_skills)
            <ul class="list-group">
                @forelse ($profile_skills as $profile_skill)
                <li class="list-group-item border-0">
                    <p class="mb-0">{{ $profile_skill }}</p>
                </li>
                @empty
                --
                @endforelse
            </ul>
            @else
            --
            @endif
        </div>
    </section>
    <!-- Skills Section End Here-->
</main>
<!--========= Main Content End Here =========-->
@endsection