<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppliedJob;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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
        ->latest()->paginate(config('settings.pagination_employer'));

        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function jobApplicants(Request $request, $id)
    {
        $applications = AppliedJob::whereHas('vacancy', function($q) use($id) {
            $q->where('vacancy_id', base64_decode($id));
        })->get();
        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function newApplicants()
    {
        $applications = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 0)->get();
        return view('employer.dashboard.applications.index', compact('applications'));
    }

    public function updateStatus(Request $request)
    {
        $appJob =  AppliedJob::find($request->id);
        $appJob->status = $request->status;
        $appJob->save();
        // dd($appJob);

        
        Session::flash('info', 'Applicant status updated successfully');
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function viewEmployeeProfile($id)
    {
        $user = User::find(base64_decode($id));
        return view('employer.dashboard.applications.employee_profile', compact('user'));
    }

}
