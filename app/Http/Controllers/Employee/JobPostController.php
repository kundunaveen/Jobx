<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use App\Models\AppliedJob;
use App\Models\Profile;
use App\Models\User;
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

        $cover_video = null;
        if($request->hasFile('cover_video'))
        {
            $file = $request->file('cover_video');
            $file_name = $file->hashName();
            $file->storeAs(
                AppliedJob::VIDEO_PATH,
                $file_name,
                config('settings.file_system_service')
            );
            $cover_video = $file_name;
        }

        AppliedJob::create([
            'user_id' => auth()->user()->id,
            'vacancy_id' => $id,
            'cover_letter'=> $request->cover_letter ? $request->cover_letter : null, //create mig long text
            'motivation_letter' => $request->motivation_letter ? $request->motivation_letter : null,
            'cover_video' => $cover_video
        ]);

        return redirect()->back()->with('success', 'Job Applied Successfully');

    }

    /*preview job */
    public function previewJob(Request $request, $id)
    {

        $profile = Profile::where('user_id', auth()->user()->id)->first();
        $job_details =  Vacancy::where('id', $id)->first();
        $company = User::find($job_details->employer_id);
        $applied_jobs = AppliedJob::where('user_id', optional(auth()->user())->id)->pluck('vacancy_id')->toArray();
        return view('employee.profile.previewjob', compact('job_details', 'profile', 'company','applied_jobs'));
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
