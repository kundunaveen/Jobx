<form action="{{route('search.job')}}" method="GET">
    <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
            <label>What kind of work?</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="form-icon icon-keywords"></i>
                </span>
                <input type="text" name="search_keyword" value="{{ request()->get('search_keyword') }}" class="form-control" placeholder="Keywords" />
            </div>
        </div>
        <div class="col-lg-4 mb-4 mb-lg-0">
            <label>True?</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="form-icon icon-location"></i>
                </span>
                <input type="text" name="search_location" value="{{ request()->get('search_location') }}" class="form-control" placeholder="Location" />
                {{--
                    <select class="form-select">
                                        <option value="1">30KM</option>
                                        <option value="1">40KM</option>
                                        <option value="1">50KM</option>
                                        <option value="1">60KM</option>
                                        <option value="1">70KM</option>
                                    </select>
                                    --}}
            </div>
        </div>
        <div class="col-lg-4">
            {{--
            <div class="form-check float-md-end">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Send me Newsletter
                </label>
            </div>
            --}}
            <button class="btn btn-lg search-btn" type="submit">Search Vacancies</button>
                @if(request()->except('credit_card'))
                    <div class="search-advance">
                        <ul class="col-md-auto">
                            <li class="text-end"><a href="{{ route('search.job') }}"><u>Clear Filter</u></a></li>
                        </ul>
                    </div>
                @endif
        </div>
    </div>
</form>