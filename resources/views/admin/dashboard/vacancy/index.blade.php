@extends('admin.dashboard.partials.layout')
@section('title')
    Admin | Manage Vacancies
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
                                        <h3 class="card-title col-auto mt-2">Vacancies</h3>
                                        <a class="col-auto btn btn-primary" href="{{ route('admin.addVacancy') }}" style="margin-right:10px !important">Add Vacancy</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                <table class="table" id="employee_table">
                                <thead>
                                    <tr>
                                        <th>Sr. no.</th>
                                        <th>Job Title</th>
                                        <th>Company Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($vacancies as $index => $vacancy)
                                    <tr>
                                        <td>{{ $index + 1}}</td>
                                        <td>{{$vacancy->job_title}}</td>
                                        <td>{{$vacancy->user->profile->company_name}}</td>
                                        <td>{{$vacancy->user->email}}</td>
                                        <td>
                                            <a href="{{ route('admin.editVacancy', $vacancy->id) }}" title="edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>

                                            
                                            <a href="javascript:void(0)" onclick="deleteVacancy('{{$vacancy->id}}')" title="delete" class="text-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </a>
                                        
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
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
