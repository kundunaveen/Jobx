<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Vacancy;
use App\Models\State;
use App\Models\JobSkill;
use App\Models\MasterAttribute;
use Session;
use App\Models\City;

class JobPostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'employeraccount']);
    }

    public function index(Request $request)
    {
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
        $jobs = $jobs->simplePaginate(9);
        return view('employer.dashboard.posted-jobs.posted-jobs', compact('jobs'));
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
            return redirect(route('employer.posted.jobs'))->with('success', 'Job Posted Successfully');
        }
        $skills = JobSkill::all();
        $job_types = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Job Type');
        })->get();
        $countries = Country::all();
        $states = State::where('country_id', 156)->get();
        foreach($states as $state)
        {
            $cities = City::where('state_id', $state->id)->get();
            break;
        }
        return view('employer.dashboard.posted-jobs.post-job', compact('countries', 'states', 'cities', 'skills', 'job_types'));
        // return view('employer.profile.post-job', compact('countries', 'states', 'cities', 'skills'));
    }

    public function edit(Request $request, $id)
    {
        $vacancy = Vacancy::find($id);
        $countries = Country::all();
        $states = State::where('country_id',$vacancy->country)->get();
        $cities = City::where('state_id', $vacancy->state)->get();
        $allSkills = JobSkill::all();
        $job_types = MasterAttribute::whereHas('masterCategory', function($q){
            $q->where('name', 'Job Type');
        })->get();
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
            

            return redirect(route('employer.posted.jobs'))->with('success', 'Job Post Updated Successfully');
        }
        return view('employer.dashboard.posted-jobs.edit-post-job', compact('vacancy','countries', 'states', 'cities', 'skills', 'allSkills', 'job_types'));
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
