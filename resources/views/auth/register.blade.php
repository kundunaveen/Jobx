<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
   <![endif]-->
<!--[if IE 7]>         
   <html class="no-js lt-ie9 lt-ie8">
      <![endif]-->
<!--[if IE 8]>         
      <html class="no-js lt-ie9">
         <![endif]-->
<!--[if gt IE 8]>      
         <html class="no-js">
            <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" width="10" height="10" type="image/x-icon" />
    <!--Bootsrap CDN Here-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/scss/main.css') }}" />
    <style>
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #2343f2 !important;
        }
    </style>
</head>

<body class="body">
    <!--[if lt IE 7]>
                  <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
                  <![endif]-->
    <!--=========  Header Start Here =========-->
    <header class="header"  id="myHeader">
        <div class="container">
            <div class="header-wrapper login-header py-4">
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                    <a href="{{ route('front-end.home') }}" class="logo-image d-inline-block  top-auto left-auto  order-1 order-md-2   mb-lg-0 mb-5">
                        <img src="{{ asset('assets/images/jobax-logo.png') }}" width="248" alt="" class="img-fluid" />
                    </a>
                    <div class="order-3 order-md-3">
                        <div class="banner-form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-4 mb-lg-0 mb-5">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="form-icon icon-keywords"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Keywords" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-lg-0 mb-5">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="form-icon icon-location"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Placename" />
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
                                    <div class=" col-lg-4">
                                        <button type="button" class="btn btn-lg login-from-btn  search-btn">Search
                                            Vacancies</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--=========  Header Section End Here =========-->
    <!--========= Main Section Start Here =========-->
    <main class="main-wrapper login-shape main-banner-section register-page">
        <!--========= login Section Start Here =========-->
        <section class="login-page register-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <img src="{{ asset('assets\images\login.png') }}" alt="login-image" class="img-fluid login-img">
                        <h2 class="login-subheading">To Find More relevant jobs. Register to <span
                                class="text-blue">JobaX</span></h2>
                    </div>
                    <div class="col-md-5">
                        <form class="login-form" method="POST" action="{{ route('register') }}">
                            @csrf
                        <input type="hidden" id="user_role" value="employer" name="role">
                        <div class="row justify-content-between">
                            <div class="col-auto"><h3 class="login-heading">Register</h3></div>
                            <div class="col-auto">
                                <ul class="nav nav-default nav-pills nav-white nav-justified nav-rounded-pill font-weight-medium px-6 pb-5" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" style="border-radius:20px" id="pills-one-code-sample-tab" data-toggle="pill" href="javascript:void(0)" role="tab" aria-controls="pills-one-code-sample" aria-selected="true">Employer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" style="border-radius:20px" id="pills-two-code-sample-tab" data-toggle="pill" href="javascript:void(0)" role="tab" aria-controls="pills-two-code-sample" aria-selected="false">Employee</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="input-icon"><img src="{{ asset('assets\images\message.png') }}" width="20px"
                                class="img-fluid" height="20px" alt="message"></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <span class="input-icon ps-2">
                                    <img src="{{ asset('assets\images\name.png') }}" width="20px" height="20px" class="img-fluid" alt="message"></span>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus />
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 form-group">
                                <span class="input-icon  ps-2">
                                    <img src="{{ asset('assets\images\name.png') }}" width="20px" height="20px" class="img-fluid" alt="message"></span>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus />
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="input-icon">
                                <img src="{{ asset('assets\images\password.png') }}" width="20px" height="20px" class="img-fluid" alt="password"></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <span class="input-icon">
                                <img src="{{ asset('assets\images\password.png') }}" width="20px" height="20px" class="img-fluid" alt="password"></span>
                            <input type="password" class="form-control" placeholder="Re-enter your password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
                        <div class="d-grid login-button ">
                            <button class="btn btn-form btn-primary btn-md" type="submit">Signing Up</button>
                        </div>
                        <div class="mt-3 d-flex justify-content-center">
                            <p>Already have an account. <a href="{{ route('login') }}"> Login</a> </p>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!--========= login Section Start Here =========-->
    </main>
    <!--========= Main Section Start Here =========-->
        <!--========= Footer Section Start Here =========-->
        <footer class="footer footer-bg">
            <div class="container">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-lg-5">
                            <figure class="footer-logo">
                                <a class="" href="{{ route('front-end.home') }}">
                                    <img src="{{ asset('assets/images/jobax-logo.png') }}" width="248" alt="" class="img-fluid" />
                                </a>
                            </figure>
                            <article>
                                <p>JobaX is a job site that provides visual vacancies, RAMS software and on-site offers
                                    additions
                                    to
                                    the recruiters</p>
                            </article>
                        </div>
                        <div class="col-lg-7">
                            <div class="menu-list">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-5 ms-xl-5">
                                            <h6>Company</h6>
                                            <ul class="footer-menu-list list-group">
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">About Us</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">Careers</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">Customers</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0">
                                                    <a href="javascript:void(0)">Partnership</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-5 ms-xl-5 ps-lg-3">
                                            <h6>Quick Links</h6>
                                            <ul class="footer-menu-list list-group">
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">Home</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">Explore</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0">
                                                    <a href="javascript:void(0)">Category</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-5 ms-xl-5">
                                            <h6>Resources</h6>
                                            <ul class="footer-menu-list list-group">
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">FAQ</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0 ">
                                                    <a href="javascript:void(0)">Blog</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-4">
                                        <div class="mb-5 mb-lg-0 ms-xl-5">
                                            <h6>Contact</h6>
                                            <ul class="footer-menu-list list-group">
                                                <li class="list-group-item border-0 p-0 mb-3"><a
                                                        href="mailto:info@devacaturemaker.nl"><i
                                                        class="icon-email me-1"></i>info@devacaturemaker.nl</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0">
                                                    <a href="tel:+124 56789 1010"><i
                                                      class="icon-phone me-1"></i>+124 56789 1010</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-5 mb-lg-0">
                                            <h6>Legal</h6>
                                            <ul class="footer-menu-list list-group">
                                                <li class="list-group-item border-0 p-0 mb-3">
                                                    <a href="javascript:void(0)">Termaof Services</a>
                                                </li>
                                                <li class="list-group-item border-0 p-0">
                                                    <a href="javascript:void(0)"> Privacy Policy</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom text-center border-top">
                    <p class="mb-0">© 2022 JobaX. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <!--========= Footer Section End Here =========-->
    <!--========= Script Link Here =========-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        <script>
            $('#pills-one-code-sample-tab').on('click', function(){
                $('#pills-one-code-sample-tab').addClass('active')
                $('#pills-one-code-sample-tab').removeClass('text-dark')
                $('#pills-two-code-sample-tab').removeClass('active')
                $('#pills-two-code-sample-tab').addClass('text-dark')
                $('#user_role').val('employer')

            })

            $('#pills-two-code-sample-tab').on('click', function(){
                $('#pills-two-code-sample-tab').addClass('active')
                $('#pills-two-code-sample-tab').removeClass('text-dark')
                $('#pills-one-code-sample-tab').removeClass('active')
                $('#pills-one-code-sample-tab').addClass('text-dark')
                $('#user_role').val('employee')
            })
        </script>
</body>

</html>