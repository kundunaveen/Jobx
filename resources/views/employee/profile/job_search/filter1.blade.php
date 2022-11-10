<aside class="job-listing-aside">
    <div class="aside-filter">
        <form id="filter-form" method="GET" action="">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Job Type
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body p-0">
                            @foreach($job_types as $job_type)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input type="checkbox" onclick="filterJobs()" class="form-check-input" id="exampleCheck1" @if(isset($_GET['job_type']) && in_array(strtolower($job_type->id), $_GET['job_type'])) checked @endif name="job_type[]" value="{{ $job_type->id}}">
                                    <label class="form-check-label" for="exampleCheck1">{{ $job_type->value }}</label>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Industries
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body p-0">
                            @foreach($industry as $indus)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" @if(isset($_GET['industry']) && in_array($indus->id, $_GET['industry'])) checked @endif name="industry[]" value="{{$indus->id}}">
                                    <label class="form-check-label" title="{{$indus->value}}" for="exampleCheck1">{{Str::limit($indus->value, 15)}}</label>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Skills
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body p-0">
                            @forelse($skills as $skill)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck{{ $skill->id }}" name="skill[]" value="{{ $skill->id }}" @if(isset($_GET['skill']) && in_array($skill->id, $_GET['skill'])) checked @endif>
                                    <label class="form-check-label" title="{{ $skill->skill }}" for="exampleCheck{{ $skill->id }}">{{ $skill->skill }}</label>
                                </li>
                            </ul>
                            @empty
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="form-check-label">No skills found</label>
                                </li>
                            </ul>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                            Professional Level
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body p-0">
                            @forelse(get_experience_levels_model()->get() as $experience_level)
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck{{ $experience_level->id }}" name="professional_level[]" value="{{ $experience_level->id }}" @if(request()->has('professional_level') && in_array($experience_level->id, request()->professional_level)) checked @endif>
                                    <label class="form-check-label" title="{{ $experience_level->value }}" for="exampleCheck{{ $experience_level->id }}">{{ $experience_level->value }}</label>
                                </li>
                            </ul>
                            @empty
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <label class="form-check-label">No data found</label>
                                </li>
                            </ul>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="aside-filter range-price">
                    <h5>Salary ($)</h5>
                    <div class="wrapper">
                        <div class="values">
                            <span id="range1" class="range_span">
                                {{ data_get(get_min_max_salary(), 'MinSalary', 0) }}
                            </span>
                            <span> — </span>
                            <span id="range2" class="range_span">
                                {{ data_get(get_min_max_salary(), 'MaxSalary', 0) }}
                            </span>
                        </div>
                        <div class="container">
                            <div class="slider-track"></div>
                            <input type="range" min="{{ data_get(get_min_max_salary(), 'MinSalary', 0) }}" max="{{ data_get(get_min_max_salary(), 'MaxSalary', 0) }}" value="{{ data_get(get_min_max_salary(), 'MinSalary', 0) }}" id="slider-1" name="min_salary" oninput="slideOne()">
                            <input type="range" min="{{ data_get(get_min_max_salary(), 'MinSalary', 0) }}" max="{{ data_get(get_min_max_salary(), 'MaxSalary', 0) }}" value="{{ data_get(get_min_max_salary(), 'MaxSalary', 0) }}" id="slider-2" name="max_salary" oninput="slideTwo()">
                        </div>
                    </div>
                </div>

                <div class="aside-filter range-price-exp">
                    <h5>Experience (Yrs)</h5>
                    <div class="wrapper">
                        <div class="values">
                            <span id="range-exp1" class="range_span-exp">
                                0
                            </span>
                            <span> — </span>
                            <span id="range-exp2" class="range_span-exp">
                                40
                            </span>
                        </div>
                        <div class="container">
                            <div class="slider-track-exp"></div>
                            <input type="range" min="0" max="40" value="0" id="slider-exp1" name="min_exp" oninput="slideOneExp()">
                            <input type="range" min="0" max="40" value="40" id="slider-exp2" name="max_exp" oninput="slideTwoExp()">
                        </div>
                    </div>
                </div>
            </div>
            {{--
            <div class="aside-filter">
                <h5>Employment Type</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck6" name="emp_type" value="full_day">
                        <label class="form-check-label" for="exampleCheck6">Full Day</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck7" name="emp_type" value="shift_work">
                        <label class="form-check-label" for="exampleCheck7">Shift Work</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck8" name="emp_type" value="distant_work">
                        <label class="form-check-label" for="exampleCheck8">Distant Work</label>
                    </li>
                </ul>
            </div>
            --}}
            <input type="hidden" id="sortby" name="sortby">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</aside>