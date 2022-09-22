@extends('admin.dashboard.partials.layout')
@section('title')
    Admin | Manage Master Attribute
@endsection
@section('content')

    <section class="dashboard-section inner-login-shape">
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-12">
                    <!-- <div class="card recruiter-section">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                <article class="recruiter-article">
                                    <h5>Hello Recruiter!</h5>
                                    <p>You have 10 new applications. </p>
                                    <a href="javascript:void(0)">Review all</a>
                                </article>
                                </div>
                                <div class="col-md-5">
                                <figure class="dashboard-girl-img text-sm-center">
                                    <img src="{{asset('assets/images/girls-img.png')}}" width="276" height="298" alt=""
                                        class="img-fluid" />
                                </figure>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="candidate-count-wrapper">
                        <div class="row">
                            <div class="col-md-6 pe-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Shortlisted</h5>
                                        <span class="candidate-count">12.2K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-1.png')}}" width="85" height="85" alt=""
                                            class="img-fluid" />
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6 ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>On-Hold</h5>
                                        <span class="candidate-count">10.5K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-2.png')}}" width="85" height="85" alt="" />
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  pe-lg-4 ">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Hired</h5>
                                        <span class="candidate-count">12.2K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-3.png')}}" width="85" height="85" alt="" />
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Rejected</h5>
                                        <span class="candidate-count">9.2K</span>
                                    </article>
                                    <figure>
                                        <img src="{{asset('assets/images/progress-1.png')}}" width="85" height="85" alt="" />
                                    </figure>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="dashboard-graph-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card active-wrapper">
                                <div class="card-header">
                                    <div class="row justify-content-between">
                                        <h3 class="card-title col-auto mt-2">Add Master Attribute</h3>
                                        <a class="col-auto btn btn-primary" href="{{ route('admin.manageAttribute') }}" style="margin-right:10px !important">Back</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="row"> 
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Attribute Category <span class="text-danger">*</span></label>
                                                <select class="form-control categories" name="category" required>
                                                    @foreach($attrCategories as $category)
                                                    <option {{$category->id == $attribute->masterCategory->id ? 'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label">Attribute Value <span class="text-danger">*</span></label>
                                                <input type="text" name="value" value="{{$attribute->value}}" class="form-control @error('value') is-invalid @enderror" required>
                                                @error('value')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 row justify-content-between"> 
                                            <div class="form-group col-auto">
                                            </div>
                                            <div class="form-group col-auto">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="dashboard-graph-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card active-wrapper">
                                    <div class="card-header">
                                        <h3 class="card-title col-auto mt-2">Available Values</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" id="employee_table">
                                            <thead>
                                                <tr>
                                                    <th>Sr. no.</th>
                                                    <th>Category</th>
                                                    <th>Attribute Value</th>
                                                </tr>
                                            </thead>
                                            <tbody class="available_values">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="col-xxl-4">
                    <aside class="aside-right">
                        <div class="card posted-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>Posted Vacancies</h4>
                                <a href="javascript:void(0)">See all</a>
                                </div>
                                <ul class="list-group posted-list">
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>Front End Developer</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
    
                                </ul>
                            </div>
                        </div>
    
                        <div class="card applicant-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>New Applicants</h4>
                                <a href="javascript:void(0)">See all</a>
                                </div>
                                <ul class="list-group applicants-list">
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>John Doe</h5>
                                            <span class="designation">Front End Developer</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="card activity-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>Activity</h4>
                                <a href="javascript:void(0)" class="notify-icon"><span class="pause-btn"></span><i class="icon-notify"></i></span><span class="notify-count">0</span></a>
                                </div>
                                <ul class="list-group activity-list">
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <figure>
                                            <span class="spriteicon"><i class="plan-expire"></i></span>
                                        </figure>
                                        <article>
                                            <p class="mb-0 text-underline">Your plan expires in <span>3 days</span>.</p>
                                            <a href="javascript:void(0)">Renew now</a>
                                        </article>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <figure>
                                            <span class="spriteicon"><i class="applictaion"></i></span>
                                        </figure>
                                        <article>
                                            <p class="mb-0 text-underline">There are <span>3 new appplications</span> to
                                            <span>iOS Developer</span>.
                                            </p>
                                        </article>
                                    </div>
                                </li>
    
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <figure>
                                            <span class="spriteicon"><i class="closed"></i></span>
                                        </figure>
                                        <article>
                                            <p class="">Your teammate, <span>Sammy</span> has closed
                                            the job post of <span>UI/UX Designer</span> </p>
                                        </article>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    </div> -->
                </div>
            </div>
        </div>
    
    </section>
@endsection
