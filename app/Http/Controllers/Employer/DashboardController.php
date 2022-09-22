<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function home()
    {
        return view('employer.dashboard.home');
    }

    public function postedJobs(Request $request)
    {
        // dd($request->job_type);

        $jobs = Vacancy::where('employer_id', auth()->user()->id);
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
        return view('employer.dashboard.posted-jobs', compact('jobs'));
    }
}
