@extends('front-end.partials.layout')
@section('title')
    Jobax
@endsection
@section('content')
    <!--========= Main Content Start Here =========-->
    <main class="main home-page">
        <!-- Main Banner Start Here -->
        <section class="banner-section main-banner-section">
            <div class="container">
                <div class="row">
                    <div class="banner-section-wrapper">
                        <div class="banner-content">
                            <h1><span>Innovation</span> Makes <span>Everything</span> Better</h1>
                            <h2>JobaX is a job site that provides visual vacancies, RAMS software and on-site offers.
                            </h2>
                        </div>
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
                                        <div class="form-check float-md-end">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Send me Newsletter
                                            </label>
                                        </div>

                                        <button class="btn btn-lg search-btn">Search
                                            Vacancies</button>
                                        <div class="search-advance">
                                            <ul class="col-md-auto">
                                                <li><a href="{{url('/companies')}}">Company Listing</a></li>
                                                <li class="text-end"><a hre="#!">Advance Search </a></li>
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
        <!-- Featured Section Start Here -->
        <div class="featured-vacancies-section slass-icon">
            <div class="container">
                <h2>
                    Featured <br />
                    Vacancies
                </h2>
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1">
                        <div class="featured-carousel">
                            <div class="vacancies-number d-flex">
                                <div class="col-md-6 d-flex flex-column"><span class="mb-2">640 </span>
                                    <span>Vacancies</span>
                                </div>
                                <div class="col-md-6 d-flex flex-column"><span class="mb-2">22 </span>
                                    <span>Categories</span>
                                </div>
                            </div>
                            <div class="all-vacancie">
                                <a href="job-listing.html"> <small>All Vacancies <i class="icon-right-select-icon"></i></small></a>
                            </div>
                            <div class="mx-auto my-auto justify-content-center">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="vacancies-img">
                                                    <img src="{{ asset('assets/images/property.png') }}" alt="vacancies-1.jpg"
                                                        width="290" height="227" class="img-fluid" />
                                                    <a href="#!">
                                                        <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}"
                                                                alt="play button" width="" height=""
                                                                class="img-fluid" /></div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h3>Property</h3>
                                                    <div class="location">
                                                        <span><i class="icon-location"></i>
                                                            Hilversum</span>
                                                        <span class="text-muted">30+ days ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="vacancies-img">
                                                    <img src="{{ asset('assets/images/sports.png') }}" alt="vacancies-1.jpg"
                                                        width="290" height="227" class="img-fluid" />
                                                    <a href="#!">
                                                        <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}"
                                                                alt="play button" width="" height=""
                                                                class="img-fluid" /></div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h3>Sports Person</h3>
                                                    <div class="location">
                                                        <span><i class="icon-location"></i>
                                                            Amsterdam</span>
                                                        <span class="text-muted">30+ days ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="item">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="vacancies-img">
                                                    <img src="{{ asset('assets/images/butician.png') }}" alt="vacancies-1.jpg"
                                                        width="290" height="227" class="img-fluid" />
                                                    <a href="#!">
                                                        <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}"
                                                                alt="play button" width="" height=""
                                                                class="img-fluid" /></div>
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h3>Beautician</h3>
                                                    <div class="location">
                                                        <span><i class="icon-location"></i>
                                                            Amsterdam</span>
                                                        <span class="text-muted">30+ days ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 order-1 order-md-2">
                        <div class="image-box d-flex justify-content-sm-center mt-sm-5">
                            <img src="{{ asset('assets/images/featured-img.png') }}" alt="featured-img.png" width="467" height="457"
                                class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Section End Here -->
        <!-- Content Section Start Here-->
        <div class="content-section x-shape">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12 fade-in-up">
                        <div class="image-box">
                            <img src="{{ asset('assets/images/about-img.png') }}" width="671" height="687" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-12">
                        <div class="about-wrapper">
                            <div class="card-body">
                                <h2>Explanation about <br /> Visual Vacancies</h2>
                                <div class="about-content">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type
                                        and scrambled it to make a type specimen book. It has survived not only five
                                        centuries, but also the leap into electronic typesetting, remaining essentially
                                        unchanged. It was popularised in the 1960s
                                        with the release of Letraset sheets containing Lorem Ipsum passages, and more
                                        recently with desktop publishing software like Aldus PageMaker including
                                        versions of Lorem Ipsum.
                                    </p>

                                    <p class="mb-0">
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old. Richard McClintock, a Latin
                                        professor at Hampden-Sydney College in Virginia, looked up one of the more
                                        obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                        the cites of the word in classical
                                        literature, discovered the undoubtable source.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Section End Here-->
        <!-- Best Company Section Start Here-->
        <div class="best-company">
            <div class="best-company-wrapper">
                <div class="best-company-left">
                    <div class="row">
                        <div class="card-body">
                            <span>How we are!</span>
                            <h2>Best Company</h2>
                            <div class="tab-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item active"><a class="nav-link active" href="#Company" role="tab"
                                            aria-controls="Company" data-bs-toggle="tab">Company Statement</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#Mission" role="tab"
                                            aria-controls="Company" data-bs-toggle="tab">Our Company</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="Company" role="tabpanel"
                                        aria-labelledby="Company-tab">
                                        <p class="mb-0">
                                            JobaX is a job site that provides visual vacancies, RAMS software and
                                            on-site
                                            offers additions to the recruiters, job seekers and content creators who
                                            want
                                            more need clarity, cost and time efficiency
                                            have, but not getting that of the competitor.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="Mission" role="tabpanel" aria-labelledby="Mission-tab">
                                        <p class="mb-0"> Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem
                                            Ipsum has been the industry's standard dummy text ever since the 1500s, when
                                            an
                                            unknown printer took a galley of type
                                            and scrambled it to make a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-box">
                    <img src="{{ asset('assets/images/business-team.png') }}" width="1100" height="590" class="img-fluid" />
                </div>
            </div>
        </div>
        <!-- Best Company Section End Here -->
    </main>
    <!--========= Main Content End Here =========-->
@endsection

