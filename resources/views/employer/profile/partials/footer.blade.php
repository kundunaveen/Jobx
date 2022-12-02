    <!--========= Footer Section Start Here =========-->
    <footer class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-lg-5">
                        <figure class="footer-logo">
                            <a class="" href="index.html">
                                <img src="{{asset('assets/images/jobax-logo.png')}}" width="248" alt="" class="img-fluid" />
                            </a>
                        </figure>
                        <article>
                            <p>JobaX is a job site that provides visual vacancies, RAMS software and on-site offers
                                additions
                                to
                                the recruiters</p>
                        </article>
                    </div>
                    <div class="col-lg-7">
                        <div class="menu-list">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-5 ms-xl-5">
                                        <h6>Company</h6>
                                        <ul class="footer-menu-list list-group">
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">About Us</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">Careers</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">Customers</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0">
                                                <a href="javascript:void(0)">Partnership</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-5 ms-xl-5 ps-lg-3">
                                        <h6>Quick Links</h6>
                                        <ul class="footer-menu-list list-group">
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">Home</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">Explore</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0">
                                                <a href="javascript:void(0)">Category</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-5 ms-xl-5">
                                        <h6>Resources</h6>
                                        <ul class="footer-menu-list list-group">
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">FAQ</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0 ">
                                                <a href="javascript:void(0)">Blog</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @if(get_cms_setting_data())
                                <div class="col-lg-5 col-md-4">
                                    <div class="mb-5 mb-lg-0 ms-xl-5">
                                        <h6>Contact</h6>
                                        <ul class="footer-menu-list list-group">
                                            @if(data_get(get_cms_setting_data()->content, 'contact_number', ''))
                                            <li class="list-group-item border-0 p-0 mb-3"><a href="mailto:{{ data_get(get_cms_setting_data()->content, 'contact_number', '') }}"><i class="icon-email me-1"></i>{{ data_get(get_cms_setting_data()->content, 'contact_number', '') }}</a>
                                            </li>
                                            @endif
                                            @if(data_get(get_cms_setting_data()->content, 'contact_email', ''))
                                            <li class="list-group-item border-0 p-0">
                                                <a href="tel:{{ data_get(get_cms_setting_data()->content, 'contact_email', '') }}"><i class="icon-phone me-1"></i>{{ data_get(get_cms_setting_data()->content, 'contact_email', '') }}</a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="mb-5 mb-lg-0">
                                        <h6>Legal</h6>
                                        <ul class="footer-menu-list list-group">
                                            <li class="list-group-item border-0 p-0 mb-3">
                                                <a href="javascript:void(0)">Termaof Services</a>
                                            </li>
                                            <li class="list-group-item border-0 p-0">
                                                <a href="javascript:void(0)"> Privacy Policy</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center border-top">
                <p class="mb-0">© 2022 JobaX. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!--========= Footer Section End Here =========-->