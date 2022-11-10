@extends('employee.profile.partials.layout')
@section('title', 'Edit experience')
@section('content')
<main class="main-bg inner-login-shape job-descri-form-page">
    <section class="form-inner-wrapper">
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        @include('layouts.messages.error')
                        <form class="form-inner" action="{{ route('employee.experience.update', [$experience->uuid]) }}" method="POST" id="jqueryValidatorEditExperienceForm">
                            @csrf
                            @method('put')
                            <h2 class="form-heading">Job description</h2>
                            <div id="copy_form">
                                <div class="row  form-group">
                                    <label for="inputJobTitle" class="form-label">Job Title*</label>
                                    <div class="col-12">
                                        <input type="text" name="job_title" value="{{ old('job_title', $experience->job_title) }}" required class="form-control form-input" placeholder="Ex: Project Manager" aria-label="Job Title">
                                        @error('job_title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCompany" class="form-label">Company*</label>
                                    <div class="col-12">
                                        <input type="text" name="company" value="{{ old('company', $experience->company) }}" required class="form-control form-input" placeholder="Ex: Abc Company Pvt. Ltd." aria-label="inputCompany">
                                        @error('company')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCountry" class="form-label">Country*</label>
                                    <div class="col-12">
                                        <select name="country_id" required class="form-select country-list select2_dropdown" aria-label="Default select example">
                                            <option value="">Select country</option>
                                            @forelse ($countries as $country)
                                            <option value="{{ $country->id }}" @if($country->id == old('country_id', $experience->country_id)) selected @endif>{{ $country->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('country_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCity" class="form-label">State</label>
                                    <div class="col-12">
                                        <select name="state_id" class="form-select state-list select2_dropdown" aria-label="Default select example">
                                            <option value="">Select state</option>
                                            @forelse ($states as $state)
                                            <option value="{{ $state->id }}" @if($state->id == $experience->state_id) selected @endif>{{ $state->name }}</option>
                                            @empty                                                
                                            @endforelse
                                        </select>
                                        @error('state_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="inputCity" class="form-label">City</label>
                                    <div class="col-12">
                                        <select name="city_id" class="form-select city-list select2_dropdown" aria-label="Default select example">
                                            <option value="">Select city</option>
                                            @forelse ($cities as $city)
                                            <option value="{{ $city->id }}" @if($city->id == $experience->city_id) selected @endif>{{ $city->city }}</option>
                                            @empty                                                
                                            @endforelse                                            
                                        </select>
                                        @error('city_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row  form-group">
                                    <label for="check" class="form-label">From*</label>
                                    <div class="col-md-6 mb-5 mb-lg-0 ">
                                        <select name="from_month" required class="form-select select2_dropdown" aria-label="Default select example">
                                            <option value="">Select month</option>
                                            @foreach (range(1, 12) as $month)
                                            <option value="{{ $month }}" @if($month == old('from_month', $experience->from_month)) selected @endif>{{ date('F', mktime(0,0,0,$month, 10)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('from_month')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 ">
                                        <select name="from_year" required class="form-select select2_dropdown" aria-label="Default select example">
                                            <option value="">Year</option>
                                            @foreach (range(0, 40) as $year)
                                            <option value='{{ date("Y", strtotime("-{$year} year")) }}' @if(date("Y",strtotime("-{$year} year"))==old('from_year', $experience->from_year)) selected @endif>{{ date("Y",strtotime("-{$year} year")) }}</option>
                                            @endforeach
                                        </select>
                                        @error('from_year')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div id="experience_to" class="@if($experience->is_work_here == 1) d-none @endif">
                                    <div class="row form-group">
                                        <label for="check" class="form-label">To</label>
                                        <div class="col-md-6 mb-5 mb-lg-0 ">
                                            <select name="to_month" class="form-select select2_dropdown" aria-label="Default select example">
                                                <option value="">Select month</option>
                                                @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}" @if($month==old('to_month', $experience->to_month)) selected @endif>{{ date('F', mktime(0,0,0,$month, 10)) }}</option>
                                                @endforeach
                                            </select>
                                            @error('to_month')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <select name="to_year" class="form-select select2_dropdown" aria-label="Default select example">
                                                <option value="">Select year</option>
                                                @foreach (range(0, 40) as $year)
                                                <option value='{{ date("Y", strtotime("-{$year} year")) }}' @if(date("Y",strtotime("-{$year} year"))==old('to_year', $experience->to_year)) selected @endif>{{ date("Y",strtotime("-{$year} year")) }}</option>
                                                @endforeach
                                            </select>
                                            @error('to_year')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label for="check" class="form-label time-period">Time Period</label>
                                        <div class="form-check">
                                            <input class="form-check-input is_work_here" type="checkbox" name="is_work_here" value="1" @if(old('is_work_here', $experience->is_work_here)==1) checked @endif id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                I currently work Here
                                            </label>
                                        </div>
                                        @error('is_work_here')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <label for="exampleFormControlTextarea1" class="form-label">Describe</label>
                                        <textarea name="describe" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Write some 2 or 3 lines in your achievements in this company.">{{ old('describe', $experience->describe) }}</textarea>
                                        @error('describe')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row btn-form-wrapper">
                                <div class=" d-grid col-sm-9">
                                    <input type="submit" class="btn  btn-primary btn-form" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection