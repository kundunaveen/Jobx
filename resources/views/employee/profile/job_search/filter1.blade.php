<aside class="company-listing-aside">
<form id="filter-form" method="GET" action="">
    <h4 class="">Companies List</h4>
    <div class="aside-filter">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Job Type
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body p-0">
                        <ul class="list-group">
                        @foreach($job_types as $job_type)
                            <li class="list-group-item">
                                <input type="checkbox" class="form-check-input" id="Check1" onclick="filterJobs()" @if(isset($_GET['job_type']) && in_array(strtolower($job_type->id), $_GET['job_type'])) checked @endif name="job_type[]" value="{{ $job_type->id}}">
                                <label class="form-check-label" for="Check1">{{ $job_type->value }}</label>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Star Value
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
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
        <input type="hidden" id="sortby" name="sortby">
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
</aside>