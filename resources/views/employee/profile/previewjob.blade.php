@extends('employee.profile.partials.layout')
@section('content')

<main class="main-bg inner-login-shape vacancy-details-page">
    <section class="form-inner-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="progress" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <form class="form-inner">
                        <h2 class="form-heading">Vacancy Details</h2>
                        <div class="row form-group">
                            <label for="check" class="form-label">Company Name*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="company_name" value="{{$profile->company_name}}" placeholder="Company name"
                                aria-label="Company name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Job Title*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="job_title" value="{{$job_details->job_title}}" placeholder="Job Title"
                                aria-label="Job Title">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Job Role*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="job_role" value="{{$job_details->job_role}}" placeholder="Job Role"
                                aria-label="Job Role">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Job Type*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="job_type" value="{{$job_details->job_type == 'full_time' ? 'Full Time' : $job_details->job_type == 'part_time' ? 'Part Time' : 'Contract Based' }}" placeholder="Job Type"
                                aria-label="Job Type">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Description*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="description" value="{{$job_details->description}}" placeholder="Description"
                                    aria-label="Description">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Salary Offer*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="salary_offer" value="{{$job_details->salary_offer}}" placeholder="Salary Offer"
                                    aria-label="Salary Offer">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Minimum Experience*</label>
                            <div class="col-12">
                                <input type="text" class="form-control form-input" readonly name="min_exp" value="{{$job_details->min_exp}}" placeholder="Minimum Experience"
                                    aria-label="Minimum Experience">
                            </div>
                        </div>
                        <!-- <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-6">
                                <input type="submit" class="btn  btn-primary btn-form" value="Submit">
                            </div>
                            <div class="d-grid col-sm-6">
                                <input type="reset" class="btn py-3 px-0 bg-transparent fw-bold btn-skip" value="Skip">
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>