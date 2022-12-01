@extends('admin.dashboard.partials.layout')
@section('title')
Admin | Settings
@endsection
@section('content')

<section class="dashboard-section inner-login-shape">
    <div class="dashboard-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <form action="{{ route('admin.changePassword') }}" method="POST" class="login-form">
                                        @csrf
                                        <h3 class="login-heading">Help desk data</h3>
                                        <div class="form-group mt-4">
                                            <input type="text" name="setting_data[contact_number]" class="form-control @error('current_password') is-invalid @enderror" placeholder="Enter Current Password" required />
                                            @if(Session('wrongpassword'))
                                            <span class="text-danger" role="alert">
                                                <strong>{{Session('wrongpassword')}}</strong>
                                            </span>
                                            @endif
                                            @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <!-- <span class="input-icon">
                                                <img src="{{ asset('assets\images\password.png') }}" width="20px"  height="20px" class="img-fluid" alt="password">
                                            </span> -->
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password" required />
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <!-- <span class="input-icon">
                                                <img src="{{ asset('assets\images\password.png') }}" width="20px"  height="20px" class="img-fluid" alt="password">
                                            </span> -->
                                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password" required />
                                        </div>
                                        <div class="d-grid login-button my-4">
                                            <button type="submit" class="btn btn-form btn-primary btn-md">Change Password</button>
                                        </div>
                                    </form>

                                    <!-- <article class="recruiter-article">
                                        <h5>Hello Recruiter!</h5>
                                        <p>You have 10 new applications. </p>
                                        <a href="javascript:void(0)">Review all</a>
                                    </article> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection