    <!--========= Header Section Start Here =========-->
    <header class="header" id="myHeader">
        <div class="container">
            <div class="header-wrapper py-4">
                <div
                    class="d-flex flex-column flex-md-row align-items-center justify-content-between position-relative">
                    <a href="#" class="nav-link link-secondary order-2 order-md-1 mb-3 mb-md-0 ">Post a
                        Vacancy</a>

                    <a href="{{ route('front-end.home') }}" class="logo-image d-inline-block  order-1 order-md-2  mb-3 mb-md-0">
                        <img src="{{ asset('assets/images/jobax-logo.png') }}" width="248" alt="" class="img-fluid" />
                    </a>

                    @if(Auth::check())
                    <a href="{{ route('home') }}" class="nav-link link-secondary order-2 order-md-1 mb-3 mb-md-0 ">Dashboard</a>
                    @else
                    <div class="order-3 order-md-3">
                        <a type="button" class="btn btn-default btn-md me-2" href="{{ route('login') }}">
                            <span class="me-2">
                                <i class="icon icon-login"></i>
                            </span>
                            Login
                        </a>
                        <a type="button" class="btn btn-primary btn-md" href="{{ route('register') }}">
                            <span class="me-2">
                                <i class="icon icon-signup"></i>
                            </span>
                            Signing Up
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <!--========= Header Section End Here =========-->