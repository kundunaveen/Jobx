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
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Send me Newsletter
                                        </label>
                                    </div>

                                    <button class="btn btn-lg search-btn"  type="submit">Search
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
                        <figure class="">
                            <img src="{{asset('assets/images/profile-img.png')}}" width="230" height="230" alt="Profile Img"
                                class="img-fluid">
                        </figure>
                        <article>
                            <h4 class="profile-heading">John Doe</h4>

                            <p class="work-profile">Front End Developer</p>

                            <div class="mail-id"><a href="mailto:johndoe_frontenddeveloper@gmail.com"><i
                                    class="icon-email me-2"></i>johndoe_frontenddeveloper@gmail.com</a>
                            </div>

                            <div class="website-link mb-5"><a href="javascript:void(0)"><i
                                    class="icon-website me-2"></i>Website</a></div>


                            <button class="btn btn-md ">Download CV</button>

                            <hr class="hr" />

                            <div class="social-wrapper">

                                <h4>Connect with Social</h4>

                                <ul class="list-group social-list">
                                    <li class="list-group-item border-0"><a href="javascript:void(0)"><i
                                            class="profile-icon icon-facebook"></i></a></li>
                                    <li class="list-group-item border-0"><a href="javascript:void(0)"><i
                                            class="profile-icon icon-linkdin"></i></a></li>
                                    <li class="list-group-item border-0"><a href="javascript:void(0)"><i
                                            class="profile-icon icon-twitter"></i></a></li>
                                    <li class="list-group-item border-0"><a href="javascript:void(0)"><i
                                            class="profile-icon icon-instagram"></i></a></li>
                                </ul>
                            </div>
                        </article>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card h-100">
                        <article class="profile-summary card-body">
                        <h4 class="d-flex justify-content-between border-bottom"><strong>Profile Summary
                            </strong><span><i class="icon-edit"></i></span></h4>
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
                                </strong><span><i class="icon-edit"></i></span></h4>
                        <div class="bio-list">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="bio-list-wrapper mb-md-5">
                                    <span><i class="profile-icon icon-experience"></i></span>
                                    <article>
                                        <h5>Experience</h5>
                                        <p class="mb-0">2-5 Years</p>
                                    </article>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="bio-list-wrapper mb-md-5">
                                    <span><i class="profile-icon icon-age"></i></span>
                                    <article>
                                        <h5>Age</h5>
                                        <p class="mb-0">22-28 Years</p>
                                    </article>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="bio-list-wrapper mb-md-5">
                                    <span><i class="profile-icon icon-gender"></i></span>
                                    <article>
                                        <h5>Gender</h5>
                                        <p class="mb-0">Male</p>
                                    </article>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="bio-list-wrapper">
                                    <span><i class="profile-icon icon-current-salary"></i></span>
                                    <article>
                                        <h5>Current Salary</h5>
                                        <p class="mb-0">26 Lac - 30 Lac</p>
                                    </article>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="bio-list-wrapper">
                                    <span><i class="profile-icon icon-expected-salary"></i></span>
                                    <article>
                                        <h5>Expected Salary</h5>
                                        <p class="mb-0">30 Lac - 40 Lac</p>
                                    </article>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="bio-list-wrapper">
                                    <span><i class="profile-icon icon-language"></i></span>
                                    <article>
                                        <h5>Language</h5>
                                        <p class="mb-0">Dutch, English</p>
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
        <section class="video-section">
            <div class="container">
            <h4 class="mb-4">Candidate Video</h4>
            <div class="video-wrapper position-relative">
                <img src="{{asset('assets/images/video-img.jpg')}}" width="1296" height="539" alt="video-img" class="img-fluid">
                <div class="video-btn position-absolute top-50 start-50 translate-middle">
                    <a href="javascript:void(0)" class="d-inline-block"><span
                        class="arrow-right d-inline-block"></span></a>
                </div>
            </div>
            </div>
        </section>
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
            <ul class="list-group">
                <li class="list-group-item border-0 d-flex  pb-4">
                    <figure class="me-4 mb-0"><i class="profile-icon icon-education"></i></figure>
                    <article>
                        <span class="mb-2 d-inline-block exp-period">2012 - 2014</span>
                        <h5>Hi-Tech College, Belgium</h5>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum
                        has been the
                        industry's standard dummy text ever since the 1500s.</p>
                    </article>
                </li>
                <li class="list-group-item border-0 d-flex">
                    <figure class="me-4 mb-0"><i class="profile-icon icon-education"></i></figure>
                    <article>
                        <span class="mb-2 d-inline-block exp-period">2008 - 2012</span>
                        <h5>Hi-Tech College, Belgium</h5>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum
                        has been the
                        industry's standard dummy text ever since the 1500s.</p>
                    </article>
                </li>
            </ul>
            </div>
        </section>
        <!-- Experience Section End Here-->
        <section class="experience-section">
            <div class="container">
            <h4 class="">Work & Experience</h4>
            <ul class="list-group">
                <li class="list-group-item border-0 pb-4">
                    <article>
                        <h5>Front End Developer<span class="ms-2 d-inline-block text-secondary">Techy Studio</span></h5>
                        <span class="mb-2 d-inline-block exp-period">2018 - NOW</span>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum
                        has been the
                        industry's standard dummy text ever since the 1500s.</p>
                    </article>
                </li>
                <li class="list-group-item border-0">
                    <article>
                        <h5>Web Designer<span class="ms-5 d-inline-block text-secondary">Techy Studio</span></h5>
                        <span class="mb-2 d-inline-block exp-period">2013 - 2018</span>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum
                        has been the
                        industry's standard dummy text ever since the 1500s.</p>
                    </article>
                </li>
            </ul>
            </div>
        </section>
        <!-- Experience Section End Here-->
        <!-- Skills Section End Here-->
        <section class="skills-section">
            <div class="container">
            <h4 class="">Professional Skills</h4>
            <ul class="list-group">
                <li class="list-group-item border-0">
                    <p class="mb-0">CSS</p>
                </li>
                <li class="list-group-item border-0">
                    <p class="mb-0">HTML</p>
                </li>
                <li class="list-group-item border-0">
                    <p class="mb-0">JQuery</p>
                </li>
                <li class="list-group-item border-0">
                    <p class="mb-0">Javascript</p>
                </li>
                <li class="list-group-item border-0">
                    <p class="mb-0">Bootstrap</p>
                </li>
            </ul>
            </div>
        </section>
        <!-- Skills Section End Here-->
    </main>
    <!--========= Main Content End Here =========-->
@endsection