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

                    <a href="{{ url('/') }}" class="logo-image d-inline-block  order-1 order-md-2  mb-3 mb-md-0">
                        <img src="{{asset('assets/images/jobax-logo.png')}}" width="248" alt="" class="img-fluid" />
                    </a>
                    <div class="order-3 order-md-3">
                        <ul class="list-group flex-row align-items-center justify-content-end">
                            <li class="list-group-item bg-transparent border-0 p-0  me-3">
                                <a type="button" class="btn btn-default" href="{{ route('employee.profile.edit') }}">
                                    <span class="me-2">
                                        <i class="icon icon-resume"></i>
                                    </span>
                                    Post Resume
                                </a>
                            </li>
                    @auth
                            <li class="list-group-item d-flex flex-row  bg-transparent border-0 p-0">
                               <figure class="me-3 me-sm-1 mb-0">
                                  <img src="{{ optional(auth()->user())->profile_image_url }}" height="51" width="51" alt=""
                                     class="img-fluid" />
                               </figure>
                               <article class="text-left">
                                  <h5 class="mb-0">{{ optional(auth()->user())->full_name }}</h5>
                                  @if($profile_current_job_title = optional(auth()->user())->profile_current_job_title)
                                  <p class="mb-0 user-designation">{{ $profile_current_job_title }}</p>
                                  @endif
                               </article>
                            </li>
                            <li class="list-group-item bg-transparent d-flex border-0 p-0 custom-dropdown-menu">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true">&nbsp;&nbsp;&nbsp;</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-popper-placement="bottom-end">
                                        <!-- <li class="nav-link"><a class="dropdown-item nav-item" href="{{ route('admin.setting') }}"><i class="navbar-icon icon-recuirment"></i> Setting</a></li> -->
                                        <li class="nav-link"><a class="dropdown-item nav-item" href="{{route('employee.profile.edit')}}"> Profile</a></li>
                                        <li class="nav-link"><a class="dropdown-item nav-item" data-bs-toggle="modal" data-bs-target="#changePasswordModal" href="javascript:void(0)"> Change Password</a></li>
                                        <li class="nav-link"><a class="dropdown-item nav-item" href="javascript:void(0)" onclick="$('#logout_form').submit()"> Logout</a></li>
                                    </ul>
                                </div>
                                                    
                            </li>                      
                    @endauth
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
        <!-- ========== Change Password Modal ========== -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius:10px">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalTitle">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('employee.change.password') }}" method="POST" class="login-form" id="change_password_form">
      <div class="modal-body">
            @csrf
            <div class="form-group mt-2">
                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Enter Current Password" required id="current_password"/>
                <span class="text-danger" role="alert">
                    <strong id="current_password_error_message" class="error_messages"></strong>
                </span>
            </div>
            <div class="form-group mt-4">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password" required id="new_password"/>
                <span class="text-danger" role="alert">
                    <strong id="new_password_error_message" class="error_messages"></strong>
                </span>
            </div>
            <div class="form-group mt-4 mb-2">
                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" required id="confirm_password" />
            </div>
            <!-- <div class="d-grid login-button my-4">
                <button type="submit" class="btn btn-form btn-primary btn-md">Change Password</button>
            </div> -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" onclick="checkPasswordValidation()" class="btn btn-sm btn-primary">Update Password</button>
        </div>
    </form>
    </div>
  </div>
</div>