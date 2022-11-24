@if(optional($employee->appliedJobs()->count()))
<section class="tools-section text-start  section-space">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class=" pt-0 card">
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
                                            <h4>{{ $vacancy->job_role }}</h4>
                                            <h5>{{ $vacancy->job_title }}</h4>
                                            <p>{{ $vacancy->description }}</p>
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
   @endif