@extends('auth.partials.layout')
@section('title', 'Jobax')
@section('content')
<main class="login-shape main-banner-section login-form-page">
    <!-- login Section Start Here-->
    <section class="login-page">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form method="POST" action="{{ route('verification.resend') }}" class="login-form">
                        @csrf
                        <div class="d-grid login-button my-4">
                            <button type="submit" class="btn btn-form btn-primary btn-md">{{ __('click here to request another') }}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
    <!-- login Section End Here-->
</main>
@endsection