@extends('employer.dashboard.partials.layout')
@section('title')
Employee Applications
@endsection
@section('content')
<style>
    .main-bg {
        padding: 0px !important;
    }

    .dataTables_filter {
        text-align: right;
        margin-bottom: 30px;
    }

    .dataTables_length {
        display: none;
    }

    ul.pagination {
        float: right;
    }

    .dataTables_filter input {
        margin-left: 10px;
    }

    .dataTables_filter label {
        display: inline-flex;
        align-items: center;
    }
</style>
<section class="dashboard-section inner-login-shape" style="min-height:800px">
    <section class="form-inner-wrapper">
        <div class="dashboard-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="dashboard-graph-wrapper">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card active-wrapper">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <h3 class="card-title col-auto mt-2">Applicants</h3>
                                                <div class="col-auto">
                                                    <!-- <a class="col-auto btn btn-primary" href="{{ route('employer.dashboard') }}" style="margin-right:10px !important">Back</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('employer.applications') }}" method="GET">
                                                <div class="row mb-4">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="search_keyword" value="{{ request()->get('search_keyword') }}" class="form-control" placeholder="Search applicant name or job title or job role" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="search_status" class="form-control">
                                                            <option value="">Select status</option>
                                                            @forelse (\App\Models\AppliedJob::STATUS_ARRAY as $key => $value)
                                                            <option value="{{ $key }}" @if($key===request()->get('search_status')) selected @endif>{{ $value }}</option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="submit" class="btn btn-search btn-primary">Search</button>
                                                        <a href="{{ route('employer.applications') }}" class="btn btn-search btn-danger">Reset</a>
                                                    </div>
                                                </div>
                                            </form>
                                            <table class="table table-striped table-reponsive">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. no.</th>
                                                        <th>Applicant Name</th>
                                                        <th>Applied For</th>
                                                        <th>Applied On</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($applications as $index => $application)
                                                    <tr>
                                                        <td>{{ $index + 1}}</td>
                                                        <td>{{$application->user->first_name.' '.$application->user->last_name}}</td>
                                                        <td>{{$application->vacancy->job_role}}</td>
                                                        <td>{{$application->created_at}}</td>
                                                        <td><span class="h6">{{ $application->status_name }}</span></td>
                                                        <td>
                                                            @if($profile_resume_url = rescue(function() use ($application){ return $application->user->profile->profile_resume_url; }, ''))
                                                            <a href="{{ $profile_resume_url }}" download="{{ optional($application->user)->full_name.'.pdf'}}" title="download_resume">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                                                </svg>
                                                            </a>
                                                            @endif

                                                            <a href="{{url('/employer/view-employee-profile', base64_encode($application->user_id))}}" title="View user details">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                </svg>
                                                            </a>

                                                            <a href="javascript:void(0)" title="edit" onclick="updateRequest('{{ $application->id }}')" class="text-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                                                </svg>
                                                            </a>

                                                            {{--<!-- <a href="javascript:void(0)" onclick="updateRequest('{{$application->id}}', '2')" title="Remove Applicant" class="text-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                                                            </svg>
                                                            </a> -->--}}

                                                        </td>
                                                    </tr>
                                                    @empty
                                                    No Record Found
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {{ $applications->links() }}
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
</section>
@include('employer.dashboard.applications.application_status_modal')
@endsection

@section('scripts')
<script>
    function updateRequest(id) {
        $('#ajax_html').html();
        $.ajax({
            url: '{{ route("employer.update-applicant-status") }}',
            type: 'GET',
            data: {
                'id': id,
            },
            success: function(response) {
                if (response.status == true) {
                    $('#ajax_html').html(response.data);
                    $('#exampleModal').modal('show');
                }
            }
        })
    }
</script>
@endsection