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
                                            <th>Job Role</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($employee as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1}}</td>
                                            <td>{{$item->first_name.' '.$item->last_name}}</td>
                                            <td>{{$job->job_role}}</td>
                                           
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

