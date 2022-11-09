<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\AppliedJob;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function home()
    {   
        $allApp = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->count();
        $applications = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 0)->get();
        $shortlisted = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 1)->count();
        $rejected = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 2)->count();
        $hired = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 3)->count();
        $hold = AppliedJob::whereHas('vacancy', function($q){
            $q->where('employer_id', auth()->user()->id);
        })->where('status', 4)->count();
        $datee = Date('Y-m-d', strtotime(Date('Y-m-d').' -6 days'));

        for($i=0;$i<=6;$i++)
        {
            $newdate = Date('Y-m-d', strtotime($datee.'+ '.$i.' days'));
            $date_arr [$newdate] = 0;
        }
        $app_day = DB::select(DB::raw('SELECT COUNT(id) as total, DATE(created_at) as date_at FROM applied_jobs GROUP BY date_at'));
        
        foreach($app_day as $data)
        {
            $date_arr[$data->date_at] = $data->total;
        }
        $postedJobs = Vacancy::where('employer_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('employer.dashboard.home', compact('applications', 'postedJobs', 'shortlisted', 'rejected', 'hold', 'hired', 'date_arr', 'allApp'));
    }

    public function postedJobs(Request $request)
    {
        // dd($request->job_type);

        $jobs = Vacancy::where('employer_id', auth()->user()->id);
        if($request->search)
        {
            $jobs->where('job_title', 'LIKE', '%' . $request->search . '%')->orWhere('job_role', 'LIKE', '%' . $request->search . '%');
        }
        if($request->job_type && $request->job_type != 'empty')
        {
            // dd($request->job_type);
            $jobs->where('job_type', $request->job_type);
        }
        if($request->salary && $request->salary != 'empty')
        {   
            if($request->salary == 25)
            {
                $jobs->where('salary_offer','>',24);
            }
            else{
                $salaries = explode('-',$request->salary);
                // dd($salaries);
                $jobs->where('salary_offer', '>', $salaries[0])->where('salary_offer', '<=', $salaries[1]);
            }
        }
        if($request->experience && $request->experience != 'empty')
        {   
            // dd('yes');
            if($request->experience == 16)
            {
                $jobs->where('min_exp','>',15);
            }
            else{
                $exp = explode('-',$request->experience);
                $jobs->where('min_exp', '>', $exp[0])->where('min_exp', '<=', $exp[1]);
            }
        }
        $jobs = $jobs->get();
        return view('employer.dashboard.posted-jobs.posted-jobs', compact('jobs'));
    }
}
