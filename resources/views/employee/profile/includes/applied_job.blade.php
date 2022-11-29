@if(optional($employee->appliedJobs()->count()))
<section class="tools-section text-start section-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h4>Your Applied Jobs</h4>
                </div>
                <div class="pt-0">
                    <div class="card-body p-5">
                        <div class="owl-carousel owl-theme">
                            @forelse ($employee->loadMissing('appliedJobs')->appliedJobs as $appliedJobs)
                            @if($vacancy = $appliedJobs->loadMissing('vacancy')->vacancy)
                            <div class="item">
                                <div class="card slider_image">
                                    <div class="card-body">
                                        <figure class="job-profile-figure d-flex align-items-center justify-content-between">
                                            <img src="{{ $vacancy->single_image }}" title="{{ $vacancy->job_title }}" class="img-fluid">
                                        </figure>
                                        <article>
                                            <h4>
                                                {{ \Illuminate\Support\Str::limit($vacancy->job_role, 20, '...') }}
                                            </h4>
                                            <h5>
                                                {{ \Illuminate\Support\Str::limit($vacancy->job_title, 30, '...') }}
                                            </h4>
                                            <p>
                                                {{ \Illuminate\Support\Str::limit($vacancy->description, 30, '...') }}
                                            </p>
                                        </article>
                                        <div class="job-btn-wrapper d-flex justify-content-between">
                                            <a href="{{route('employee.job.preview', $vacancy->id)}}" class="btn btn-default btn-md">view Job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@else
<h5>You have not applied any job. if you want to apply job <a href="{{ route('search.job') }}"><u>click here</u></a>.</h5>
@endif