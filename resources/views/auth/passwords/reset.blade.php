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
    <title>Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" width="10" height="10" type="image/x-icon" />
    <!--Bootsrap CDN Here-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/scss/main.css') }}" />
</head>

<body class="body">

<header class="header"  id="myHeader">
        <div class="container">
            <div class="header-wrapper login-header py-4">
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                    <a href="{{ route('front-end.home') }}" class="logo-image d-inline-block  top-auto left-auto  order-1 order-md-2   mb-lg-0 mb-5">
                        <img src="{{ asset('assets/images/jobax-logo.png') }}" width="248" alt="" class="img-fluid" />
                    </a>
                    <!-- <div class="order-3 order-md-3">
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
                                        <button type="button" class="btn btn-lg login-from-btn  search-btn">Search
                                            Vacancies</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </header>
    
    <!--=========  Main Section Start Here =========-->
    <main class="login-shape main-banner-section login-form-page">
        <!-- login Section Start Here-->
        <section class="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <img src="{{ asset('assets\images\login.png') }}" alt="login-image" class="img-fluid login-img">
                        <h2 class="login-subheading">To Find More relevant jobs. Login to <span
                                class="text-blue">JobaX</span></h2>
                    </div>
                    <div class="col-md-5">
                        <form method="POST" action="{{ route('password.update') }}" id="login_form" class="login-form">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <h3 class="login-heading">Reset Password</h3>
                            <div class="form-group">
                                <span class="input-icon">
                                    <img src="{{ asset('assets\images\message.png') }}" width="20px" height="20px" class="img-fluid" alt="message">
                                </span>
                                <input type="email" id="email_input" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your Email" value="{{ $_GET['email']?$_GET['email']:old('email') }}" required autocomplete="email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="input-icon">
                                    <img src="{{ asset('assets\images\password.png') }}" width="20px"  height="20px" class="img-fluid" alt="password">
                                </span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password" required autocomplete="current-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <span class="input-icon">
                                    <img src="{{ asset('assets\images\password.png') }}" width="20px"  height="20px" class="img-fluid" alt="password">
                                </span>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" required autocomplete="current-password" />
                            </div>
                            <!-- <div class="form-group">
                                <span class="input-icon">
                                    <img src="{{ asset('assets\images\upload.png') }}" width="20px"  height="20px" class="img-fluid" alt="upload">
                                </span>
                                <input type="text" class="form-control" placeholder="Add your Resume " />
                            </div> -->
                            <!-- <div class="d-flex justify-content-between remember-pass">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <div class="forget-password"><a href="{{ route('password.request') }}">Forgot Password?</a></div>
                                @endif
                            </div> -->
                            <div class="d-grid login-button my-4">
                                <button type="submit" class="btn btn-form btn-primary btn-md" type="button">Reset Password</button>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <p>Already have an account. <a href="{{ route('login') }}"> Login</a> </p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p>New to JobaX? <a href="{{ route('register') }}"> I want to create an account</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- login Section End Here-->
    </main>
    <!--=========  Main Section End Here =========-->
    <!-- Script Link Here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>