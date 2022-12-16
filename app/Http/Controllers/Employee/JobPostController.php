<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use App\Models\AppliedJob;
use App\Models\Profile;
use Illuminate\Support\Facades\Redirect;

class JobPostController extends Controller
{
    /*filter by job postd*/
    public function jobsFilterBy(Request $request)
    {
        $vacancies = Vacancy::all();
        $job_types = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Job Type');
        })->get();
        $industry = MasterAttribute::where('master_attribute_category_id', '4')->get();
        $skills = JobSkill::all();
        $jobs = Vacancy::whereIn('job_type', $request->job_type)->paginate(3);
        $applied_jobs = AppliedJob::where('user_id', auth()->user()->id)->pluck('vacancy_id')->toArray();
        return view('employee.profile.search', compact('vacancies','job_types', 'jobs', 'skills', 'industry', 'applied_jobs'));
    }

    /*apply for job*/
    public function applyJob(Request $request, $id)
    {
        // dd($request);
        $have_profile = Profile::where('user_id', $request->user()->id)
        ->where('gender', '>', 0)
        ->count();

        if($have_profile == 0){
            return Redirect::route('employee.profile.edit')->with('error', 'Before you applied the profile you need to fill up the profile.');
        }

        AppliedJob::create([
            'user_id' => auth()->user()->id,
            'vacancy_id' => $id,
            'cover_letter'=>$request->cover_letter ? $request->cover_letter : '' //create mig long text
        ]);

        return redirect()->back()->with('success', 'Job Applied Successfully');

    }

    /*preview job */
    public function previewJob(Request $request, $id)
    {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $job_details =  Vacancy::where('id', $id)->first();
        return view('employee.profile.previewjob', compact('job_details', 'profile'));
    }

    public function jobWithdrawn(int $vacancy_id)
    {
        $applied_vacancy = AppliedJob::where([
                ['user_id', '=', auth()->user()->id],
                ['vacancy_id', '=', $vacancy_id],
            ])->first();
        
        if($applied_vacancy instanceof AppliedJob){
            $applied_vacancy->delete();
            return Redirect::route('employee.home')->with('success', 'Job withdrawn successful');
        }
        
        return back()->withInput()->with('error', 'Something wrong');
    }
}
