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

            </div>
            <h4 class="border-bottom">Details</h4>
            <div class="aside-filter">
                <h5>Job Type</h5>
                @foreach($job_types as $job_type)
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" onclick="filterJobs()" class="form-check-input" id="exampleCheck1" @if(isset($_GET['job_type']) && in_array(strtolower($job_type->id), $_GET['job_type'])) checked @endif name="job_type[]" value="{{ $job_type->id}}">
                        <label class="form-check-label" for="exampleCheck1">{{ $job_type->value }}</label>
                    </li>
                </ul>
                @endforeach
            </div>
            <div class="aside-filter">
                <h5>Industries</h5>
                @foreach($industry as $indus)
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" @if(isset($_GET['industry']) && in_array($indus->id, $_GET['industry'])) checked @endif name="industry[]" value="{{$indus->id}}">
                        <label class="form-check-label" title="{{$indus->value}}" for="exampleCheck1">{{Str::limit($indus->value, 15)}}</label>
                    </li>
                </ul>
                @endforeach
            </div>
            <div class="aside-filter">
                <h5>Skills</h5>
                <ul class="list-group">
                    @foreach($skills as $skill)
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck6" @if(isset($_GET['skill']) && in_array($skill->id, $_GET['skill'])) checked @endif name="skill[]" value="{{$skill->id}}">
                        <label class="form-check-label" for="exampleCheck6">{{$skill->skill}}</label>
                    </li>
                    @endforeach
                </ul>
            </div>
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
            <div class="aside-filter">
                <h5>Professional Level</h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck9" name="professional_level[]" value="trainee">
                        <label class="form-check-label" for="exampleCheck9">Trainee</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck10" name="professional_level[]" value="senior">
                        <label class="form-check-label" for="exampleCheck10">Senior</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" class="form-check-input" id="exampleCheck11" name="professional_level[]" value="director">
                        <label class="form-check-label" for="exampleCheck11">Director</label>
                    </li>
                </ul>
            </div>
            <div class="aside-filter range-price">
                <h5>Salary ($)</h5>
                <div class="wrapper">
                    <div class="values">
                        <span id="range1" class="range_span">
                            0
                        </span>
                        <span> — </span>
                        <span id="range2" class="range_span">
                            99
                        </span>
                    </div>
                    <div class="container">
                        <div class="slider-track"></div>
                        <input type="range" min="0" max="99" value="0" id="slider-1" name="min_salary" oninput="slideOne()">
                        <input type="range" min="0" max="99" value="99" id="slider-2" name="max_salary" oninput="slideTwo()">
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
                            30
                        </span>
                    </div>
                    <div class="container">
                        <div class="slider-track-exp"></div>
                        <input type="range" min="0" max="30" value="0" id="slider-exp1" name="min_exp" oninput="slideOneExp()">
                        <input type="range" min="0" max="30" value="30" id="slider-exp2" name="max_exp" oninput="slideTwoExp()">
                    </div>
                </div>
            </div>
            <input type="hidden" id="sortby" name="sortby">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</aside>