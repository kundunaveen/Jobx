@extends('employee.profile.partials.layout')
@section('title', 'Vacancy Details')
@section('content')
<main class="main-bg inner-login-shape vacancy-details-page">
    <section class="form-inner-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @include('layouts.messages.error')
                    <!-- <div class="progress" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <form class="form-inner">
                        <h2 class="form-heading">Vacancy Details</h2>
                        <div class="row form-group">
                            <label for="check" class="form-label">Company Name</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="company_name" value="{{$profile->company_name}}" placeholder="Company name"
                                aria-label="Company name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Job Title</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="job_title" value="{{$job_details->job_title}}" placeholder="Job Title"
                                aria-label="Job Title">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Job Role</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="job_role" value="{{$job_details->job_role}}" placeholder="Job Role"
                                aria-label="Job Role">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Job Type</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="job_type" value="{{ $job_details->job_type_text }}" placeholder="Job Type"
                                aria-label="Job Type">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Description</label>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" aria-label="Description" readonly>{{ $job_details->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Salary Offer</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="salary_offer" value="{{$job_details->salary_offer}}" placeholder="Salary Offer"
                                    aria-label="Salary Offer">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Minimum Experience</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="min_exp" value="{{$job_details->min_exp}}" placeholder="Minimum Experience"
                                    aria-label="Minimum Experience">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Minimum weekly work hour</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly value="{{ $job_details->min_work_hours }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Maximum weekly work hour</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly value="{{ $job_details->max_work_hours }}">
                            </div>
                        </div>
                        @if(auth()->user() && auth()->user()->roleUser->role->role == 'employee')
                        <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-6">
                                <a href="{{ route('employee.job-withdrawn', $job_details->id) }}" class="btn  btn-primary btn-form">Withdrawn your application</a>
                            </div>
                            <div class="d-grid col-sm-6">
                                <a href="" class="btn py-3 px-0 bg-transparent fw-bold btn-skip">Cancel</a>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection