    <!--========= Header Section Start Here =========-->
    <style>
        .custom-dropdown-menu .dropdown-toggle {
            background: transparent;
            border: 0px !important;
            padding: 0px;
        }

        .custom-dropdown-menu .dropdown-menu {
            top: 20px !important;
            left: 11px;
        }

        .custom-dropdown-menu .nav-link {
            padding: 0.5rem 0.3rem !important;
        }
        .custom-dropdown-menu .nav-item {
            padding-left: 2rem !important;
            padding-right: 2.5rem !important;
        }
        /* .custom-dropdown-menu .dropdown-item{color:#000;font-size:16px;height:32px} */
    </style>
    <header class="header inner-header" id="myHeader">
        <div class="container">
            <div class="header-wrapper py-4">
                <div
                    class="d-flex flex-column flex-md-row align-items-center justify-content-between position-relative">
                    <a href="#" class="nav-link link-secondary order-2 order-md-1 mb-3 mb-md-0 "></a>

                    <a href="index.html" class="logo-image d-inline-block  order-1 order-md-2  mb-3 mb-md-0">
                        <img src="{{asset('assets/images/jobax-logo.png')}}" width="248" alt="" class="img-fluid" />
                    </a>

                    <div class="order-3 order-md-3">
                        <ul class="list-group flex-row align-items-center justify-content-end">
                            <li class="list-group-item bg-transparent border-0 p-0  me-3">
                                <a type="button" class="btn btn-default"  href="javascript:void(0)">
                                    <span class="me-2">
                                        <i class="icon icon-resume"></i>
                                    </span>
                                    Post Resume
                                </a>
                            </li>
                            <li class="list-group-item d-flex flex-row  bg-transparent border-0 p-0">
                               <figure class="me-3 me-sm-1 mb-0">
                                  <img src="{{asset('assets/images/user-img.png')}}" height="51" width="51" alt=""
                                     class="img-fluid" />
                               </figure>
                               <article class="text-left">
                                  <h5 class="mb-0">John Doe</h5>
                                  <p class="mb-0 user-designation">Front End Developer</p>
                               </article>
                            </li>
                            <li class="list-group-item bg-transparent d-flex border-0 p-0 custom-dropdown-menu">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true">&nbsp;&nbsp;&nbsp;</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-popper-placement="bottom-end">
                                        <!-- <li class="nav-link"><a class="dropdown-item nav-item" href="{{ route('admin.setting') }}"><i class="navbar-icon icon-recuirment"></i> Setting</a></li> -->
                                        <li class="nav-link"><a class="dropdown-item nav-item" href="{{route('employer.profile.edit')}}"> Profile</a></li>
                                        <li class="nav-link"><a class="dropdown-item nav-item" data-bs-toggle="modal" data-bs-target="#changePasswordModal" href="javascript:void(0)"> Change Password</a></li>
                                        <li class="nav-link"><a class="dropdown-item nav-item" href="javascript:void(0)" onclick="$('#logout_form').submit()"> Logout</a></li>
                                    </ul>
                                </div>
                                                    
                            </li>
                         </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <form action="{{ route('logout') }}" id="logout_form" method="POST">
        @csrf
    </form>
    <!--========= Header Section End Here =========-->