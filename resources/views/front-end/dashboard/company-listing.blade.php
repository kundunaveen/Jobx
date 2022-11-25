@extends('front-end.partials.layout')
@section('title')
    Jobax
@endsection
@section('content')
<section class="banner-section job-listing-banner inner-banner main-banner-section">
      <div class="container">
         <div class="row">
            <div class="banner-section-wrapper">
               <div class="banner-form">
               @include('front-end.includes.job_filter_form')
               </div>
            </div>
         </div>
         {{--
         <div class="d-flex align-items-center flex-wrap">
            <ul class="form-filter-list list-group d-flex flex-md-row me-md-3">
               <li class="list-group-item border-0"><a href="javascript:void(0)">UX Designer</a></li>
               <li class="list-group-item"><a href="javascript:void(0)">UI Designer</a></li>
               <li class="list-group-item border-0"><a href="javascript:void(0)">Front End Developer</a></li>
               <li class="list-group-item border-0">
                  <div class="form-btn-wrapper">
                     <a href="javascript:void(0)" class="text-underline">Clear Filter</a>
                  </div>
               </li>
            </ul>
         </div>
         --}}
      </div>
   </section>
   <!-- Main Banner End Here -->
   <!--========= Main Content End Here =========-->
   <main class="profile-main-wrapper">
      <!-- Section Start Here-->
      <section class="company-listing-wrapper">
         <div class="container">
            <div class="card">
               <div class="card-body">
                  <form method="GET" action="{{ route('companies') }}">
                     <div class="row">
                        <div class="col-lg-2 col-md-3">
                           @include('front-end.dashboard.includes.industries_sidebar')
                        </div>
                        <div class="col-lg-10 col-md-9">
                           <section class="Company-listing-section">
                              <div class="text-end">
                              @if(request()->except('credit_card'))                              
                              <div class="search-advance">
                                 <a href="{{ route('companies') }}"><u>Clear Filter</u></a>
                              </div>
                              @endif
                                 <button type="submit" class="btn btn-primary">
                                    <span class="spriteicon"><i class="filter-icon"></i></span>Filter
                                 </button>
                              </div>
                              <div class="table-wrapper table-responsive">
                                 <table class="table align-middle">
                                    <thead>
                                       <tr>
                                          <th scope="col">
                                             <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                   id="flexCheckDefault">
                                             </div>
                                          </th>                                       
                                          <th scope="col">Companies Name</th>
                                          <th scope="col">Owner</th>
                                          <th scope="col">Rating Count</th>
                                          <th scope="col">Rate</th>
                                          <th scope="col">More</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @forelse($employers as $employer)
                                       <tr>
                                          <td>
                                             <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                             </div>
                                          </td>
                                          <td>
                                             <a href="javascript:void(0)" class="d-flex align-items-center">
                                                <figure>
                                                   <img src="{{ optional($employer->profile)->profile_image_url }}" width="51" height="50" class="img-fluid" alt="">
                                                </figure>
                                                <article>
                                                   <p class="mb-0">
                                                      {{ \Illuminate\Support\Str::limit(optional($employer->profile)->company_name, 20, '...') ?? 'NA' }}
                                                   </p>
                                                   <span>{{ optional($employer->profile)->website_link ?? 'NA' }}</span>
                                                </article>
                                             </a>
                                          </td>
                                          <td>{{ ucwords($employer->full_name) }}</td>
                                          <td class="text-center">{{ $employer->company_ratings_count }}</td>
                                          <td>
                                             <div class="d-flex  align-items-center">
                                                {{--
                                                <div class="star-rating me-2">
                                                   <input type="radio" id="5-stars" name="rating" value="5" />
                                                   <label for="5-stars" class="star">&#9733;</label>
                                                   <input type="radio" id="4-stars" name="rating" value="4" />
                                                   <label for="4-stars" class="star">&#9733;</label>
                                                   <input type="radio" id="3-stars" name="rating" value="3" />
                                                   <label for="3-stars" class="star">&#9733;</label>
                                                   <input type="radio" id="2-stars" name="rating" value="2" />
                                                   <label for="2-stars" class="star">&#9733;</label>
                                                   <input type="radio" id="1-star" name="rating" value="1" />
                                                   <label for="1-star" class="star">&#9733;</label>
                                                </div>
                                                --}}
                                                <x-review.company :company-id="$employer->id"/>
                                                <div>
                                                   <span>
                                                      {{ number_format($employer->company_ratings_avg_rating) }}
                                                      @if($employer->company_ratings_avg_rating > 1)
                                                         Stars
                                                      @else
                                                         Star
                                                      @endif
                                                      
                                                   </span>
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             <a href="{{ route('company-show', $employer->id) }}" title="View details">
                                                <i class="icon-view-eye"></i>
                                             </a>
                                          </td>
                                       </tr>
                                       @empty
                                       <tr>
                                          <td colspan="100%" class="text-center">No data found</td>
                                       </tr>
                                       @endforelse                                    
                                    </tbody>
                                 </table>
                              </div>                              
                              {{ $employers->appends($_GET)->links() }}
                           </section>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
      </section>
      <!-- Section Start Here-->
   </main>
@endsection
