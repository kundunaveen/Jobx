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
                  <form>
                     <div class="row">
                        <div class="col-lg-4 mb-4 mb-lg-0">
                           <label>What kind of work?</label>
                           <div class="input-group">
                              <span class="input-group-text">
                                 <i class="form-icon icon-keywords"></i>
                              </span>
                              <input type="text" class="form-control" placeholder="Keywords" />
                           </div>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0">
                           <label>True?</label>
                           <div class="input-group">
                              <span class="input-group-text">
                                 <i class="form-icon icon-location"></i>
                              </span>
                              <input type="text" class="form-control" placeholder="Location" />
                              <select class="form-select">
                                 <option value="1">30KM</option>
                                 <option value="1">40KM</option>
                                 <option value="1">50KM</option>
                                 <option value="1">60KM</option>
                                 <option value="1">70KM</option>
                              </select>
                           </div>
                        </div>
                        <div class=" col-lg-4">
                           <button class="btn btn-lg search-btn" type="button">Search
                              Vacancies</button>
                           <div class="search-advance">
                              <ul class="col-md-auto">
                                 <li class="text-end"><a href="javascript:void(0)">Advance Search </a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
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
                  <div class="row">
                     <div class="col-lg-2 col-md-3">
                        <aside class="company-listing-aside">
                           <h4 class="">Companies List</h4>
                           <div class="aside-filter">
                              <div class="accordion" id="accordionPanelsStayOpenExample">

                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                       <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                          data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                          aria-controls="panelsStayOpen-collapseOne">
                                          Companies Type
                                       </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                       aria-labelledby="panelsStayOpen-headingOne">
                                       <div class="accordion-body p-0">
                                          <ul class="list-group">
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check1">
                                                <label class="form-check-label" for="Check1">IT & Service</label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check2">
                                                <label class="form-check-label" for="Check2">B2B</label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check3">
                                                <label class="form-check-label" for="Check3">Real Estate</label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check4">
                                                <label class="form-check-label" for="Check4">Daily Used</label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check5">
                                                <label class="form-check-label" for="Check5">Gaming </label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check6">
                                                <label class="form-check-label" for="Check6">Aeroplane </label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check7">
                                                <label class="form-check-label" for="Check7">Service </label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check8">
                                                <label class="form-check-label" for="Check8">Agency</label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check9">
                                                <label class="form-check-label" for="Check9">Transportation</label>
                                             </li>
                                             <li class="list-group-item">
                                                <input type="checkbox" class="form-check-input" id="Check10">
                                                <label class="form-check-label" for="Check10">Entertainment</label>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                       <button class="accordion-button collapsed" type="button"
                                          data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                          aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                          Star Value
                                       </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                       aria-labelledby="panelsStayOpen-headingTwo">
                                       <div class="accordion-body p-0">
                                          <ul class="list-group list-style-none">
                                             <li class="list-group-item">
                                                <div class="d-flex">
                                                   <div class="star-rating me-2">
                                                      <input type="radio" id="5-stars1" name="rating" value="5" />
                                                      <label for="5-stars1" class="star">&#9733;</label>
                                                      <input type="radio" id="4-stars2" name="rating" value="4" />
                                                      <label for="4-stars2" class="star">&#9733;</label>
                                                      <input type="radio" id="3-stars3" name="rating" value="3" />
                                                      <label for="3-stars3" class="star">&#9733;</label>
                                                      <input type="radio" id="2-stars4" name="rating" value="2" />
                                                      <label for="2-stars4" class="star">&#9733;</label>
                                                      <input type="radio" id="1-star5" name="rating" value="1" />
                                                      <label for="1-star5" class="star">&#9733;</label>
                                                   </div>
                                                   <div>
                                                      <span>4 Stars</span>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="list-group-item">
                                                <div class="d-flex">
                                                   <div class="star-rating me-2">
                                                      <input type="radio" id="5-stars6" name="rating" value="5" />
                                                      <label for="5-stars6" class="star">&#9733;</label>
                                                      <input type="radio" id="4-stars7" name="rating" value="4" />
                                                      <label for="4-stars7" class="star">&#9733;</label>
                                                      <input type="radio" id="3-stars8" name="rating" value="3" />
                                                      <label for="3-stars8" class="star">&#9733;</label>
                                                      <input type="radio" id="2-stars9" name="rating" value="2" />
                                                      <label for="2-stars9" class="star">&#9733;</label>
                                                      <input type="radio" id="1-star10" name="rating" value="1" />
                                                      <label for="1-star10" class="star">&#9733;</label>
                                                   </div>
                                                   <div>
                                                      <span>4 Stars</span>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="list-group-item">
                                                <div class="d-flex">
                                                   <div class="star-rating me-2">
                                                      <input type="radio" id="5-stars11" name="rating" value="5" />
                                                      <label for="5-stars11" class="star">&#9733;</label>
                                                      <input type="radio" id="4-stars12" name="rating" value="4" />
                                                      <label for="4-stars12" class="star">&#9733;</label>
                                                      <input type="radio" id="3-stars13" name="rating" value="3" />
                                                      <label for="3-stars13" class="star">&#9733;</label>
                                                      <input type="radio" id="2-stars14" name="rating" value="2" />
                                                      <label for="2-stars14" class="star">&#9733;</label>
                                                      <input type="radio" id="1-star15" name="rating" value="1" />
                                                      <label for="1-star15" class="star">&#9733;</label>
                                                   </div>
                                                   <div>
                                                      <span>4 Stars</span>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="list-group-item">
                                                <div class="d-flex">
                                                   <div class="star-rating me-2">
                                                      <input type="radio" id="5-stars16" name="rating" value="5" />
                                                      <label for="5-stars16" class="star">&#9733;</label>
                                                      <input type="radio" id="4-stars17" name="rating" value="4" />
                                                      <label for="4-stars17" class="star">&#9733;</label>
                                                      <input type="radio" id="3-stars18" name="rating" value="3" />
                                                      <label for="3-stars18" class="star">&#9733;</label>
                                                      <input type="radio" id="2-stars19" name="rating" value="2" />
                                                      <label for="2-stars19" class="star">&#9733;</label>
                                                      <input type="radio" id="1-star20" name="rating" value="1" />
                                                      <label for="1-star20" class="star">&#9733;</label>
                                                   </div>
                                                   <div>
                                                      <span>4 Stars</span>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="list-group-item">
                                                <div class="d-flex">
                                                   <div class="star-rating me-2">
                                                      <input type="radio" id="5-stars21" name="rating" value="5" />
                                                      <label for="5-stars21" class="star">&#9733;</label>
                                                      <input type="radio" id="4-stars22" name="rating" value="4" />
                                                      <label for="4-stars22" class="star">&#9733;</label>
                                                      <input type="radio" id="3-stars23" name="rating" value="3" />
                                                      <label for="3-stars23" class="star">&#9733;</label>
                                                      <input type="radio" id="2-stars24" name="rating" value="2" />
                                                      <label for="2-stars24" class="star">&#9733;</label>
                                                      <input type="radio" id="1-star25" name="rating" value="1" />
                                                      <label for="1-star25" class="star">&#9733;</label>
                                                   </div>
                                                   <div>
                                                      <span>4 Stars</span>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </aside>
                     </div>
                     <div class="col-lg-10 col-md-9">
                        <section class="Company-listing-section">
                           <div class="text-end">
                              <button type="button" class="btn btn-primary"><span class="spriteicon"><i class="filter-icon"></i></span>Filter</button>
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
                                       <th scope="col">Score Total</th>
                                       <th scope="col">Rate</th>
                                       <th scope="col">More</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($employers as $employer)
                                    @if($employer->profile && isset($employer->profile->company_name))
                                    <tr>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" class="d-flex align-items-center">
                                             <figure>
                                                <img src="assets/images/google-circle.png" width="51" height="50"
                                                   class="img-fluid" alt="">
                                             </figure>
                                             <article>
                                                <p class="mb-0">{{$employer->profile->company_name}}</p>
                                                <span>Google.com</span>
                                             </article>
                                          </a>
                                       </td>
                                       <td>{{ucwords($employer->first_name.' '.$employer->last_name)}}</td>
                                       <td>710.68</td>
                                       <td>
                                          <div class="d-flex  align-items-center">
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
                                             <div>
                                                <span>4 Stars</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td><a href="javascript:void(0)"><i class="icon-view-eye"></i></a></td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <!-- <tr>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" class="d-flex align-items-center">
                                             <figure>
                                                <img src="assets/images/apple.png" width="51" height="50"
                                                   class="img-fluid" alt="">
                                             </figure>
                                             <article>
                                                <p class="mb-0">Apple</p>
                                                <span>apple.com</span>
                                             </article>
                                          </a>
                                       </td>
                                       <td>Theresa Webb</td>
                                       <td>948.55</td>
                                       <td>
                                          <div class="d-flex  align-items-center">
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
                                             <div>
                                                <span>4 Stars</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td><a href="javascript:void(0)"><i class="icon-view-eye"></i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" class="d-flex align-items-center">
                                             <figure>
                                                <img src="assets/images/drop-box.png" width="51" height="50"
                                                   class="img-fluid" alt="">
                                             </figure>
                                             <article>
                                                <p class="mb-0">Drop Box</p>
                                                <span>Dropbox.com</span>
                                             </article>
                                          </a>
                                       </td>
                                       <td>Arlene McCoy</td>
                                       <td>475.22</td>
                                       <td>
                                          <div class="d-flex  align-items-center">
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
                                             <div>
                                                <span>4 Stars</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td><a href="javascript:void(0)"><i class="icon-view-eye"></i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" class="d-flex align-items-center">
                                             <figure>
                                                <img src="assets/images/yahoo.png" width="51" height="50"
                                                   class="img-fluid" alt="">
                                             </figure>
                                             <article>
                                                <p class="mb-0">Yahoo</p>
                                                <span>yahoo.com</span>
                                             </article>
                                          </a>
                                       </td>
                                       <td>Jacob Jones</td>
                                       <td>739.65</td>
                                       <td>
                                          <div class="d-flex  align-items-center">
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
                                             <div>
                                                <span>4 Stars</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td><a href="javascript:void(0)"><i class="icon-view-eye"></i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" class="d-flex align-items-center">
                                             <figure>
                                                <img src="assets/images/air-bnb.png" width="51" height="50"
                                                   class="img-fluid" alt="">
                                             </figure>
                                             <article>
                                                <p class="mb-0">Air BnB</p>
                                                <span>AirBnB.com</span>
                                             </article>
                                          </a>
                                       </td>
                                       <td>Jerome Bell</td>
                                       <td>490.51</td>
                                       <td>
                                          <div class="d-flex  align-items-center">
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
                                             <div>
                                                <span>4 Stars</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td><a href="javascript:void(0)"><i class="icon-view-eye"></i></a></td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                          </div>
                                       </td>
                                       <td>
                                          <a href="javascript:void(0)" class="d-flex align-items-center">
                                             <figure>
                                                <img src="assets/images/volks.png" width="51" height="50"
                                                   class="img-fluid" alt="">
                                             </figure>
                                             <article>
                                                <p class="mb-0">volkswagen</p>
                                                <span>volkswagen.com</span>
                                             </article>
                                          </a>
                                       </td>
                                       <td>Theresa Webb</td>
                                       <td>475.22</td>
                                       <td>
                                          <div class="d-flex  align-items-center">
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
                                             <div>
                                                <span>4 Stars</span>
                                             </div>
                                          </div>
                                       </td>
                                       <td><a href="javascript:void(0)"><i class="icon-view-eye"></i></a></td>
                                    </tr> -->
                                 </tbody>
                              </table>
                           </div>
                           
                        </section>
                     </div>
                  </div>
               </div>
            </div>
      </section>
      <!-- Section Start Here-->
   </main>
@endsection
