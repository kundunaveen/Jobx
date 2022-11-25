<aside class="company-listing-aside company_list_page">
    <h4 class="">Companies List</h4>
    <div class="aside-filter">
        <div class="accordion" id="accordionPanelsStayOpenExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed company_list_button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Industries
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body p-0">
                        @foreach(get_industries() as $indus)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <input type="checkbox" class="form-check-input" id="exampleCheck{{$indus->id}}" @if(isset($_GET['industry']) && in_array($indus->id, $_GET['industry'])) checked @endif name="industry[]" value="{{$indus->id}}">
                                <label class="form-check-label" title="{{$indus->value}}" for="exampleCheck{{$indus->id}}">{{Str::limit($indus->value, 15)}}</label>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            {{--
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
            --}}            
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</aside>