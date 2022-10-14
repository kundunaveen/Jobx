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
                                            <td>
                                                <a href="" title="edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>

                                                
                                                <a href="javascript:void(0)" onclick="" title="delete" class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="22px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
