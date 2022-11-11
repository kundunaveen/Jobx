@extends('employer.dashboard.partials.layout')
@section('title')
    Employer | Dashboard
@endsection
@section('content')
    <style>
        @keyframes growProgressBar {
        0%, 33% { --pgPercentage: 0; }
        100% { --pgPercentage: var(--value); }
        }

        @property --pgPercentage {
        syntax: '<number>';
        inherits: false;
        initial-value: 0;
        }

        div[role="progressbar"] {
        --size: 4.75rem;
        --fg: #369;
        --bg: #def;
        --pgPercentage: var(--value);
        animation: growProgressBar 3s 1 forwards;
        width: var(--size);
        height: var(--size);
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: 
            radial-gradient(closest-side, white 80%, transparent 0 99.9%, white 0),
            conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0)
            ;
        font-family: Helvetica, Arial, sans-serif;
        font-size: calc(var(--size) / 5);
        color: var(--fg);
        }

        div[role="progressbar"]::before {
        counter-reset: percentage var(--value);
        content: counter(percentage) '%';
        }
    </style>
    
    <section class="dashboard-section inner-login-shape">
       
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-8">
                    <div class="card recruiter-section">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                <article class="recruiter-article">
                                    <h5>Hello Recruiter!</h5>
                                    <p>You have {{count($applications)}} new applications. </p>
                                    <a href="{{ url('/employer/applicants') }}">Review all</a>
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
                    </div>
                    <div class="candidate-count-wrapper">
                        <div class="row">
                            <div class="col-md-6 pe-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Shortlisted</h5>
                                        <span class="candidate-count">{{$shortlisted}}</span>
                                    </article>
                                    <figure>
                                    <div role="progressbar" aria-valuenow="{{$allApp > 0 ? (($shortlisted/$allApp)*100) : 0}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{($shortlisted/$allApp)*100}}"></div>
                                    <!--<img src="{{asset('assets/images/progress-1.png')}}" width="85" height="85" alt=""
                                            class="img-fluid" />-->
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6 ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>On-Hold</h5>
                                        <span class="candidate-count">{{$hold}}</span>
                                    </article>
                                    <figure>
                                    <div style="--fg:orange" role="progressbar" aria-valuenow="{{$allApp > 0 ? (($hold/$allApp)*100) : 0}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{($hold/$allApp)*100}}"></div>
                                    <!--<img src="{{asset('assets/images/progress-2.png')}}" width="85" height="85" alt="" />-->
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  pe-lg-4 ">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Hired</h5>
                                        <span class="candidate-count">{{$hired}}</span>
                                    </article>
                                    <figure>
                                        <div role="progressbar" style="--fg:green" aria-valuenow="{{$allApp > 0 ? (($hired/$allApp)*100) : 0}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{($hired/$allApp)*100}}"></div>
                                        <!--<img src="{{asset('assets/images/progress-3.png')}}" width="85" height="85" alt="" />-->
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Rejected</h5>
                                        <span class="candidate-count">{{$rejected}}</span>
                                    </article>
                                    <figure>
                                    <div role="progressbar" style="--fg:teal" aria-valuenow="{{$allApp > 0 ? (($rejected/$allApp)*100) : 0}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{($rejected/$allApp)*100}}"></div>
                                    <!--<img src="{{asset('assets/images/progress-1.png')}}" width="85" height="85" alt="" />-->
                                    </figure>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-graph-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card active-wrapper">
                                <div class="card-body">
                                    <article class="d-flex align-items-center justify-content-between">
                                        <h4>Top Active Jobs</h4>
                                        <a href="javascript:void(0)">Last Week</a>
                                    </article>
                                    <figure>    
                                        <!-- <img src="{{asset('assets/images/graph-img.png')}}" width="869" height="516" alt="" class="img-fluid" /> -->
                                            <canvas class="col-12" id="employer_chart"></canvas>
                                    </figure>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-xxl-4">
                    <aside class="aside-right">
                        <div class="card posted-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>Posted Vacancies</h4>
                                <a href="{{url('/employer/posted-jobs')}}">See all</a>
                                </div>
                                <ul class="list-group posted-list">
                                @forelse($postedJobs as $job)
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <h5>{{$job->job_role}}</h5>
                                    <div class="pause-share-wrapper">
                                        <a href="javascript:void(0)"><span class="pause-btn"><i class="icon-pause"></i></span></a> 
                                        <a href="javascript:void(0)"><span class="share-btn"><i class="icon-share"></i></span></a>
                                    </div>
                                </li>
                                @empty
                                No jobs have been posted yet.
                                @endforelse
    
                                </ul>
                            </div>
                        </div>
    
                        <div class="card applicant-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>New Applicants</h4>
                                <a href="{{url('/employer/new-applicants')}}">See all</a>
                                </div>
                                <ul class="list-group applicants-list">
                                @forelse($applications as $application)
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{asset('assets/images/user-img.png')}}" width="51" height="51" alt=""
                                            class="img-fluid">
                                        </figure>
                                        <article>
                                            <h5>{{$application->user->first_name.' '.$application->user->last_name}}</h5>
                                            <span class="designation">{{$application->user->profile->current_job_title}}</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="tel:8888888888"><span class="phone-btn"><i class="icon-phone"></i></span></a>
                                        <a href="mailto:123@gmail.com"><span class="email-btn"><i class="icon-email"></i></span></a>
                                    </div>
                                </li>
                                @empty
                                No new applicants yet
                                @endforelse
                                </ul>
                            </div>
                        </div>
    
                        <!-- <div class="card activity-wrapper">
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
                        </div> -->
                    </aside>
                    </div>
                </div>
            </div>
        </div>
    
    </section>
@endsection

@section('scripts')
<script>
    let labels = [];
    let data = [];
<?php foreach($date_arr as $index => $data) {?>
    labels.push('{{$index}}')
    data.push('{{$data}}')
<?php }?>
var ctx = document.getElementById('employer_chart').getContext('2d');
var myChart = new Chart(ctx, {
   type: 'line',
   data: {
      labels: labels,
    //   labels: ['January', 'February', 'March', 'April', 'May'],
      datasets: [{
         data: data,
        //  data: [10, 20, 5, 40, 35],
        //  backgroundColor: ['#30799f', '#ac51c3', '#4ba57b', '#e3297d', '#e35c32'],
        //  borderColor: ['#30799f', '#ac51c3', '#4ba57b', '#e3297d', '#e35c32'],
         borderWidth: 1
      }]
   },
   options: {
    bezierCurve : true,
      responsive: false,
      scales: {
         xAxes: [{
         }],
         yAxes: [{
            ticks: {
               beginAtZero: true,
            //    stepSize: 1
            },
            scaleLabel: {
                display: true,
                labelString: 'Number of jobs'
            }
         }]
      },
      legend: {
         display: false
      },
      tooltips: {
         callbacks: {
            title: function(t, d) {
               return d.labels[t[0].index];
            }
         }
      }
   }
});
</script>
@endsection
