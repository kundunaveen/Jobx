@extends('admin.dashboard.partials.layout')
@section('title')
    Admin | Dashboard
@endsection
@section('content')

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
                                    <h5>Hello {{ auth()->user()->full_name }} !</h5>
                                    <p>You have {{ $applied_jobs[0]->new_application_count }} new applications. </p>
                                    <a href="{{ route('admin.manageVacancy', ['status' => 'new-application']) }}">Review all</a>
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
                                        <span class="candidate-count">{{ $applied_jobs[0]->shortlisted_count }}</span>
                                    </article>
                                    <figure>
                                        <div class="blue_bg" role="progressbar" aria-valuenow="{{ ($applied_jobs[0]->shortlisted_count/$applied_job_count) * 100 }}" aria-valuemin="0" aria-valuemax="100" style="--value:{{ ($applied_jobs[0]->shortlisted_count / $applied_job_count) * 100 }}"></div>
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6 ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>On-Hold</h5>
                                        <span class="candidate-count">{{ $applied_jobs[0]->on_hold_count }}</span>
                                    </article>
                                    <figure>
                                        <div class="orange_bg" role="progressbar" aria-valuenow="{{ ($applied_jobs[0]->on_hold_count / $applied_job_count) * 100 }}" aria-valuemin="0" aria-valuemax="100" style="--value:{{ ($applied_jobs[0]->on_hold_count / $applied_job_count) * 100 }}"></div>
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  pe-lg-4 ">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Hired</h5>
                                        <span class="candidate-count">{{ $applied_jobs[0]->hired_count }}</span>
                                    </article>
                                    <figure>
                                        <div class="green_bg" role="progressbar" aria-valuenow="{{ ($applied_jobs[0]->hired_count/$applied_job_count) * 100 }}" aria-valuemin="0" aria-valuemax="100" style="--value:{{ ($applied_jobs[0]->hired_count / $applied_job_count) * 100 }}"></div>
                                    </figure>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-6  ps-lg-4">
                                <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <article>
                                        <h5>Rejected</h5>
                                        <span class="candidate-count">{{ $applied_jobs[0]->rejected_count }}</span>
                                    </article>
                                    <figure>
                                        <div class="red_bg" role="progressbar" aria-valuenow="{{ ($applied_jobs[0]->rejected_count/$applied_job_count) * 100 }}" aria-valuemin="0" aria-valuemax="100" style="--value:{{ ($applied_jobs[0]->rejected_count / $applied_job_count) * 100 }}"></div>
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
                                    </article>
                                    <figure>
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
                                <a href="{{url('/admin/manage-vacancy')}}">See all</a>
                                </div>
                                <ul class="list-group posted-list">
                                @forelse ($posted_vacancies as $posted_vacancy)
                                    <li class="list-group-item d-flex align-items-center justify-content-between">
                                        <h5>{{ $posted_vacancy->job_role }}</h5>
                                        <div class="pause-share-wrapper">
                                            <a href="{{ route('admin.editVacancy', $posted_vacancy->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                    </svg>
                                            </a>
                                        </div>
                                    </li>
                                @empty
                                <li class="list-group-item d-flex align-items-center justify-content-between">
                                    Vacancy not found!
                                </li>
                                @endforelse    
                                </ul>
                            </div>
                        </div>
    
                        <div class="card applicant-wrapper">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                <h4>New Applicants</h4>
                                <a href="{{ route('admin.manageVacancy', ['status' => 'new-application']) }}">See all</a>
                                </div>
                                <ul class="list-group applicants-list">
                                @forelse ($new_applications as $new_application)
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    <div class="d-flex align-items-center">
                                        <figure>
                                            <img src="{{ optional($new_application->user)->profile_image_url }}" width="51" height="51" alt=""
                                            class="round-image-class">
                                        </figure>
                                        <article>
                                            <h5>{{ optional($new_application->user)->full_name }}</h5>
                                            <span class="designation">{{ optional($new_application->user)->profile_current_job_title }}</span>
                                        </article>
                                    </div>
                                    <div class="phone-email-wrapper">
                                        <a href="{{ route('admin.editEmployee', optional($new_application->loadMissing('user')->user)->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                    </svg>
                                        </a>
                                    </div>
                                </li>
                                @empty
                                <li class="list-group-item d-flex align-items-center justify-content-between ">
                                    No New Applicant found!
                                </li>
                                @endforelse                                
                                </ul>
                            </div>
                        </div>
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
      datasets: [{
         data: data,
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
