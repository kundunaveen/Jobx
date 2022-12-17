<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliedJob;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Session;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function index(Request $request)
    {
        $applications = AppliedJob::whereHas('vacancy', function(Builder $q){
            $q->where('employer_id', auth()->user()->id);
        })->when($request->search_keyword, function(Builder $builder, $value){
            return $builder->whereHas('vacancy', function(Builder $builder) use($value){
                return $builder->where(function(Builder $builder) use ($value){
                    return $builder->where('job_title', 'like', "%{$value}%")
                    ->orWhere('job_role', 'like', "%{$value}%");
                })->orWhereHas('user', function(Builder $builder) use ($value){
                    return $builder->whereRaw("concat(first_name, ' ', last_name) like '%{$value}%'");
                });
            });            
        })
        ->when($request->search_status, function(Builder $builder, $value){
            return $builder->where('status', $value);            
        })
        ->when($request->search_status === "0", function(Builder $builder, $value){
            return $builder->where('status', 0);            
        })
        ->latest()->paginate(config('settings.pagination_employer'));

        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function jobApplicants(Request $request, $id)
    {
        $applications = AppliedJob::whereHas('vacancy', function($q) use($id) {
            $q->where('vacancy_id', base64_decode($id));
        })->paginate(config('settings.pagination_employer'));
     
        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function newApplicants()
    {
        $applications = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 0)->paginate(config('settings.pagination_employer'));
        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function updateStatus(Request $request)
    {
        $application_id = $request->id;

        $applied_job =  AppliedJob::where('id', $application_id)->first();

        if($applied_job){
            return response()->json([
                'status' => true,
                'message' => 'success',
                'data' => view('employer.dashboard.applications.application_status_form', [
                    'applied_job' => $applied_job
                ])->render(),
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No data found',
                'data' => '',
            ]);
        }
        
    }

    public function viewEmployeeProfile($id)
    {
        $user = User::find(base64_decode($id));
        return view('employer.dashboard.applications.employee_profile', compact('user'));
    }

    public function applicantStatusUpdate(Request $request, int $applicant_id)
    {
        $applied_Job =  AppliedJob::where('id', $applicant_id)->firstOrFail();
        
        try{

            $applied_Job->update([
                'status' => $request->status
            ]);
            
            return response()->json([
                'status' => true,
                'message' => 'Applicant status updated successfully',
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
