@extends('front-end.partials.layout')
@section('title', 'About Us')
@section('content')
<main class="employer-main-wrapper section-space about_page_section">
      <!-- Profile Section Start Here-->
      <section class="employer-video-section section-space">
         <div class="container">
            <div class="card">
               <div class="card-body p-0">
                  <div class="row align-items-center">
                     <div class="col-md-5 col-sm-12 video_div">
                        <div class="video-wrapper position-relative">
                              <img src="{{ asset('assets/images/emp-video-img.png') }}" width="1502" height="664" alt="video img"
                              class="img-fluid video-one-img" />
                           <div class="video-btn position-absolute top-50 start-50 translate-middle">
                              <a href="javascript:void(0)" class="d-inline-block"><span
                                    class="arrow-right d-inline-block"></span></a>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-7 col-sm-12 video_div">
                        <article class="profile-summary">
                           <h2 class="d-flex justify-content-between  mb-4">Explanation about <br /> Visual
                              Vacancies
                           </h2>
                           <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              Lorem
                              Ipsum has
                              been the industry's standard dummy text ever since the 1500s, when an unknown printer took
                              a
                              galley of type and scrambled it to make a type specimen book. It has survived not only
                              five
                              centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                              It
                              was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                              passages, and more recently with desktop publishing software like Aldus PageMaker
                              including
                              versions of Lorem Ipsum.</p>

                           <p class="mb-0">
                              Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece
                              of
                              classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,
                              a
                              Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
                              Latin words, consectetur.</p>
                        </article>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Profile Section End Here-->
      <!-- Content Section Start Here -->
      <section class=" emp-content-section section-space">
         <div class="container">
            <div class="card">
               <div class="card-body">
                  <div class="row align-items-center">
                     <div class="col-lg-7 col-md-6 video_div sec_video_content">
                        <div class="about-wrapper profile-summary">
                           <h2>Explanation about <br /> Visual Vacancies</h2>
                           <p>
                              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                              Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                              unknown printer took a galley of type
                              and scrambled it to make a type specimen book. It has survived not only five
                              centuries, but also the leap into electronic typesetting, remaining essentially
                              unchanged. It was popularised in the 1960s
                              with the release of Letraset sheets containing Lorem Ipsum passages, and more
                              recently with desktop publishing software like Aldus PageMaker including
                              versions of Lorem Ipsum.
                           </p>

                           <p>
                              Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                              in a piece of classical Latin literature from 45 BC, making it over 2000 years
                              old. Richard McClintock, a Latin
                              professor at Hampden-Sydney College in Virginia, looked up one of the more
                              obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                              the cites of the word in classical
                              literature, discovered the undoubtable source.
                           </p>
                        </div>
                     </div>
                     <div class="col-lg-5 col-md-6 video_div sec_video_img">
                        <div class="image-box">
                           <img src="{{ asset('assets/images/about-img.png') }}" width="671" height="687" class="image-fluid" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- content section End Here -->
      <!-- Brands Section Start Here -->
        <section class="brand-section slass-icon  section-space">
         <div class="container">
            <div class="card p-5">
               <div class="card-body">
                  <div class="section-heading mb-5">
                     <h4>Companies we are linked with</h4>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="brands-carousel">
                           <div class="owl-carousel owl-theme">
                              <div class="item">
                                 <div class="brands-wrapper">
                                    <img src="{{ asset('assets/images/google.png') }}" alt="vacancies-1.jpg" width="290" height="227"
                                       class="img-fluid" />
                                 </div>
                              </div>
                              <div class="item">
                                 <div class="brands-wrapper">
                                    <img src="{{ asset('assets/images/Adobe-Corporate-Logo.png') }}" alt="vacancies-1.jpg" width="290"
                                       height="227" class="img-fluid" />
                                 </div>
                              </div>
                              <div class="item">
                                 <div class="brands-wrapper">
                                    <img src="{{ asset('assets/images/Infosys-logo.png') }}" alt="vacancies-1.jpg" width="290"
                                       height="227" class="img-fluid" />
                                 </div>
                              </div>
                              <div class="item">
                                 <div class="brands-wrapper">
                                    <img src="{{ asset('assets/images/Lufthansa-Logo.png') }}" alt="vacancies-1.jpg" width="290"
                                       height="227" class="img-fluid" />
                                 </div>
                              </div>
                              <div class="item">
                                 <div class="brands-wrapper">
                                    <img src="{{ asset('assets/images/FedEx-logo-orange-purple.png') }}" alt="vacancies-1.jpg"
                                       width="290" height="227" class="img-fluid" />
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Brands Logo Section End -->
     <!-- Feature Vacancies Section Start -->
     <section class="featured-emp-section featured-vacancies-section section-space">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="featured-carousel featured-emp-carousel card">
                  <div class="card-body p-5">
                     <div class="owl-carousel owl-theme">
                    
                     <div class="item">
                           <div class="card shadow">
                              <div class="vacancies-img">
                                 <img src="{{ asset('assets/images/property.png') }}" alt="vacancies-1.jpg" width="290"
                                    height="227" class="img-fluid" />
                                 <a href="#!">
                                    <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}" alt="play button"
                                          width="" height="" class="img-fluid" /></div>
                                 </a>
                              </div>
                              <div class="card-body">
                                 <h3>Hilversum</h3>
                                 <div class="location d-flex justify-content-between align-items-center">
                                    <span><i class="icon-location me-2"></i>Hilversum</span>
                                    <small class="text-muted">30+ days ago</small>
                                 </div>
                              </div>
                           </div>
                     </div>
                     <div class="item">
                           <div class="card shadow">
                              <div class="vacancies-img">
                                 <img src="{{ asset('assets/images/property.png') }}" alt="vacancies-1.jpg" width="290"
                                    height="227" class="img-fluid" />
                                 <a href="#!">
                                    <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}" alt="play button"
                                          width="" height="" class="img-fluid" /></div>
                                 </a>
                              </div>
                              <div class="card-body">
                                 <h3>Hilversum</h3>
                                 <div class="location d-flex justify-content-between align-items-center">
                                    <span><i class="icon-location me-2"></i>Hilversum</span>
                                    <small class="text-muted">30+ days ago</small>
                                 </div>
                              </div>
                           </div>
                     </div>
                     <div class="item">
                        <div class="card shadow">
                           <div class="vacancies-img">
                              <img src="{{ asset('assets/images/sports.png') }}" alt="vacancies-1.jpg" width="290"
                                 height="227" class="img-fluid" />
                              <a href="#!">
                                 <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}" alt="play button"
                                       width="" height="" class="img-fluid" /></div>
                              </a>
                           </div>
                           <div class="card-body">
                              <h3>Sports Person</h3>
                              <div class="location d-flex justify-content-between align-items-center">
                                 <span><i class="icon-location me-2"></i>Amsterdam</span>
                                 <small class="text-muted">30+ days ago</small>
                              </div>
                           </div>
                        </div>
                  </div>
                        <div class="item">
                              <div class="card shadow">
                                 <div class="vacancies-img">
                                    <img src="{{ asset('assets/images/butician.png') }}" alt="vacancies-1.jpg" width="326"
                                       height="271" class="img-fluid" />
                                    <a href="#!">
                                       <div class="play-btn"><img src="{{ asset('assets/images/play-btn.png') }}" alt="play button"
                                             width="" height="" class="img-fluid" /></div>
                                    </a>
                                 </div>
                                 <div class="card-body">
                                    <h3>Beautician</h3>
                                    <div class="location d-flex justify-content-between align-items-center">
                                       <span><i class="icon-location me-2"></i>Amsterdam</span>
                                       <small class="text-muted">30+ days ago</small>
                                    </div>
                                 </div>
                              </div>
                        </div>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Feature Vacancies section End -->
     <!-- Video Section Start Here-->
     <section class="video-section section-space">
      <div class="container">
         <div class="video-wrapper position-relative">
            <img src="{{ asset('assets/images/video-full-img.png') }}" width="1502" height="664" alt="video img"
               class="img-fluid" />
            <div class="video-btn position-absolute top-50 start-50 translate-middle">
               <a href="javascript:void(0)" class="d-inline-block"><span
                     class="arrow-right d-inline-block"></span></a>
            </div>
         </div>
      </div>
   </section>
   <!-- Video Section End Here-->
   <!-- Tools Section Start Here -->
   <section class="tools-section text-start  section-space">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class=" pt-0 card">
                  <div class="card-body p-5">
                     <div class="owl-carousel owl-theme">
                        <div class="item">
                           <div class="card">
                              <div class="card-body">
                                 <figure class="spriteicon">
                                    <i class="salary-tools"></i>
                                 </figure>
                                 <article>
                                    <h4>Salary tools</h4>
                                    <p>See how your salary compares to others with the same job title in your area.
                                       Not only can you compare your salary, but you can also see what skills you are
                                       missing to earn more money.</p>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="card">
                              <div class="card-body">
                                 <figure class="spriteicon">
                                    <i class="quick-apply"></i>
                                 </figure>
                                 <article>
                                    <h4>Quick apply</h4>
                                    <p>Easily apply to multiple jobs with one click! Quick Apply shows you recommended jobs based off your most recent search and allows you to apply to 25+ jobs in a matter of seconds!</p>
                                 </article>
                              </div>
                           </div>
                        </div>
                        <div class="item">
                           <div class="card">
                              <div class="card-body">
                                 <figure class="spriteicon">
                                    <i class="job-alert"></i>
                                 </figure>
                                 <article>
                                    <h4>Job Alert</h4>
                                    <p>Keep track of positions that you're interested in by signing up for job alert emails. You'll be notifed via email when new jobs are posted in that search.</p>
                                 </article>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Tools Section End Here -->
   </main>
@endsection