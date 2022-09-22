<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\State;
use App\Models\JobSkill;
use Session;
use App\Models\City;

class JobPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function index()
    {
        return view('employer.profile.posted-jobs');
    }

    public function create(Request $request)
    {
        if($request->method() == "POST")
        {
            $request->validate([
                'job_title' => 'required|string|max:129',
                'address' => 'required|string',
                'zip' => 'required|numeric',
                'department' => 'required|string|max:129',
                'job_role' => 'required|string',
                'zip' => 'required'
            ]);
            if($request->skills && count($request->skills) > 0){
                $skills = implode(',',$request->skills);
            }
            else{
                $skills = null;
            }
            Vacancy::create([
                'employer_id' => auth()->user()->id,
                'job_title' => $request->job_title,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'location' => $request->address,
                'zip' => $request->zip,
                'department' => $request->department,
                'job_role' => $request->job_role,
                'description' => $request->description,
                'min_exp' => $request->min_exp,
                'salary_offer' => $request->salary_offer,
                'skills' => $skills,
                'job_type' => $request->job_type

            ]);
            return redirect(route('employer.dashboard.posted.jobs'))->with('success', 'Job Posted Successfully');
        }
        $skills = JobSkill::all();
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach($states as $state)
        {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        return view('employer.profile.post-job', compact('countries', 'states', 'cities', 'skills'));
    }

    public function edit(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $countries = Country::all();
        $states = State::where('country_id',$vacancy->country)->get();
        $cities = City::where('state_id', $vacancy->state)->get();
        $allSkills = JobSkill::all();
        if($vacancy->skills)
        {
            $skills = explode(',', $vacancy->skills);
        }
        else
        {
            $skills = null;
        }
        if($request->method() == "POST")
        {
            $request->validate([
                'job_title' => 'required|string|max:129',
                'address' => 'required|string',
                'zip' => 'required|numeric',
                'department' => 'required|string|max:129',
                'job_role' => 'required|string',
                'zip' => 'required'
            ]);
            if($request->skills && count($request->skills) > 0){
                $skills = implode(',',$request->skills);
            }
            else{
                $skills = null;
            }
            $vacancy->update([
                'job_title' => $request->job_title,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'location' => $request->address,
                'zip' => $request->zip,
                'department' => $request->department,
                'job_role' => $request->job_role,
                'description' => $request->description,
                'min_exp' => $request->min_exp,
                'salary_offer' => $request->salary_offer,
                'skills' => $skills,
                'job_type' => $request->job_type
            ]);
            

            return redirect(route('employer.dashboard.posted.jobs'))->with('success', 'Job Post Updated Successfully');
        }
        return view('employer.profile.edit-post-job', compact('vacancy','countries', 'states', 'cities', 'skills', 'allSkills'));
    }

    public function delete(Request $request)
    {
        Vacancy::find($request->id)->delete();
        Session::flash('info', 'Job Vacancy Deleted Successfully');
        return response()->json([
            'status' => 'success',
            'message' => 'Job vacancy has been deleted successfully'
        ]);
    }
}
