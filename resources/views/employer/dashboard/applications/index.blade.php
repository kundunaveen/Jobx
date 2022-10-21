@extends('employer.dashboard.partials.layout')
@section('title')
    Employee Applications
@endsection
@section('content')
<style>
.main-bg {
    padding:0px !important;
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
                                                <a class="col-auto btn btn-primary" href="{{ route('employer.dashboard') }}" style="margin-right:10px !important">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    <table class="table table-striped" id="applicants_table">
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
                                            <td><span class="h6">{{$application->status == 0 ? 'In Review':($application->status == 1 ? 'Accepted':'Rejected')}}</span></td>
                                            <td>
                                                @if($application->user->profile->resume)
                                                <a href="{{url('/')}}/public/image/resume/{{$application->user->profile->resume}}" download="{{$application->user->first_name.$application->user->last_name.'.pdf'}}" title="download_resume">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                                    </svg>
                                                </a>
                                                @endif
                                                <a href="javascript:void(0)" title="edit" onclick="updateRequest('{{$application->id}}', '1')" class="text-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                                    </svg>
                                                </a>
                                                <a href="javascript:void(0)" onclick="updateRequest('{{$application->id}}', '2')" title="Remove Applicant" class="text-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                                                    </svg>
                                                </a>
                                            
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
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
@endsection

@section('scripts')
<script> 
function updateRequest( id, status )
{
    $.ajax({
        url: '{{url("employer/update-applicant-status")}}',
        type: 'POST', 
        data: {
            '_token': '{{ csrf_token() }}',
            'id': id,
            'status': status
        },
        success:function(response){
            location.reload();
        }
    })
}
</script>
@endsection