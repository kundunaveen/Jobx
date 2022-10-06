@extends('employer.profile.partials.layout')
@section('content')

<main class="main-bg inner-login-shape employer-form-page">
        <section class="form-inner-wrapper">
            <div class="container ">
                <div class="form-wrapper card">
                    <!-- <div class="progress" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <form class="form-inner" method="POST">
                        @csrf
                        <h2 class="form-heading">Profile Details</h2>
                        <div class="row form-group">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <label for="inputName4" class="form-label">First Name*</label>
                                <input type="text" class="form-control form-input" name="first_name" value="{{$employer->first_name}}" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName4" class="form-label">Last Name*</label>
                                <input type="text" class="form-control form-input" name="last_name" value="{{$employer->last_name}}" placeholder="Last name"
                                    aria-label="Last name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <div class="col-12">
                                <input type="email" class="form-control form-input"
                                    placeholder="Enter your Email address" readonly disabled value="{{$employer->email}}" id="inputEmail4">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Phone Number</label>
                            <div class="col-12">
                                <input type="number" name="contact" class="form-control form-input" value="{{$employer->contact}}" placeholder="Phone Number"
                                    aria-label="Phone Number">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputPhone" class="form-label">Gender</label>
                            <div class="col-12">
                                <select name="industry" class="form-select" aria-label="Default select example">
                                    <option selected>Gender</option>
                                    @foreach($genders as $gender)
                                    <option {{$gender->id == $employer->profile->gender ? 'selected':''}} value="{{$gender->id}}">{{$gender->value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h2 class="form-heading">Company Details</h2>
                        <div class="row form-group">
                            <label for="inputCompanyName" class="form-label">Company Name*</label>
                            <div class="col-12">
                                <input type="text" name="company_name" class="form-control form-input" value="{{$employer->profile->company_name}}" placeholder="Enter your Company Name"
                                    aria-label="Company Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="inputType" class="form-label">Type*</label>
                            <div class="col-12">
                                <select name="industry" class="form-select" aria-label="Default select example">
                                    <option selected>Enter your industry</option>
                                    @foreach($industries as $industry)
                                    <option {{$industry->id == $employer->profile->industry_type_id ? 'selected':''}} value="{{$industry->id}}">{{$industry->value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- <div class="row form-group">
                            <label for="inputTitle" class="form-label">Title*</label>
                            <div class="col-12">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Enter your title</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="row form-group">
                            <div class="col-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Describe*</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5">{{$employer->profile->description}}</textarea>
                        </div>
                        </div>

                        <h2 class="form-heading">Company Location</h2>
                        <div class="row form-group">
                            <label for="check" class="form-label">Country*</label>
                            <div class="col-12">
                                <select name="country" class="form-select" aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($countries as $country)
                                    <option {{$country->id == $employer->profile->country ? 'selected': ''}} value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">State*</label>
                            <div class="col-12">
                                <select name="state" class="form-select " aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($states as $state)
                                    <option {{$state->id == $employer->profile->state ? 'selected': ''}} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">City*</label>
                            <div class="col-12">
                                <select name="city" class="form-select " aria-label="Default select example">
                                    <option selected> </option>
                                    @foreach($cities as $city)
                                    <option {{$city->id == $employer->profile->city ? 'selected' : ''}} value="{{$city->id}}">{{$city->city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Zip*</label>
                            <div class="col-12">
                                <input type="number" name="zip" class="form-control form-input" value="{{$employer->profile->zip}}" placeholder="Zip Code"
                                    aria-label="Zip Code">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="check" class="form-label">Location*</label>
                            <div class="col-12">
                            <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="5">{{$employer->profile->address}}</textarea>
                            </div>
                        </div>
                        <div class="row btn-form-wrapper">
                            <div class=" d-grid col-sm-9">
                                <input type="submit" class="btn  btn-primary btn-form" value="Publish">
                            </div>
                            <div class="col-sm-3  text-center text-sm-end">
                                <input type="reset" class="btn py-3 px-0 bg-transparent  fw-bold btn-skip" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main> 

@endsection