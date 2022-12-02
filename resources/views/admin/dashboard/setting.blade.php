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
                                    <form action="{{ route('admin.cms.setting.update') }}" method="POST" class="login-form">
                                        @csrf
                                        @method('PUT')
                                        <h3 class="login-heading">Help desk data</h3>
                                        <div class="form-group mt-4">
                                            <label class="form-label">Contact number <span class="text-danger">*</span></label>
                                            <input type="text" name="content[contact_number]" value="{{ old('content.contact_number', data_get($cms->content, 'contact_number', '')) }}" class="form-control @error('content.contact_number') is-invalid @enderror" placeholder="Enter Contact number *" required />
                                            @error('content.contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <label class="form-label">Contact email <span class="text-danger">*</span></label>
                                            <input type="text" name="content[contact_email]" value="{{ old('content.contact_email', data_get($cms->content, 'contact_email', '')) }}" class="form-control @error('content.contact_email') is-invalid @enderror" placeholder="Enter email number *" required />
                                            @error('content.contact_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 d-grid login-button my-4">
                                            <button type="submit" class="btn btn-form btn-primary btn-md">Save</button>
                                        </div>
                                    </form>
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